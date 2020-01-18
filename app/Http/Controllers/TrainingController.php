<?php

namespace App\Http\Controllers;

use App\Training;
use App\Country;

use App\Http\Requests\TrainingStoreRequest;
use App\Http\Requests\TrainingUpdateRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::with('country')
                            ->where('user_id', Auth::id())
                            ->paginate(10);

        return view('trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');

        return view('trainings.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TrainingStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingStoreRequest $request)
    {
        $training = new Training;

        $training->user_id     = Auth::id();
        $training->country_id  = $request->country_id;
        $training->description = trim(mb_strtoupper($request->description));
        $training->start_date  = $request->start_date;
        $training->end_date    = $request->end_date;
        $training->institution = trim(mb_strtoupper($request->institution));
        $training->city        = trim(mb_strtoupper($request->city));
        $training->hours       = $request->hours;

        if($request->hasFile('file')){

            $path = Storage::disk('public_uploads')->put('training', $request->file);
            $name = substr($path, 9);
    
            $training->file = $name;
        }

        $training->save();

        return redirect()->route('trainings.edit', $training->id)
                          ->with('success', 'Capacitación Agregada Correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::where('user_id', Auth::id())
                            ->where('id', $id)->firstOrFail();

        $countries = Country::pluck('name', 'id');
        
        return view('trainings.edit', compact('training', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\TrainingUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(TrainingUpdateRequest $request, $id)
    {
        $training = Training::where('user_id', Auth::id())
                            ->where('id', $id)->firstOrFail();
        
        $training->country_id  = $request->country_id;
        $training->description = trim(mb_strtoupper($request->description));
        $training->start_date  = $request->start_date;
        $training->end_date    = $request->end_date;
        $training->institution = trim(mb_strtoupper($request->institution));
        $training->city        = trim(mb_strtoupper($request->city));
        $training->hours       = $request->hours;

        if($request->hasFile('file')){

            if (Storage::disk('public_uploads')->exists("training/$training->file")) {
                Storage::disk('public_uploads')->delete("training/$training->file");
            }

            $path = Storage::disk('public_uploads')->put('training', $request->file);
            $name = substr($path, 9);
    
            $training->file = $name;
        }

        $training->update();

        return redirect()->route('trainings.edit', $training->id)
                          ->with('warning', 'Capacitación Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::where('user_id', Auth::id())
                            ->where('id', $id)->firstOrFail();

        if (Storage::disk('public_uploads')->exists("training/$training->file")) {
            Storage::disk('public_uploads')->delete("training/$training->file");
        }

        $training->delete();
        
        return back()->with('error', 'Capacitación Eliminada Correctamente');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function delete($id)
    {
        $training = Training::where('user_id', Auth::id())
                            ->where('id', $id)->firstOrFail();
 
        Storage::disk('public_uploads')->delete("training/$training->file");
         
        $training->file = null;
        $training->update();
         
        return redirect()->route('trainings.edit', $training->id)
                          ->with('error', 'Archivo Eliminado Correctamente');
    }
}
