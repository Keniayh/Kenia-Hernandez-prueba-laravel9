<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromocionController extends Controller
{
    public function index() {
        $datos=DB::select("select * from promociones ");
        return view("promociones")->with("datos", $datos);
    }

    // Método para mostrar el formulario de creación
    public function create() {
        return view("promocion.create");
    }

    public function store(Request $request) {

        // Validar los datos antes de insertarlos
        $request->validate([
            'estado' => 'required|integer',
            'nombre' => 'required|string|max:40',
            'imagen' => 'required|string|max:120',
            'porcentaje' => 'required|integer|min:0|max:100',
            'diassemana' => 'required|string|max:21'
        ]);


        try {
            $sql=DB::insert("insert into promociones (estado, nombre, imagen, porcentaje, dias_semana) values (?, ?, ?, ?, ?)",[
                $request->estado,
                $request->nombre,
                $request->imagen,
                $request->porcentaje,
                $request->diassemana
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return redirect()->route('promocion.index')->with("Correcto", "Promoción registrada correctamente");
        } else {
            return back()->with("Incorrecto", "Hubo un error en el registro de datos, intente nuevamente");
        }
    }

    public function update(Request $request, $id){
        try {
            $sql=DB::update('update promociones set estado=?, nombre = ?, imagen=?, porcentaje=?, dias_semana=? where id =?',[
                $request->estado,
                $request->nombre,
                $request->imagen,
                $request->porcentaje,
                $request->diassemana,
                $id
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return redirect()->route('promocion.index')->with("Correcto", "Promoción modificada correctamente");
        } else {
            return back()->with("Incorrecto", "Hubo un error en la modificación de datos, intente nuevamente");
        }
    }

    public function destroy($id) {
        try {
            $sql = DB::delete("DELETE FROM promociones WHERE id = ?", [$id]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql) {
            return redirect()->route('promocion.index')->with("Correcto", "Promoción eliminada correctamente");
        } else {
            return back()->with("Incorrecto", "Hubo un error al eliminar la promoción, intente nuevamente");
        }
    }



}
