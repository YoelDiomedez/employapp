<?php

namespace App\Http\Controllers;

use App\User;
use App\Career;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $engineering = Career::skip(0)->take(16)->pluck('name', 'id');
        $biomedical  = Career::skip(16)->take(6)->pluck('name', 'id');
        $social      = Career::skip(22)->take(13)->pluck('name', 'id');
        $roles       = Role::get();

        $careers = array(
            'Escuelas Profesionales de Ingenierías' => $engineering,
            'Escuelas Profesionales de Biomédicas'  => $biomedical,
            'Escuelas Profesionales de Sociales'    => $social
        );

        $selected = $user->careers->pluck('id');

        return view('users.edit', compact('user', 'roles', 'careers', 'selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserUpdateRequest $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->dni              = trim($request->dni);
        $user->name             = trim(mb_strtoupper($request->name));
        $user->paternal_surname = trim(mb_strtoupper($request->paternal_surname));
        $user->maternal_surname = trim(mb_strtoupper($request->maternal_surname));
        $user->birth_date       = $request->birth_date;
        $user->gender           = $request->gender;
        
        if($request->email && $user->roles[0]->id === 1){ 
            $user->email = trim($request->email);
        }

        $user->update();
        $user->roles()->sync($request->get('roles'));
        $user->careers()->sync($request->get('careers'));

        return redirect()->route('users.edit', $user->id)
                         ->with('warning', 'Usuario Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return back()->with('error', 'Usuario Eliminado Correctamente');
    }
}