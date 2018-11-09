@extends('layouts.app')

@section('titulo_pagina','Procesos')
@section('css_adicional')
    <link rel="stylesheet" href="{{asset('assets/lib/data-table/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('contenido')
    <div class="content mt-3">
    <div class="animated fadeIn">
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Procesos Registrados</strong>
                            <div class="pull-right" style="right: 50px">
                                <a class="btn btn-primary mb-1" href="{{route('crear_proceso')}}">
                                    <i class="fa fa-plus"></i> Agregar Proceso
                                </a>
                            </div>
                            
                        </div>
                        <div class="card-body">
                  <table id="procesos" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Proceso</th>
                        <th>Sede</th>
                        <th>Presupuesto</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($procesos as $proceso)
                          <tr>
                            <td>{{date('d-m-Y',strtotime($proceso->fecha))}}</td>
                            <td>{{$proceso->usuario}}</td>
                            <td>{{$proceso->numero}}</td>
                            <td>{{$proceso->sede}}</td>
                            <td class="COP">{{'$'.number_format($proceso->presupuesto,2,",",".").' COP'}} / {{'$'.number_format($proceso->presupuesto/3000,2,",",".").' USD'}}</td>
                            <td>
                                <a href="{{route('detalle_proceso',$proceso->numero)}}" class="btn btn-primary actions"><i class="fa fa-eye"></i></a>
                                <a href="{{route('editar_proceso',$proceso->numero)}}" class="btn btn-warning actions"><i class="fa fa-edit"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


            
@endsection
@section('script_adicional')
    
    <script src="{{asset('assets/lib/data-table/js/datatables.min.js')}}"></script>
    <script src="{{asset('assets/lib/data-table/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/lib/data-table/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/lib/data-table/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/lib/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/lib/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/lib/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/lib/data-table/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/lib/data-table/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/lib/data-table/js/buttons.colVis.min.js')}}"></script>
    
    <script type="text/javascript">
        $('#procesos').DataTable({
        dom: 'lBfrtip',
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
             'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('#moneda').click(function() {
      console.log('Click con click');
    });

@endsection