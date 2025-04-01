<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{
    public function index() {
        $datos=DB::select("select * from tiendas ");
        return view("tiendas")->with("datos", $datos);
    }

    // Método para mostrar el formulario de creación
    public function create() {
        return view("tienda.create");
    }

    public function store(Request $request) {

        // Validar los datos antes de insertarlos
        $request->validate([
            'estado' => 'required|integer',
            'nombre' => 'required|string|max:30',
            'descripcion' => 'required|string|max:500',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:120',
            'direccionanexo' => 'required|string|max:40',
            'direccionbarrio' => 'required|string|max:25',
            'calificacion' => 'required',
            'calificacioncantidad' => 'required',
            'impuestos' => 'required|integer|min:0|max:100',
            'diastrabajados' => 'required|string|max:21'
        ]);


        try {
            $sql=DB::insert("insert into tiendas (estado, nombre, descripcion, telefono, direccion,
            direccionanexo, direccionbarrio, calificacion, calificacioncantidad, impuestos, diastrabajados) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",[
                $request->estado,
                $request->nombre,
                $request->descripcion,
                $request->telefono,
                $request->direccion,
                $request->direccionanexo,
                $request->direccionbarrio,
                $request->calificacion,
                $request->calificacioncantidad,
                $request->impuestos,
                $request->diastrabajados
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return redirect()->route('tienda.index')->with("Correcto", "Tienda registrada correctamente");
        } else {
            return back()->with("Incorrecto", "Hubo un error en el registro de datos, intente nuevamente");
        }
    }

    public function update(Request $request, $id){
        try {
            $sql=DB::update('update tiendas set estado=?, nombre=?, descripcion=?, telefono=?, direccion=?,
            direccionanexo=?, direccionbarrio=?, calificacion=?, calificacioncantidad=?, impuestos=?, diastrabajados=? where id =?',[
                $request->estado,
                $request->nombre,
                $request->descripcion,
                $request->telefono,
                $request->direccion,
                $request->direccionanexo,
                $request->direccionbarrio,
                $request->calificacion,
                $request->calificacioncantidad,
                $request->impuestos,
                $request->diastrabajados,
                $id
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return redirect()->route('tienda.index')->with("Correcto", "Tienda modificada correctamente");
        } else {
            return back()->with("Incorrecto", "Hubo un error en la modificación de datos, intente nuevamente");
        }
    }

    public function destroy($id) {
        try {
            $sql = DB::delete("DELETE FROM tiendas WHERE id = ?", [$id]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql) {
            return redirect()->route('tienda.index')->with("Correcto", "Tienda eliminada correctamente");
        } else {
            return back()->with("Incorrecto", "Hubo un error al eliminar la Tienda, intente nuevamente");
        }
    }
}
