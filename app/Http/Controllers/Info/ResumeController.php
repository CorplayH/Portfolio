<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
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
        $resumeInfo = Resume::where('uToken', $this->uToken)->first();
        if (!$resumeInfo) {
            // For user first login, replicate a default data and assign to user's uToken
            $resumeInfo = Resume::where('uToken', 'default')->first()->replicate();
            $resumeInfo->uToken = $this->uToken;
            $resumeInfo->save();
        }
        $resumeInfo = json_encode($resumeInfo);

        return response($resumeInfo);

    }

    public function updateEducations(Request $request)
    {
        $data = json_encode($request->all());
        Resume::where('uToken', $this->uToken)->update(['educations' => $data], ['userId' => auth()->user()->id]);

        return ['code' => 1, 'type' => 'success', 'message' => 'Data updated'];
    }

    public function updateExperiences(Request $request)
    {
        $data = json_encode($request->all());
        Resume::where('uToken', $this->uToken)->update(['experiences' => $data], ['userId' => auth()->user()->id]);

        return ['code' => 1, 'type' => 'success', 'message' => 'Data updated'];

    }

    public function updateSkills(Request $request)
    {
        $data = json_encode($request->all());
        Resume::where('uToken', $this->uToken)->update(['skills' => $data], ['userId' => auth()->user()->id]);

        return ['code' => 1, 'type' => 'success', 'message' => 'Data updated'];

    }

    public function updateCv(Request $request)
    {
        $data = json_encode($request->all());
        Resume::where('uToken', $this->uToken)->update(['cvUrl' => $data], ['userId' => auth()->user()->id]);

        return ['code' => 1, 'type' => 'success', 'message' => 'Data updated'];

    }
}
