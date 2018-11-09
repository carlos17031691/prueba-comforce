@extends('layouts.app')
@section('titulo_pagina','Inicio')
@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Prueba Técnica MVC PHP</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <strong>Estimad@ {{Auth::user()->name}}, bienvenido al sistema...</strong>

                    <br>
                    <br>
                    <p>
                        La siguiente plataforma tiene como objetivo principal dar solución a la prueba remota asignada al aspirante de Desarrollador PHP (Sr,SSr,Jr), en donde se demostrará las habilidades y conocimientos en el lenguaje de programacion PHP.
                    </p>

                    <p>
                        Se requiere implementar el flujo de creación del proceso, debe existir una lista donde se muestren los procesos creados con un enlace que re-direccione a otra vista donde se muestre la información ingresada, debe permitir la opción de editar los datos del proceso.
                    </p>

                    <p>
                        <h4>Requisitos:</h4>
                        <li>Debe ser implementado en php bajo el patrón de diseño MVC.</li>
                        <li>Debe adjuntar el diagrama entidad – relación.</li> 
                        <li>Validaciones de datos.</li>
                        <h4>Puntos extra</h4>
                        <li>Utilizar Framework.</li>
                        <li>Implementación de sistema de login.</li>
                        <li>Mostrar presupuesto en Dólares y pesos.</li>
                        <li>En la lista de procesos realizar filtro por fecha de creación.</li>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
