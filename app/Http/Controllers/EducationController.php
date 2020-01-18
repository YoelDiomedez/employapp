<?php

namespace App\Http\Controllers;

use App\Education;
use App\Country;
use App\Degree;

use App\Http\Requests\EducationStoreRequest;
use App\Http\Requests\EducationUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::with(['degree', 'country'])
                       ->where('user_id', Auth::id())
                       ->paginate(10);
        
        return view('education.index', compact('education'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');
        $degrees   = Degree::pluck('description', 'id');

        return view('education.create', compact('countries', 'degrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\EducationStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationStoreRequest $request)
    {
        $education = new Education;

        $education->user_id       = Auth::id();
        $education->degree_id     = $request->degree_id;
        $education->country_id    = $request->country_id;
        $education->description   = trim(mb_strtoupper($request->description));
        $education->specialty     = trim(mb_strtoupper($request->specialty));
        $education->college       = trim(mb_strtoupper($request->college));
        $education->city          = trim(mb_strtoupper($request->city));
        $education->degree_date   = $request->degree_date;
        $education->degree_status = $request->degree_status;

        if($request->hasFile('degree_file')){

            $path = Storage::disk('public_uploads')->put('education', $request->degree_file);
            $name = substr($path, 10);
    
            $education->degree_file = $name;
        }

        $education->save();

        return redirect()->route('education.edit', $education->id)
                          ->with('success', 'Estudio Agregado Correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = Education::where('user_id', Auth::id())
                              ->where('id', $id)->firstOrFail();

        $countries = Country::pluck('name', 'id');
        $degrees   = Degree::pluck('description', 'id');

        return view('education.edit', compact('education', 'countries', 'degrees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  App\Http\Requests\EducationUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(EducationUpdateRequest $request, $id)
    {
        $education = Education::where('user_id', Auth::id())
                              ->where('id', $id)->firstOrFail();

        $education->degree_id     = $request->degree_id;
        $education->country_id    = $request->country_id;
        $education->description   = trim(mb_strtoupper($request->description));
        $education->specialty     = trim(mb_strtoupper($request->specialty));
        $education->college       = trim(mb_strtoupper($request->college));
        $education->city          = trim(mb_strtoupper($request->city));
        $education->degree_date   = $request->degree_date;
        $education->degree_status = $request->degree_status;

        if($request->hasFile('degree_file')){

            if (Storage::disk('public_uploads')->exists("education/$education->degree_file")) {
                Storage::disk('public_uploads')->delete("education/$education->degree_file");
            }

            $path = Storage::disk('public_uploads')->put('education', $request->degree_file);
            $name = substr($path, 10);
    
            $education->degree_file = $name;
        }
        
        $education->update();

        return redirect()->route('education.edit', $education->id)
                          ->with('warning', 'Estudio Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::where('user_id', Auth::id())
                              ->where('id', $id)->firstOrFail();

        if (Storage::disk('public_uploads')->exists("education/$education->degree_file")) {
            Storage::disk('public_uploads')->delete("education/$education->degree_file");
        }
        
        $education->delete();
        
        return back()->with('error', 'Estudio Eliminado Correctamente');
    }
       
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function delete($id)
   {
       $education = Education::where('user_id', Auth::id())
                             ->where('id', $id)->firstOrFail();

        Storage::disk('public_uploads')->delete("education/$education->degree_file");
        
        $education->degree_file = null;
        $education->update();
        
        return redirect()->route('education.edit', $education->id)
                          ->with('error', 'Archivo Eliminado Correctamente');
   }
}
