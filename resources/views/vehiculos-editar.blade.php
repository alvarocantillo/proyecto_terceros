@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel-title">
        <h1>Vehiculos</h1>
        </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')


            <form action="{{ url('vehiculo') }}/{{ $vehiculo->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

            
                <div class="form-group">
                    <label for="cliente_id" class="control-label">Id cliente</label>
                    <input type="text" name="cliente_id" class="form-control" value="{{ $vehiculo->cliente_id }}">
                </div>

                <div class="form-group">
                    <label for="placa" class="control-label">Placa</label>
                    <input type="text" name="placa" class="form-control" value="{{ $vehiculo->placa }}">
                </div>

                <div class="form-group">
                    <label for="vin" class="control-label">Vin</label>
                    <input type="text" name="vin" class="form-control" value="{{ $vehiculo->vin }}">
                </div>

                <div class="form-group">
                    <label for="modelo" class="control-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control" value="{{ $vehiculo->modelo }}">
                </div>

                <div class="form-group">
                    <label for="ano" class="control-label">Año</label>
                    <input type="text" name="ano" class="form-control" value="{{ $vehiculo->ano }}">
                </div>

                <div class="form-group">
                    <label for="color" class="control-label">Color</label>
                    <input type="text" name="color" class="form-control" value="{{ $vehiculo->color }}">
                </div>

                <div class="form-group">
                    <label for="kilometraje" class="control-label">Kilometraje</label>
                    <input type="text" name="kilometraje" class="form-control" value="{{ $vehiculo->kilometraje }}">
                </div>

            <!-- Add Task Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Editar vehiculo
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection