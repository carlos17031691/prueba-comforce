@extends('layouts.app')

@section('titulo_pagina','Crear Proceso')
@section('contenido')
    <div class="content mt-3">
    <div class="animated fadeIn">
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Registrar Proceso</strong>                           
                        </div>
                        <div class="card-body">
                            <form action="{{route('registrar_proceso')}}" method="post" accept-charset="UTF-8">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                      <label for="numero" class="control-label mb-1">Numero de Proceso</label>
                                      <div class="input-group">
                                        <input id="numero" name="numero" type="text" class="form-control" required readonly value="{{str_shuffle('12345678')}}" maxlength="8">
                                      </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                      <label for="fecha" class="control-label mb-1">Fecha</label>
                                      <div class="input-group">
                                        <input id="fecha" name="fecha" type="text" class="form-control" required readonly value="{{date('d-m-Y')}}">
                                      </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                      <label for="numero" class="control-label mb-1">Sede</label>
                                      <div class="input-group">
                                        <select class="form-control" required name="sede" id="sede">
                                            <option value="">Seleccione una Sede</option>
                                            @foreach($sedes as $sede)
                                                <option value="{{$sede->id}}">{{$sede->descripcion}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                      <label for="presupuesto" class="control-label mb-1">Presupuesto</label>
                                      <div class="input-group">
                                        <input id="presupuesto" name="presupuesto" type="number" step="0.01" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                      <label for="descripcion" class="control-label mb-1">Descripcion</label>
                                      <div class="input-group">
                                        <textarea id="descripcion" name="descripcion" type="text" class="form-control" required style="resize: none"></textarea>
                                      </div>
                                    </div>    
                                </div>
                                <button class="btn btn-primary form-control"><i class="fa fa-save"></i> Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>


            
@endsection
@section('script_adicionales')
    
    <script type="text/javascript">
        $('#procesos').DataTable({
        dom: 'lBfrtip',
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
             'csv', 'excel', 'pdf', 'print'
        ]
    });
    
    </script>
@endsection