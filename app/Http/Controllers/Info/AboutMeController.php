<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\AboutMe;
use Illuminate\Http\Request;

class AboutMeController extends Controller
{
    protected $uToken;

    public function __construct(Request $request)
    {
        $this->middleware('auth')->except(
            [
                'index',
            ]
        );
        $this->uToken = $request->route('uToken');
    }

    public function index(Request $request)
    {
        $aboutMeInfo = AboutMe::where('uToken', $this->uToken)->first();
        if (!$aboutMeInfo) {
            // For user first login, replicate a default data and assign to user's uToken
            $aboutMeInfo = AboutMe::where('uToken', 'default')->first()->replicate();
            $aboutMeInfo->uToken = $this->uToken;
            $aboutMeInfo->save();
        }
        $aboutMeInfo = json_encode($aboutMeInfo);

        return response($aboutMeInfo);

    }

    public function updateGeneralInfo(Request $request)
    {
        $data = json_encode($request->all());
        AboutMe::where('uToken', $this->uToken)->update(['generalInfo' => $data], ['userId' => auth()->user()->id]);

        return ['code' => 1, 'type' => 'success', 'message' => 'Data updated'];
    }

    public function updateTestimonials(Request $request)
    {
        $data = json_encode($request->all());
        AboutMe::where('uToken', $this->uToken)->update(['testimonials' => $data], ['userId' => auth()->user()->id]);

        return ['code' => 1, 'type' => 'success', 'message' => 'Data updated'];

    }

    public function updateStrength(Request $request)
    {
        $data = json_encode($request->all());
        AboutMe::where('uToken', $this->uToken)->update(['strengths' => $data], ['userId' => auth()->user()->id]);

        return ['code' => 1, 'type' => 'success', 'message' => 'Data updated'];

    }
}
