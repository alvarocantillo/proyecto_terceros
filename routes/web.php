<?php
use App\Cliente;
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
