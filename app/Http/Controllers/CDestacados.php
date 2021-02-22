<?php

namespace App\Http\Controllers;

use App\Destacado;
use App\DestacadoHash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CDestacados extends Controller
{
    public function index(Request $req){
        return view("admin");
    }

    public function getAll(){
        $destacados = Destacado::all()->load("destacadoHashes");
        return response()->json(["destacados"=>$destacados], 200);
    }

    public function save(Request $req){
        $req->validate([
            "id"=>"sometimes|required|numeric|exists:destacados",
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
        
        //Validación: Ok, Creo el destacado
        $destacado = new Destacado();

        try{
            DB::beginTransaction();
            
            //Si esta seteado el ID, lo busco, sino, queda en new
            if($req->has("id") && isset($req->id)){
                $destacado = Destacado::find($req->id);
            }

            //Lleno el destacado con los valores nuevos
            $destacado->fill($req->all());
            
            //Random String para guardado
            $random_str = Str::random(40);
            //Guardado de imagenes en Storage
            $destacado->path_logo = $req->file("logo")->storeAs("public/destacados", $random_str."_logo.".$req->file('logo')->extension());
            $destacado->path_display = $req->file("display")->storeAs("public/destacados", $random_str."_display.".$req->file('display')->extension());

            $destacado->save();

            $v_hashes = explode(",", $req->hashes);
            foreach($v_hashes as $hash){
                $h = new DestacadoHash();
                $h->hash = trim($hash);
                $h->destacado_id = $destacado->id;
                $h->save();
            }

            DB::commit();
        }catch(\Exception $ex){
            //Rollback & Delete files si estan guardados
            DB::rollBack();
            if($destacado->path_logo){
                Storage::delete($destacado->path_logo);
            }
            if($destacado->path_display){
                Storage::delete($destacado->path_display);
            }

            return response()->json(["error"=>$ex->message], 400);
        }
    }
}
