<?php

namespace App\Http\Controllers;

use App\User;
use App\Career;
use App\Company;
use App\Document;
use App\Applicant;
use App\Education;
use App\Announcement;

use App\Http\Requests\AnnouncementStoreRequest;
use App\Http\Requests\AnnouncementUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Asigna valores a las variables $year y $month según los atributos del objeto request o los valores de la función date
     * Comprueba que el id del rol del usuario en sesión sea o 1 (admin business) o 2 (applicant)
     * Para el rol 1 retorna una vista con todos elementos del objeto Announcement paginados de 5 en 5
     * Para el rol 2 retorna una vista con todos elementos del objeto Announcement filtrados por la variable $careerids paginados de 5 en 5
     * Para cualquier rol diferente a 1 o 2 redirecciona al home
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {   
        $year          = ($request->year)  ? $request->year  : date('Y');
        $month         = ($request->month) ? $request->month : date('m');
        $announcements = null;
        
        switch (Auth::user()->roles[0]->id) {
            case 3: // admin business
                $company       = Company::where('user_id', Auth::id())->firstOrFail();
                $announcements = Announcement::where('company_id', $company->id)
                                         ->whereYear('start_date', $year)
                                        ->whereMonth('start_date', $month)
                                          ->paginate(5);

                return view('announcements.index', compact('announcements', 'year', 'month'));
            break;

            case 2: // applicant

                $announcements = Announcement::whereYear('start_date', $year)
                                            ->whereMonth('start_date', $month)
                ->whereHas('careers', function ($query) {

                    foreach (Auth::user()->careers as $career) {
                        $careerids[] = $career->id;
                    }

                    $query->whereIn('career_id', $careerids);

                })->paginate(5);
                
                return view('announcements.index', compact('announcements', 'year', 'month'));
            break;

            default: // neither admin business nor applicant
            return redirect()->route('home');
        }
    }

    /**
     * Muestra la vista para crear un nuevo objeto de la clase Announcement y se le pasa un objeto de la clase Career
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::select('business_name')->where('user_id', Auth::id())->firstOrFail();
        $careers = Career::all();

        return view('announcements.create', compact('careers', 'company'));
    }

    /**
     * Crea un nuevo objeto de la clase Announcement para asignarle los valores del objeto request
     * Comprueba que en los atributos bases y annexes del objeto request existan archivos para así almacenarlos
     * Almacena el objeto recién creado de la clase Announcement en la base de datos
     * Sincroniza el objeto recién creado de la clase Announcement con el/los id(s) de atributo career_ids del objeto request
     *
     * @param  App\Http\Requests\AnnouncementStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementStoreRequest $request)
    {
        $company      = Company::where('user_id', Auth::id())->firstOrFail();

        $announcement =  new Announcement;
        
        $announcement->company_id = $company->id;
        $announcement->start_date = $request->start_date;
        $announcement->end_date   = $request->end_date;
        $announcement->position   = trim(mb_strtoupper($request->position));

        if($request->hasFile('bases')){

            $path = Storage::disk('public')->put('announcement', $request->bases);
            $name = substr($path, 13);
    
            $announcement->bases = $name;
        }

        if($request->hasFile('annexes')){

            $path = Storage::disk('public')->put('announcement', $request->annexes);
            $name = substr($path, 13);
    
            $announcement->annexes = $name;
        }

        $announcement->save();
        $announcement->careers()->sync($request->career_ids);

        return redirect()->route('announcements.edit', $announcement->id)
                          ->with('success', 'Convocatoria Registrada Correctamente');
    }

    /**
     * Muestra el detalle de un objeto especifico de la clase Announcement
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company      = Company::where('user_id', Auth::id())->firstOrFail();
        $announcement = Announcement::where('id', $id)
                                    ->where('company_id', $company->id)
                                    ->firstOrFail();

        return view('announcements.show', compact('announcement'));
    }

    /**
     * Muestra la vista para editar un objeto especifico de la clase Announcement y se le pasa un objeto de la clase Career
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company      = Company::where('user_id', Auth::id())->firstOrFail();
        $announcement = Announcement::where('id', $id)
                                    ->where('company_id', $company->id)
                                    ->firstOrFail();

        $careers = Career::all();

        return view('announcements.edit', compact('announcement', 'careers', 'company'));
    }

    /**
     * Actualiza los atributos de un objeto especifico de la clase Announcement para asignarle los valores del objeto request
     * Comprueba que en los atributos partial_results y final_results del objeto request existan archivos para así almacenarlos
     * Actualiza el objeto especifico de la clase Announcement en la base de datos
     * Sincroniza el objeto especifico de la clase Announcement con el/los id(s) de atributo career_ids del objeto request
     * 
     * @param  App\Http\Requests\AnnouncementUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementUpdateRequest $request, $id)
    {
        $company      = Company::where('user_id', Auth::id())->firstOrFail();
        $announcement = Announcement::where('id', $id)
                                    ->where('company_id', $company->id)
                                    ->firstOrFail();

        $announcement->start_date = $request->start_date;
        $announcement->end_date   = $request->end_date;
        $announcement->position   = trim(mb_strtoupper($request->position));

        if($request->hasFile('bases')){

            $path = Storage::disk('public')->put('announcement', $request->bases);
            $name = substr($path, 13);
    
            $announcement->bases = $name;
        }

        if($request->hasFile('annexes')){

            $path = Storage::disk('public')->put('announcement', $request->annexes);
            $name = substr($path, 13);
    
            $announcement->annexes = $name;
        }

        if($request->hasFile('partial_results')){

            $path = Storage::disk('public')->put('announcement', $request->partial_results);
            $name = substr($path, 13);
    
            $announcement->partial_results = $name;
        }

        if($request->hasFile('final_results')){

            $path = Storage::disk('public')->put('announcement', $request->final_results);
            $name = substr($path, 13);
    
            $announcement->final_results = $name;
        }

        $announcement->update();
        $announcement->careers()->sync($request->career_ids);

        return redirect()->route('announcements.edit', $announcement->id)
                          ->with('warning', 'Convocatoria Actualizada Correctamente');
    }

    /**
     * Comprueba que los atributos bases, annexes, partial_results y final_results de un objeto especifico de la clase Announcement existan archivos para así eliminarlos
     * Elimina el objeto de la base de datos 
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company      = Company::where('user_id', Auth::id())->firstOrFail();
        $announcement = Announcement::where('id', $id)
                                    ->where('company_id', $company->id)
                                    ->firstOrFail();

        if (Storage::disk('public')->exists("announcement/$announcement->bases")) {
            Storage::disk('public')->delete("announcement/$announcement->bases");
        }

        if (Storage::disk('public')->exists("announcement/$announcement->annexes")) {
            Storage::disk('public')->delete("announcement/$announcement->annexes");
        }

        if (Storage::disk('public')->exists("announcement/$announcement->partial_results")) {
            Storage::disk('public')->delete("announcement/$announcement->partial_results");
        }

        if (Storage::disk('public')->exists("announcement/$announcement->final_results")) {
            Storage::disk('public')->delete("announcement/$announcement->final_results");
        }

        $announcement->delete();
        
        return back()->with('error', 'Convocatoria Eliminada Correctamente');
    }

    /**
     * Comprueba que el atributo del objeto request sean o bien bases o annexes o partial_results o final_results
     * Comprueba que los atributos bases, annexes, partial_results y final_results de un objeto especifico de la clase Announcement existan archivos para así eliminarlos
     * Asigna el valor null por cada atributo al objeto especifico de la clase Announcement por cada archivo eliminado
     * Actualiza el objeto especifico de la clase Announcement en la base de datos
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $company      = Company::where('user_id', Auth::id())->firstOrFail();
        $announcement = Announcement::where('id', $id)
                                    ->where('company_id', $company->id)
                                    ->firstOrFail();

        if($request->bases){
            if (Storage::disk('public')->exists("announcement/$announcement->bases")) {
                Storage::disk('public')->delete("announcement/$announcement->bases");
                $announcement->bases = null;
            }
        }

        if($request->annexes){
            if (Storage::disk('public')->exists("announcement/$announcement->annexes")) {
                Storage::disk('public')->delete("announcement/$announcement->annexes");
                $announcement->annexes = null;
            }
        }

        if($request->partial_results){
            if (Storage::disk('public')->exists("announcement/$announcement->partial_results")) {
                Storage::disk('public')->delete("announcement/$announcement->partial_results");
                $announcement->partial_results = null;
            }
        }

        if($request->final_results){
            if (Storage::disk('public')->exists("announcement/$announcement->final_results")) {
                Storage::disk('public')->delete("announcement/$announcement->final_results");
                $announcement->final_results = null;
            }
        }

        $announcement->update();
        
        return redirect()->route('announcements.edit', $announcement->id)
                          ->with('error', 'Archivo Eliminado Correctamente');
    }

    /**
     * Actualiza el atributo state de un objeto especifico de la clase Announcement a 0 (finalizado) | 1 (vigente) según el objeto request
     * Actualiza cada atributo selected del objeto de la clase Announcement a 1 (seleccionado) | 0 (no seleccionado) según el objeto request
     * Comprueba los atributos partial_results y final_results antes de actualizar a 0 (finalizado) el atributo state del objeto de la clase Announcement
     * Actualiza cada atributo applying de un objeto especifico de la clase User a 0 (disponible) si el atributo state del objeto de la clase Announcement es 0 (finalizado)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request, $id)
    {
        $company      = Company::where('user_id', Auth::id())->firstOrFail();
        $announcement = Announcement::where('id', $id)
                                    ->where('company_id', $company->id)
                                    ->firstOrFail();

        $applicants = array();

        foreach ($announcement->users as $applicant) {
            $applicants[] = $applicant->id;
        }


        $selected   = ($request->selected != null) ? $request->selected                               : null;
        $unselected = ($selected          != null) ? array_values(array_diff($applicants, $selected)) : $applicants;

        if($request->state){ // 1 true Continua la Convocatoria

            if($selected != null ){
                for($i = 0; $i < count($selected); $i++){
                    $announcement->users()->updateExistingPivot($selected[$i], ['selected' => 1]);
                }
            }

            for($j = 0; $j < count($unselected); $j++){
                $announcement->users()->updateExistingPivot($unselected[$j], ['selected' => 0]);
            }

            return redirect()->route('announcements.show', $announcement->id)
                              ->with('info', 'Postulantes Seleccionados Correctamente');

        } else { // 0 false Finaliza la Convocatoria

            if (
                Storage::disk('public')->exists("announcement/$announcement->partial_results") && 
                Storage::disk('public')->exists("announcement/$announcement->final_results") &&
                $announcement->partial_results != null &&
                $announcement->final_results   != null
            ) {
                if($selected != null ){
                    for($i = 0; $i < count($selected); $i++){

                        $user = User::findorFail($selected[$i]);
                        $announcement->users()->updateExistingPivot($selected[$i], ['selected' => 1]);
                        $user->applying = 0;
                        $user->update();
                    }
                }
    
                for($j = 0; $j < count($unselected); $j++){
    
                    $user = User::findorFail($unselected[$j]);
                    $announcement->users()->updateExistingPivot($unselected[$j], ['selected' => 0]);
                    $user->applying = 0;
                    $user->update();
                }

                $announcement->state = 0;
                $announcement->update();

                return redirect()->route('announcements.index')
                                  ->with('success', 'Convocatoria Finalizada Correctamente');

            } else {

                return redirect()->route('announcements.show', $announcement->id)
                                  ->with('error', 'Para Finalizar una Convocatoria debe subir los Archivos con el Resultado de la Evaluación Curricular y el Resultado Final');
            } 
        }
    }

    /**
     * Comprueba que el atributo profile_picture de un objeto especifico de la clase User no sea null
     * Comprueba que los atributos affidavit_file, vacancy_file, dni_file de un objeto especifico de la clase Document no sean null
     * Comprueba que los atributos ruc, address, province_id, district_id, department_id, marital_status, cellphone_number de un objeto especifico de la clase Applicant no sean null
     * Comprueba que los elementos del objeto Education sea mayor que 0
     * Actualiza el atributo applying de un objeto especifico de la clase User a 1 (postulando)
     * Vincula el objeto de la clase Announcement con el id de usuario en sesión (postulante)
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apply($id)
    {
        $announcement = Announcement::findOrFail($id);
        $user         = User::findOrFail(Auth::id());
        $document     = Document::where('user_id', Auth::id())->firstOrFail();
        $applicant    = Applicant::where('user_id', Auth::id())->firstOrFail();
        $education    = Education::where('user_id', Auth::id())->get();

        if (
            $user->profile_picture       != null &&

            $applicant->ruc              != null &&
            $applicant->address          != null &&
            $applicant->province_id      != null &&
            $applicant->district_id      != null &&
            $applicant->department_id    != null &&
            $applicant->marital_status   != null &&
            $applicant->cellphone_number != null &&

            $document->affidavit_file    != null &&
            $document->vacancy_file      != null &&
            $document->dni_file          != null &&

            count($education) > 0
        ) {

            $user->applying = 1;
            $user->update();
            $announcement->users()->attach(Auth::id());
    
            return back()->with('success', 'Usted ha Postulado Correctamente');

        } else {
            return back()->with('error', 'Compruebe que sus Datos esten Completos y vuelva a Postular');
        } 
    }
}
