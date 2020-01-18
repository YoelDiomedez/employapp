@extends('layouts.app')
@section('pagetitle', 'Usuarios')
@section('pagesubtitle', 'Users')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('users.index') }}">Usuarios</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Lista</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="portlet light">
            <div class="portlet-title">

            </div>
            <div class="portlet-body">
                @if (session('info'))
                <div class="alert alert-info text-center">
                    <button class="close" data-close="alert"></button>
                    <span  role="alert">
                        <strong>{{ session('info') }}</strong>
                    </span>
                </div>
                @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>DNI</th>
                                    <th>Nombres</th>
                                    <th>E-Mail</th>
                                    <th class="text-center" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->dni }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    @can('users.edit')
                                    <td class="text-center">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn yellow btn-outline">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    @endcan

                                    @can('users.destroy')
                                    <td class="text-center">
                                        {!! Form::open([
                                            'route' => ['users.destroy', $user->id],
                                            'method' => 'DELETE'
                                        ]) !!}
                                            <button class="btn red btn-outline">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                    @endcan 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection