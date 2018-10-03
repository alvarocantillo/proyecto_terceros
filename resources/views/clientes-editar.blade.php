@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel-title">
        <h1>Clientes</h1>
        </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')


            <form action="{{ url('cliente') }}/{{ $cliente->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

            
                <div class="form-group">
                    <label for="nombres" class="control-label">Nombres</label>
                    <input type="text" name="nombres" class="form-control" value="{{ $cliente->nombres }}">
                </div>

                <div class="form-group">
                    <label for="apellidos" class="control-label">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" value="{{ $cliente->apellidos }}">
                </div>

                <div class="form-group">
                    <label for="cedula" class="control-label">Cedula</label>
                    <input type="text" name="cedula" class="form-control" value="{{ $cliente->cedula }}">
                </div>

                <div class="form-group">
                    <label for="telefono" class="control-label">Telefono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}">
                </div>

                <div class="form-group">
                    <label for="correo" class="control-label">Correo</label>
                    <input type="text" name="correo" class="form-control" value="{{ $cliente->correo }}">
                </div>

            <!-- Add Task Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Editar cliente
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection