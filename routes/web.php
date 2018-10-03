<?php
use App\Cliente;
use App\Vehiculo;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * Mostrar los clientes
 */
Route::get('/clientes', function () {
	$clientes=Cliente::all();
    return view('clientes', ['clientes'=>$clientes]);
});

/**
 * Mostrar la edicion de los clientes
 */
Route::get('/clientes/{id}', function ($id) {
	$cliente=Cliente::findOrFail($id);
    return view('clientes-editar', ['cliente'=>$cliente]);
});
 
/**
 * Agregar un cliente
 */
Route::post('/cliente', function (Request $request) {

    $validator = Validator::make($request->all(), [
            'nombres' => 'required|max:80',
            'apellidos' =>'required|max:80',
            'cedula' =>'required|digits:10',
            'telefono' =>'min:7',
            'correo' =>'email',
        ]);
        if ($validator->fails()) {
            return redirect('/clientes')
                ->withInput()
                ->withErrors($validator);
        }
        $cliente = new Cliente;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->cedula = $request->cedula;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->save();

        return redirect('/clientes');
});

/**
 * Editar un cliente existente
 */
Route::put('/cliente/{id}', function (Request $request, $id) {

	$validator = Validator::make($request->all(), [
            'nombres' => 'required|max:80',
            'apellidos' =>'required|max:80',
            'cedula' =>'required|digits:10',
            'telefono' =>'min:7',
            'correo' =>'email',
    ]);

    if ($validator->fails()) {
            return redirect('/clientes')
                ->withInput()
                ->withErrors($validator);
    }

	$cliente = Cliente::findOrFail($id);

	$cliente->nombres = $request->nombres;
    $cliente->apellidos = $request->apellidos;
    $cliente->cedula = $request->cedula;
    $cliente->telefono = $request->telefono;
    $cliente->correo = $request->correo;
    $cliente->save();

    return redirect('/clientes');
});

 
/**
 * Eliminar un cliente existente
 */
Route::delete('/cliente/{id}', function ($id) {
	Cliente::findOrFail($id)->delete();
        return redirect('/clientes');
});


/**
 * Mostrar los vehiculos
 */
Route::get('/vehiculos', function () {
	$vehiculos=Vehiculo::all();
    return view('vehiculos', ['vehiculos'=>$vehiculos]);
});

/**
 * Agregar un vehiculo
 */
Route::post('/vehiculo', function (Request $request) {

    $validator = Validator::make($request->all(), [
            'cliente_id' => 'required',
            'placa' =>'required|max:6',
            'vin' =>'required|min:17',
            'modelo' =>'required|max:10',
            'ano' =>'required|max:4',
            'color' =>'required|max:10',
            'kilometraje' =>'required',
        ]);
        if ($validator->fails()) {
            return redirect('/vehiculos')
                ->withInput()
                ->withErrors($validator);
        }
        $vehiculo = new Vehiculo;
        $vehiculo->cliente_id = $request->cliente_id;
        $vehiculo->placa = $request->placa;
        $vehiculo->vin = $request->vin;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->ano = $request->ano;
        $vehiculo->color = $request->color;
        $vehiculo->kilometraje = $request->kilometraje;
        $vehiculo->save();

        return redirect('/vehiculos');
});

/**
 * Eliminar un vehiculo existente
 */
Route::delete('/vehiculo/{id}', function ($id) {
	Vehiculo::findOrFail($id)->delete();
        return redirect('/vehiculos');
});

Route::put('/vehiculo/{id}', function (Request $request, $id) {

    $validator = Validator::make($request->all(), [
            'cliente_id' => 'required',
            'placa' =>'required|max:6',
            'vin' =>'required|min:17',
            'modelo' =>'required|max:10',
            'ano' =>'required|max:4',
            'color' =>'required|max:10',
            'kilometraje' =>'required',
        ]);
        if ($validator->fails()) {
            return redirect('/vehiculos')
                ->withInput()
                ->withErrors($validator);
        }
        
        $vehiculo = Vehiculo::findOrFail($id);

        $vehiculo->cliente_id = $request->cliente_id;
        $vehiculo->placa = $request->placa;
        $vehiculo->vin = $request->vin;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->ano = $request->ano;
        $vehiculo->color = $request->color;
        $vehiculo->kilometraje = $request->kilometraje;
        $vehiculo->save();

        return redirect('/vehiculos');
});

/**
 * Mostrar la edicion de los clientes
 */
Route::get('/vehiculos/{id}', function ($id) {
	$vehiculo=Vehiculo::findOrFail($id);
    return view('vehiculos-editar', ['vehiculo'=>$vehiculo]);
});

