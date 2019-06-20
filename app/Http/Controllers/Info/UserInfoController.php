<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get param from url / Route
        $uToken = $request->route('uToken');
        $userInfo = UserInfo::where('uToken', $uToken)->first();
        if (!$userInfo) {
            $userInfo = UserInfo::where('uToken', 'default')->first();
        }
        $userInfo = json_encode($userInfo);

        return response($userInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserInfo $userInfo
     *
     * @return \Illuminate\Http\Response
     */
    public function show(UserInfo $userInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserInfo $userInfo
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(UserInfo $userInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\UserInfo     $userInfo
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInfo $userInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserInfo $userInfo
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInfo $userInfo)
    {
        //
    }
}
