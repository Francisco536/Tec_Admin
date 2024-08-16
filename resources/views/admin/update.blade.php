@extends('adminlte::page')

@section('content_header')
    <h1>Actualizar Usuario Administrator</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" name="updUser" id="updUser" action="{{ route('update.admin', $admin->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="{{ $admin->name }}" required autocomplete="name" autofocus>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ap_paterno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>
                            <div class="col-md-6">
                                <input id="ap_paterno" type="text" class="form-control" name="ap_paterno" value="{{ $admin->ap_paterno }}" required autocomplete="ap_paterno" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ap_materno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno') }}</label>
                            <div class="col-md-6">
                                <input id="ap_materno" type="text" class="form-control " name="ap_materno" value="{{ $admin->ap_materno }}" required autocomplete="ap_materno" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control"  name="telefono" value="{{ $admin->telefono}}" required autocomplete="telefono" >
                                <div id="alert0" class="alert alert-danger" style="display:none" role="alert">Ingresa solo números</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $admin->email }}" required autocomplete="email">
                                <div id="alert4" class="alert alert-danger" style="display:none" role="alert">Ingresa un correo valido</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div id="alert" class="alert alert-danger" style="display:none" role="alert">La contraseña no coincide!!</div>

                        <div class="row mb-0" style="text-align: center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>

                                <a href="{{route('lista.admin')}}" class="btn btn-danger">
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">

@stop

@section('js')
    <script>
    //primeras letras mayusculas
    function capitalize(str){
        return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
        }
        const input = document.getElementById('name');
        input.addEventListener('keypress', e => {
        setTimeout(() => {input.value = input.value.split(' ').map(x => capitalize(x)).join(' ')}, 1)
        })

        const input2 = document.getElementById('ap_pater');
        input2.addEventListener('keypress', e => {
        setTimeout(() => {input2.value = capitalize(input2.value)}, 1)
        })
        const input3 = document.getElementById('ap_mater');
        input3.addEventListener('keypress', e => {
        setTimeout(() => {input3.value = capitalize(input3.value)}, 1)
        })

        var useract = document.getElementById('updUser');
        useract.addEventListener("submit", (e) => {
        var exp = /[a-zA-Z0-9._-]+\@(gmail|outlook|hotmail)\.(com|es)$/;
        var correo = document.getElementById("email").value;
        var valido = exp.test(correo);
        if (valido === false){
            e.preventDefault();
         let x = document.getElementById("alert4");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert4").fadeOut(1000);
                    }, 1000);
        }

    });
//Validar contraseña
var adminLog = document.getElementById('updUser');
    adminLog.addEventListener("submit", (e) => {
        pass1 = document.getElementById('password');
        pass2 = document.getElementById('password-confirm');

     if (pass1.value !== pass2.value) {
         e.preventDefault();
         let x = document.getElementById("alert");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert").fadeOut(1000);
                    }, 1000);
  }
});

    </script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
@stop

