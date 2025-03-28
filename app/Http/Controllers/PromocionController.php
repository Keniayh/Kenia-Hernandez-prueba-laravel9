<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromocionController extends Controller
{
    public function index() {
        $datos=DB::select("select * from promociones ");
        return view("welcome")->with("datos", $datos);
    }
}
