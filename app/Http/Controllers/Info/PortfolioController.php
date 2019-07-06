<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    protected $uToken;

    public function __construct(Request $request)
    {
        $this->middleware('auth')->except(
            [
                'index',
            ]
        );
        $this->uToken = uToken();
    }

    public function index(Request $request)
    {
        // This now is in app boot
    }

    public function addNewPortfolio(Request $request, Portfolio $portfolio)
    {
        $allData = $this->sortData($request);
        $allTags = json_encode($allData['allTags']);
        $details = json_encode($allData['details']);
        Portfolio::where('uToken', $this->uToken)->update(
            [
                'allTags' => $allTags,
                'details' => $details,
                'userId' => auth()->user()->id,
            ]
        );

        return back()->with('success', 'new project was added');
    }

    public function delPortfolio(Request $request)
    {
        $key = $request->route('key');
        $data = Portfolio::where('uToken', $this->uToken)->first();
        $allTags = $data->allTags;
        $details = $data->details;
        $file_path = public_path($details[$key]['fileUrl']);
        $thumb_path = public_path($details[$key]['thumbUrl']);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        if (is_file($thumb_path)) {
            unlink($thumb_path);
        }
        // array_splice (数组, key值, key和key之后的几个), 删除字段后 释放被删除的key
        array_splice($details, $key, 1);

        $newTags = $this->checkTags($allTags, $details);

        $newTags = json_encode($newTags);
        $details = json_encode($details);

        Portfolio::where('uToken', $this->uToken)->update(
            [
                'allTags' => $newTags,
                'details' => $details,
            ]
        );

        return back()->with('success', 'project deleted');
    }

    protected function checkTags($allTags, $details)
    {
        $newTags =[];
        $detailTag=[];
        foreach ($details as $detail) {
            $detailTag[] = $detail['tag'];
        }
        foreach ($allTags as $currentTag) {
            if (in_array($currentTag['name'], $detailTag)) {
                $newTags[] = ['name' => $currentTag['name']];
            }
        }
        return $newTags;
    }

    protected function sortData($request)
    {
        $updateDatas = Portfolio::where('uToken', $this->uToken)->get(['allTags', 'details'])->toArray();
        $allTags = $updateDatas[0]['allTags'];
        $details = $updateDatas[0]['details'];

        if ($request->newCategory !== null) {
            $allTags = $this->addNewTag($allTags, $request);
            $request['category'] = $request->newCategory;
        }
        if ($request->type == 'Image') {
            $details = $this->isImageData($request, $details);
        } else {
            if ($request->type == 'PDF') {
                $details = $this->isPDFData($request, $details);
            } else {
                $details = $this->isWebsiteData($request, $details);
            }
        }

//        $details = json_encode($details);

        return ['allTags' => $allTags, 'details' => $details];
    }

    protected function addNewTag($allTags, $request)
    {
        $request['newCategory'] = str_replace(' ', '_', trim($request['newCategory']));
        array_push(
            $allTags,
            [
                'name' => $request['newCategory'],
            ]
        );

        return $allTags;
    }

    protected function isImageData($request, $details)
    {
        array_push(
            $details,
            [
                'name' => $request['name'],
                'tag' => $request['category'],
                'fileUrl' => $request['thumbUrl'],
                'thumbUrl' => $request['thumbUrl'],
                'type' => $request['type'],
            ]
        );

        return $details;
    }

    protected function isPDFData($request, $details)
    {
        if ($request['thumbUrl'] == null) {
            // copy default image to user's folder
            $dirName = explode('uToken_', $this->uToken)[1];
            $defaultThumb = 'attachments/default/images/defaultPDF.png';
            $ownDefaultThumb = 'attachments/'.$dirName.'/images/defaultPDF.png';
            \File::copy($defaultThumb, $ownDefaultThumb);
            // End copy default image to user's folder

            $request['thumbUrl'] = $ownDefaultThumb;
        }
        array_push(
            $details,
            [
                'name' => $request['name'],
                'tag' => $request['category'],
                'fileUrl' => $request['fileUrl'],
                'thumbUrl' => $request['thumbUrl'],
                'type' => $request['type'],
            ]
        );

        return $details;
    }

    protected function isWebsiteData($request, $details)
    {

        if ($request['thumbUrl'] == null) {
            // copy default image to user's folder
            $dirName = explode('uToken_', $this->uToken)[1];
            $defaultThumb = 'attachments/default/images/defaultWebsite.jpg';
            $ownDefaultThumb = 'attachments/'.$dirName.'/images/defaultWebsite.jpg';
            \File::copy($defaultThumb, $ownDefaultThumb);
            // End copy default image to user's folder

            $request['thumbUrl'] = $ownDefaultThumb;
        }
        array_push(
            $details,
            [
                'name' => $request['name'],
                'tag' => $request['category'],
                'fileUrl' => $request['websiteUrl'],
                'thumbUrl' => $request['thumbUrl'],
                'type' => $request['type'],
            ]
        );

        return $details;
    }

}
