<?php

namespace App\Http\Controllers;

use App\Experience;

use App\Http\Requests\ExperienceStoreRequest;
use App\Http\Requests\ExperienceUpdateRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::where('user_id', Auth::id())->paginate(10);

        return view('experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ExperienceStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceStoreRequest $request)
    {
        $experience = new Experience;

        $experience->user_id     = Auth::id();
        $experience->company     = trim(mb_strtoupper($request->company));
        $experience->position    = trim(mb_strtoupper($request->position));
        $experience->start_date  = $request->start_date;
        $experience->end_date    = $request->end_date;
        $experience->description = trim(mb_strtoupper($request->description));

        if($request->hasFile('file')){

            $path = Storage::disk('public')->put('experience', $request->file);
            $name = substr($path, 11);
    
            $experience->file = $name;
        }

        $experience->save();

        return redirect()->route('experiences.edit', $experience->id)
                          ->with('success', 'Experiencia Laboral Agregada Correctamente');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = Experience::where('user_id', Auth::id())
                                ->where('id', $id)->firstOrFail();

        return view('experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ExperienceUpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceUpdateRequest $request, $id)
    {
        $experience = Experience::where('user_id', Auth::id())
                                ->where('id', $id)->firstOrFail();

        $experience->company     = trim(mb_strtoupper($request->company));
        $experience->position    = trim(mb_strtoupper($request->position));
        $experience->start_date  = $request->start_date;
        $experience->end_date    = $request->end_date;
        $experience->description = trim(mb_strtoupper($request->description));

        if($request->hasFile('file')){

            if (Storage::disk('public')->exists("experience/$experience->file")) {
                Storage::disk('public')->delete("experience/$experience->file");
            }

            $path = Storage::disk('public')->put('experience', $request->file);
            $name = substr($path, 11);
    
            $experience->file = $name;
        }

        $experience->update();

        return redirect()->route('experiences.edit', $experience->id)
                          ->with('warning', 'Experiencia Laboral Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = Experience::where('user_id', Auth::id())
                                ->where('id', $id)->firstOrFail();

        if (Storage::disk('public')->exists("experience/$experience->file")) {
            Storage::disk('public')->delete("experience/$experience->file");
        }

        $experience->delete();
        
        return back()->with('error', 'Experiencia Laboral Eliminada Correctamente');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function delete($id)
    {
        $experience = Experience::where('user_id', Auth::id())
                                ->where('id', $id)->firstOrFail();
 
        Storage::disk('public')->delete("experience/$experience->file");
         
        $experience->file = null;
        $experience->update();
         
        return redirect()->route('experiences.edit', $experience->id)
                          ->with('error', 'Archivo Eliminado Correctamente');
    }
}
