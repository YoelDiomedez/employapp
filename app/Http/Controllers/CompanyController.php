<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with('user')->paginate(10);

        return view('business.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CompanyStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        $user = new User;

        $user->dni              = trim($request->dni);
        $user->name             = trim(mb_strtoupper($request->name));
        $user->paternal_surname = trim(mb_strtoupper($request->paternal_surname));
        $user->maternal_surname = trim(mb_strtoupper($request->maternal_surname));
        $user->birth_date       = $request->birth_date;
        $user->gender           = $request->gender;
        $user->email            = trim($request->email);
        $user->password         = Hash::make($request->password);
       
        $user->save();

        $user->roles()->sync([3]);

        $company = new Company;

        $company->user_id         = $user->id;
        $company->business_name   = trim(mb_strtoupper($request->business_name));
        $company->ruc             = trim($request->ruc);
        $company->address         = trim(mb_strtoupper($request->address));
        $company->phone_or_mobile = trim($request->phone_or_mobile);

        $company->save();

        return back()->with('success', 'Entidad o Empresa Agregado Correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $company = Company::where('user_id', Auth::id())->firstOrFail();

        return view('business.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CompanyUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request)
    {
        $company = Company::where('user_id', Auth::id())->firstOrFail();

        $company->business_name   = trim(mb_strtoupper($request->business_name));
        $company->ruc             = trim($request->ruc);
        $company->address         = trim(mb_strtoupper($request->address));
        $company->phone_or_mobile = trim($request->phone_or_mobile);

        $company->update();

        $user = User::findOrFail(Auth::id());

        $user->dni              = trim($request->dni);
        $user->name             = trim(mb_strtoupper($request->name));
        $user->paternal_surname = trim(mb_strtoupper($request->paternal_surname));
        $user->maternal_surname = trim(mb_strtoupper($request->maternal_surname));
        $user->birth_date       = $request->birth_date;
        $user->gender           = $request->gender;
        $user->email            = trim($request->email);

        if($request->current_password      != null && 
           $request->password              != null &&
           $request->password_confirmation != null){

            $user->password = Hash::make($request->password);
        }
        
        $user->update();
        
        return redirect()->route('business.edit')
                          ->with('warning', 'Entidad o Empresa Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        
        return back()->with('error', 'Entidad o Empresa Eliminado Correctamente');
    }
}
