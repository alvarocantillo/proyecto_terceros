@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel-title">
        <h1>Clientes</h1>
        </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
            <form action="{{ url('cliente')}}" method="POST">
            {{ csrf_field() }}

            <!-- Task Name -->
                <div class="form-group">
                    <label for="nombres" class="control-label">Nombres</label>
                    <input type="text" name="nombres" class="form-control">
                </div>

                <div class="form-group">
                    <label for="apellidos" class="control-label">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control">
                </div>

                <div class="form-group">
                    <label for="cedula" class="control-label">Cedula</label>
                    <input type="text" name="cedula" class="form-control">
                </div>

                <div class="form-group">
                    <label for="telefono" class="control-label">Telefono</label>
                    <input type="text" name="telefono" class="form-control">
                </div>

                <div class="form-group">
                    <label for="correo" class="control-label">Correo</label>
                    <input type="text" name="correo" class="form-control">
                </div>

            <!-- Add Task Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Registrar cliente
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="col-md-12">

    @if (count($clientes) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listado de clientes
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped cliente-table">
                            <thead>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cedula</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td class="table-text"><div>{{ $cliente->nombres }}</div></td>
                                        <td class="table-text"><div>{{ $cliente->apellidos }}</div></td>
                                        <td class="table-text"><div>{{ $cliente->cedula }}</div></td>
                                        <td class="table-text"><div>{{ $cliente->telefono }}</div></td>
                                        <td class="table-text"><div>{{ $cliente->correo }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <button type="submit" class="btn btn-success" onclick="location.href='clientes/{{ $cliente->id }}'">
                                                    <i class="fa fa-pencil"></i>Editar
                                            </button>
                                            

                                            <form action="{{ url('cliente') }}/{{ $cliente->id }}" method="POST">
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