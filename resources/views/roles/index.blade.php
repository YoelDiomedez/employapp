@extends('layouts.app')
@section('pagetitle', 'Roles')
@section('pagesubtitle', 'Roles')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('roles.index') }}">Roles</a>
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
                @can('roles.create')
                    <a href="{{ route('roles.create') }}" class="btn blue btn-outline">
                        <i class="fa fa-plus"></i>  Agregar
                    </a>
                @endcan
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead >
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Slug (URL)</th>
                                <th>Especial</th>
                                <th class="text-center" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td class="uppercase">{{ ($role->special === null) ? 'N/A' : $role->special }}</td>

                                @can('roles.edit')
                                <td class="text-center">
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn yellow btn-outline">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                @endcan 

                                @can('roles.destroy')
                                <td class="text-center">
                                    {!! Form::open([
                                        'route' => ['roles.destroy', $role->id],
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
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection