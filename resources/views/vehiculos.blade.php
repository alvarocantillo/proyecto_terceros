@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel-title">
        <h1>Vehiculos</h1>
        </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
            <form action="{{ url('vehiculo')}}" method="POST">
            {{ csrf_field() }}

            <!-- Task Name -->
                <div class="form-group">
                    <label for="cliente_id" class="control-label">Cliente</label>
                    <input type="text" name="cliente_id" class="form-control">
                </div>

                <div class="form-group">
                    <label for="placa" class="control-label">Placa</label>
                    <input type="text" name="placa" class="form-control">
                </div>

                <div class="form-group">
                    <label for="vin" class="control-label">Vin</label>
                    <input type="text" name="vin" class="form-control">
                </div>

                <div class="form-group">
                    <label for="modelo" class="control-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="ano" class="control-label">Año</label>
                    <input type="text" name="ano" class="form-control">
                </div>

                <div class="form-group">
                    <label for="color" class="control-label">Color</label>
                    <input type="text" name="color" class="form-control">
                </div>

                <div class="form-group">
                    <label for="kilometraje" class="control-label">Kilometraje</label>
                    <input type="text" name="kilometraje" class="form-control">
                </div>

            <!-- Add Task Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Registrar Vehiculo
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="col-md-12">

    @if (count($vehiculos) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listado de vehiculos
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped cliente-table">
                            <thead>
                                <th>Id cliente</th>
                                <th>Placa</th>
                                <th>Vin</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Color</th>
                                <th>Kilometraje</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach ($vehiculos as $vehiculo)
                                    <tr>
                                        <td class="table-text"><div>{{ $vehiculo->cliente_id }}</div></td>
                                        <td class="table-text"><div>{{ $vehiculo->placa }}</div></td>
                                        <td class="table-text"><div>{{ $vehiculo->vin }}</div></td>
                                        <td class="table-text"><div>{{ $vehiculo->modelo }}</div></td>
                                        <td class="table-text"><div>{{ $vehiculo->ano }}</div></td>
                                        <td class="table-text"><div>{{ $vehiculo->color }}</div></td>
                                        <td class="table-text"><div>{{ $vehiculo->kilometraje }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <button type="submit" class="btn btn-success" onclick="location.href='vehiculos/{{ $vehiculo->id }}'">
                                                    <i class="fa fa-pencil"></i>Editar
                                            </button>
                                            

                                            <form action="{{ url('vehiculo') }}/{{ $vehiculo->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection