<?php

namespace App\Http\Controllers;

use App\Destacado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CDestacados extends Controller
{
    public function index(Request $req){
        return view("admin");
    }

    public function save(Request $req){
        $req->validate([
            "id"=>"nullable|numeric|exists:destacados",
            "titulo"=>"required|string",
            "parrafo"=>"required|string",
            "color_titulo"=>"required|string",
            "color_background"=>"required|string",
            "color_button"=>"required|string",
            "color_button_text"=>"required|string",
            "color_parrafo"=>"required|string",
            "color_hash"=>"required|string",
            "color_logo"=>"required|string",
            "hashes"=>"required|string",
            "display"=>"required|image",
            "logo"=>"required|image"
        ]);

        try{
            DB::beginTransaction();
            //Validación: Ok, Creo el destado, si esta seteado el ID, lo busco, sino, queda en new
            $destacado = new Destacado();
            if(isset($req->id)){
                $destacado = Destacado::find($req->id);
            }

            //Lleno el destacado con los valores nuevos
            $destacado->fill($req->all());
            $random_str = Str::random(40);
            
            $destacado->save(); //Guardo para tener el ID



        }catch(\Exception $ex){
            DB::rollBack();
            return response()->json($ex->message, 400);
        }
    }
}
