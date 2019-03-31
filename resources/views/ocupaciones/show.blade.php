@extends('layouts.admin')

@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/ocupaciones">Mis Trabajos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mostar Trabajo</li>
            </ol>
        </nav>
    </div>
    <h1>
        <i class="fas fa-briefcase"></i> Trabajo
        <a href="{{ route('ocupaciones.edit',$ocupacion) }}">
            <i class="fas fa-edit"></i>
        </a>
    </h1>
    <hr>
    <div class="container">
        <dl class="row">
            <dt class="col-sm-2">Empresa:</dt>
            <dd class="col-sm-4">{{ $ocupacion->empresa->nombre }}</dd>
            <dt class="col-sm-2">Puesto:</dt>
            <dd class="col-sm-4">{{ $ocupacion->puesto }}</dd>
            <dt class="col-sm-2">Tipo:</dt>
            <dd class="col-sm-4">{{ $ocupacion->antiguedad }}</dd>
            <dt class="col-sm-2">Descripcion:</dt>
            <dd class="col-sm-4">{{ $ocupacion->descripcion}}</dd>

        </dl>
    </div>

@endsection
