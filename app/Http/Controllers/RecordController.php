<?php

namespace App\Http\Controllers;

use App\User;
use App\Applicant;
use App\Education;
use App\Training;
use App\Experience;

use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $applicant   = Applicant::with(['department', 'province', 'district'])->where('user_id', Auth::id())->firstOrFail();
        $education   = Education::with(['degree', 'country'])->where('user_id', Auth::id())->get();
        $trainings   = Training::with('country')->where('user_id', Auth::id())->get();
        $experiences = Experience::where('user_id', Auth::id())->get();

        return view('records.index', compact('applicant', 'education', 'trainings', 'experiences'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function see()
    {
        $user          = User::findOrFail(Auth::id());
        $announcements = $user->announcements()->paginate(10);

        return view('records.see', compact('announcements'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user        = User::findOrFail($id);
        $applicant   = Applicant::with(['department', 'province', 'district'])->where('user_id', $id)->firstOrFail();
        $education   = Education::with(['degree', 'country'])->where('user_id', $id)->get();
        $trainings   = Training::with('country')->where('user_id', $id)->get();
        $experiences = Experience::where('user_id', $id)->get();

        return view('records.show', compact('user', 'applicant', 'education', 'trainings', 'experiences'));
    }
}
