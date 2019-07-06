<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{

    protected $uToken;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->uToken = uToken();
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
//        $this->uToken = UserInfo::where('userId', auth()->user()->id)->value('uToken');
        if ($file) {
            $fileType = $this->check($file);
            $dir = str_replace('uToken_', '', $this->uToken);
            if ($fileType == 'image') {
                $ext = strtolower($file->getClientOriginalExtension());
                $filename = uniqid('IMG_').'.'.$ext;
                $res = $file->move('attachments/'.$dir.'/images', $filename);
                //get saved file local path
                $savePath = $res->getPathname();
                // get url path
                $displayPath = url($res);
                $this->saveToTable($fileType, $savePath);

                return ['displayPath' => $displayPath, 'savePath' => $savePath, 'code' => 'image'];
            }
            if ($fileType == 'pdf') {
                $ext = strtolower($file->getClientOriginalExtension());
                $filename = uniqid($dir.'_').'.'.$ext;
                $res = $file->move('attachments/'.$dir.'/files', $filename);
                //get saved file local path
                $savePath = $res->getPathname();
                // get url path
                $displayPath = url($res);
                $this->saveToTable($fileType, $savePath);

                return ['displayPath' => $displayPath, 'savePath' => $savePath, 'code' => 'pdf'];
            }
        }
    }

    public function destroy(Request $request)
    {
        $url = $request->data;
//        $path = strstr($url, 'attachments');

        $file_path = public_path($url);
        $extension = pathinfo(storage_path($url), PATHINFO_EXTENSION);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $this->delFormTable($url);
        $fileType = $this->checkFileType($extension);
        if ($fileType == 'image') {
            return ['code' => 1, 'message' => 'Image is deleted'];
        } elseif ($fileType == 'pdf') {
            return ['code' => 2, 'message' => 'File is deleted'];
        }
    }

    protected function delFormTable($url)
    {
        Attachment::where('url', $url)->delete();
    }

    protected function saveToTable($fileType, $savePath)
    {
        $attachment = Attachment::create(
            [
                'type' => $fileType,
                'url' => $savePath,
                'uToken' => $this->uToken,
                'userId' => auth()->user()->id,
            ]
        );

        return $attachment;
    }

    protected function check($file)
    {
        $fileType = $this->checkFileType($file);
        switch ($fileType) {
            case "image":
                $isValid = $this->checkImageSize($file);
                if (!$isValid) {
                    throw new UploadException('The image size should not be over 200KB');
                } else {
                    return $fileType;
                }
                break;
            case "pdf":
                $isValid = $this->checkPdfSize($file);
                if (!$isValid) {
                    throw new UploadException('The PDF file should not be over 2MB');
                } else {
                    return $fileType;
                }
                break;
            case false:
                throw new UploadException('This file type is not allowed to upload');
                break;
        }
    }

    protected function checkFileType($file)
    {
        if (is_file($file)) {
            $ext = strtolower($file->getClientOriginalExtension());
        } else {
            $ext = $file;
        }
        //strtolower 扩展名不区分大小写
        //检测上传文件是否为图片
        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
            return 'image';
        } elseif (in_array($ext, ['pdf'])) {
            return 'pdf';
        }
//        return false;

    }

    protected function checkImageSize($file)
    {
        $fileSize = $file->getSize();
        // 200kb
        if ($fileSize > 204800) {
            return false;
        }

        return true;
    }

    protected function checkPdfSize($file)
    {
        $fileSize = $file->getSize();
        // 2MB
        if ($fileSize > 2048000) {
            return false;
        }

        return true;
    }
}
