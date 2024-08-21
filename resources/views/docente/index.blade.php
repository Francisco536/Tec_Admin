@extends('adminlte::page')

@section('content_header')
    <h4>Listado de docentes</h4>
@stop

@section('content')
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success" role="success">
            {{session('success')}}
        </div>
        @endif
        @if (session('message'))
        <div class="alert alert-danger" role="message">
            {{session('message')}}
        </div>
        @endif
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <div class="col-md-2">
                    <a href="{{route('add.docente')}}" type="button" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Nuevo</a>
                </div>
            </div>

            <div class="d-flex justify-content-start">
                <form class="d-flex" role="search" action="{{route('lista.docente')}}" method="GET">

                    <input name="name" class="form-control me-2" type="search" placeholder="Nombre" aria-label="Search"  required>
                    <button class="btn btn-success" type="submit">Buscar</button>
                    <a class="btn btn-warning" id="limpiar" href="{{route('lista.docente')}}">Limpiar</a>
                  </form>
            </div>
            <br>


        </div>
        {{-- <div class="card-body "> --}}
            <div class="table-responsive-sm">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Sexo</th>
                            <th>Carrera</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if(isset($collection))

                            @foreach ($collection as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->ap_pater }}</td>
                                    <td>{{ $value->ap_mater }}</td>
                                    <td>{{ $value->sexo}}</td>
                                    <td>{{ $value->carrera}}</td>
                                    <td>{{ $value->no_control}}</td>
                                    <td>{{ $value->anio}}</td>
                                    <td>{{ $value->periodo}}</td>
                                    <td>{{ $value->telefono}}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a  href="{{route('show.docente', $value->id)}}"  class="btn-sm btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fas fa-eye"></i></a>
                                            <a  href="{{route('edit.docente', $value->id)}}"  class="btn-sm btn-rounded btn-warning mb-3" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('destroy.docente', $value->id) }}" class="btn-sm btn-rounded btn-danger mb-3" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No se encontrarón registros</td>
                            </tr>
                        @endif --}}
                    </tbody>
                </table>
                </div>
                <div class="d-flex justify-content-start">
                 {{-- <h6><em>{{ 'Total de alumnos:'. ' ' . $collection->count() }}</em></h6> --}}
                </div>
                <div class="d-flex justify-content-end">
                    {{-- {!! $collection->links() !!} --}}
                </div>
        {{-- </div> --}}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
     $(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    },3000);

});
$(document).ready(function() {
  $('#limpiar').click(function() {
    $('input[type="search"]').val('');
  });
});
    </script>
@stop
