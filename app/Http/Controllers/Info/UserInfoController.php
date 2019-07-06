<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    protected $uToken;
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index'
        ]);
        $this->uToken = uToken();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get param from url / Route
        $uToken = $request->route('uToken');
        // Get user info by user Token
        $userInfo = UserInfo::where('uToken', $uToken)->first();
        // First login no data then
        if (!$userInfo) {
            // For user first login, replicate a default data and assign to user's uToken
            $userInfo = UserInfo::where('uToken', 'default')->first()->replicate();
            $userInfo->uToken = $uToken;
            $userInfo->save();
        }
        $userInfo = json_encode($userInfo);
        return response($userInfo);
    }

    public function storeBasicInfo(Request $request)
    {
        // Home component
        // get uToken from url
        $uToken = $request->route('uToken');
        $data = json_encode($request->all());
        UserInfo::where('uToken',$uToken)->update(['basicInfo' => $data],['userId' => auth()->user()->id]);
        return ['code' => 1, 'type' => 'success', 'message' => 'Data updated'];
    }

    public function store(Request $request)
    {
        // Menu & Home components
        UserInfo::updateOrCreate(
            ['uToken' => $request->uToken],//查找条件
            [
                'name' => $request->name,
                'image' => $request->image,
                'titles' => $request->titles,
                'userId' => auth()->user()->id,
            ]//添加更新的数据
        );
//        $data = array_pop($data);
//        $data = json_decode(json_encode($data),true);
//        $data->titles->toArray();
//        $data = json_encode($data);
        return ['code' => 1, 'type' => 'success', 'message' => 'Data updated'];
    }

    public function storeBackground(Request $request)
    {
        UserInfo::where('uToken',$this->uToken)->update([
            'background' => $request->url,
        ]);
        return ['code' => 1, 'type' => 'success', 'message' => 'Background changed'];
    }

}
