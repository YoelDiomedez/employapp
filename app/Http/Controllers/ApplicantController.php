<?php

namespace App\Http\Controllers;

use App\User;
use App\Training;
use App\Applicant;
use App\Education;
use App\Experience;

use App\Http\Requests\ApplicantUpdateRequest;
use App\Http\Requests\ApplicantUploadRequest;
use App\Http\Requests\ApplicantChangeRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicantController extends Controller
{
    /**
     * Upload a profile picture resource in storage.
     *
     * @param  ApplicantUploadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(ApplicantUploadRequest $request)
    {
        $user = User::findOrFail(Auth::id());

        if (Storage::disk('public')->exists("profile/$user->profile_picture")) {
            Storage::disk('public')->delete("profile/$user->profile_picture");
        }

        $path = Storage::disk('public')->put('profile', $request->profile_picture);
        $name = substr($path, 8);

        $user->profile_picture = $name;
        
        $user->update();

        return back()->with('warning', 'Fotografia Actualizada Correctamente');
    }

    /**
     * Change a password user resource in storage.
     *
     * @param  ApplicantChangeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function change(ApplicantChangeRequest $request)
    {
        $user = User::findOrFail(Auth::id());
        
        $user->password = Hash::make($request->password);

        $user->update();

        return back()->with('warning', 'Contraseña Actualizada Correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $education   = Education::with(['degree', 'country'])->where('user_id', Auth::id())->get()->count(); 
        $trainings   = Training::with('country')->where('user_id', Auth::id())->get()->count();
        $experiences = Experience::where('user_id', Auth::id())->get()->count();

        $applicant = Applicant::where('user_id', Auth::id())->firstOrFail();
        
        return view('applicants.edit', compact('applicant', 'education', 'trainings', 'experiences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ApplicantUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicantUpdateRequest $request)
    {
        $user      = User::findOrFail(Auth::id());
        $applicant = Applicant::where('user_id', Auth::id())->firstOrFail();

        $user->email                 = trim($request->email);
        $applicant->ruc              = trim($request->ruc);
        $applicant->cellphone_number = trim($request->cellphone_number);
        $applicant->marital_status   = $request->marital_status;
        $applicant->address          = trim(mb_strtoupper($request->address));
        $applicant->department_id    = $request->department_id;
        $applicant->province_id      = $request->province_id;
        $applicant->district_id      = $request->district_id;
        $applicant->tuition_number   = trim($request->tuition_number);
        
        if($request->hasFile('ffaa_file')){

            $path = Storage::disk('public')->put('applicant', $request->ffaa_file);
            $name = substr($path, 10);
    
            $applicant->ffaa_file = $name;
        }

        if($request->hasFile('disability_file')){

            $path = Storage::disk('public')->put('applicant', $request->disability_file);
            $name = substr($path, 10);
    
            $applicant->disability_file = $name;
        }

        $applicant->update();
        $user->update();

        return back()->with('warning', 'Datos Actualizados Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $applicant = Applicant::where('user_id', Auth::id())->firstOrFail();

        if($applicant->ffaa_file == $request->ffaa_file_name){
            if (Storage::disk('public')->exists("applicant/$request->ffaa_file_name")) {
                Storage::disk('public')->delete("applicant/$request->ffaa_file_name");
                $applicant->ffaa_file = null;
                $applicant->update();
            }
        }

        if($applicant->disability_file == $request->disability_file_name){

            if (Storage::disk('public')->exists("applicant/$request->disability_file_name")) {
                Storage::disk('public')->delete("applicant/$request->disability_file_name");
                $applicant->disability_file = null;
                $applicant->update();
            }
        }

        return back()->with('error', 'Archivo Eliminado Correctamente');
    }

}
