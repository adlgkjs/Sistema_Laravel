<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//con esto indicamos que vamos a usar el modelo llamado ArticuloController
use App\Models\Articulo;

class ArticuloController extends Controller
{
    //se crea el siguiente constructor usando el middleware de autenticcion para evitar poder entrar a nuestra aplicacion
    //sin registro previo ejemplo, poniendo articulos/create en el navegado
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //hacemos referencia al Model llamado "Articulo" y lo guardamos en una variable
        //decimos all para que traiga todo lo que tiene es Modelo o tabla
        $articulos = Articulo::all();
        
        //cuando usamos la directiva view lo envia al archivo dentro de la carpeta view(vistas)
        return view('articulo.index')->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      //para poder ver el formulario de crear necesitamos retornar esa vista  
      return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //hacemos una instancia de un clase (modelo articulo), Articulo hace referencia al modelo del mimo nombre
        $articulos = new Articulo();
        //la palabra entre parentesis viene del nombre del input del archivo create.blade
        $articulos->codigo = $request->get('codigo');
        $articulos->descripcion = $request->get('descripcion');
        $articulos->cantidad = $request->get('cantidad');
        $articulos->precio = $request->get('precio');
        //esto es para guardar los datos capturados
        $articulos->save();
        //para redireccionar a la pantalla principal
        return redirect('/articulos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //hacemos referencia al Model llamado "Articulo" y lo guardamos en una variable
        //decimos find($id) para que nos traiga solo un articulo
        $articulo = Articulo::find($id);
        //traemos la vista del formulario editar
        return view('articulo.edit')->with('articulo', $articulo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //llamamos a la instancia de un clase (modelo articulo), Articulo hace referencia al modelo del mimo nombre
         $articulo = Articulo::find($id);
         //la palabra entre parentesis viene del nombre del input del archivo create.blade
         $articulo->codigo = $request->get('codigo');
         $articulo->descripcion = $request->get('descripcion');
         $articulo->cantidad = $request->get('cantidad');
         $articulo->precio = $request->get('precio');
         //esto es para guardar los datos capturados
         $articulo->save();
         //para redireccionar a la pantalla principal
         return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //llamamos a la instancia de un clase (modelo articulo), Articulo hace referencia al modelo del mimo nombre
        //con esto se le dice que traiga un registro de la tabla    
        $articulo = Articulo::find($id);
        //con esto lo borramos
        $articulo->delete();
        //con esto redirigimos a la pagina principal
        return redirect('/articulos');
    }
}
