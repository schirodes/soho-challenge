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

    public function delete(Request $req){
        $req->validate([
            "id"=>"required|numeric|exists:destacados"
        ]);

        DestacadoHash::where("destacado_id",$req->id)->delete();
        $destacado = Destacado::find($req->id);
        Storage::disk("public")->delete($destacado->path_logo);
        Storage::disk("public")->delete($destacado->path_display);

        $destacado->delete();
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
            "display"=>"required_without:id|image",
            "logo"=>"required_without:id|image"
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
            if($req->has("logo"))
                $destacado->path_logo = $req->file("logo")->storeAs("destacados", $random_str."_logo.".$req->file('logo')->extension(), 'public');
            if($req->has("display"))
                $destacado->path_display = $req->file("display")->storeAs("destacados", $random_str."_display.".$req->file('display')->extension(), 'public');

            $destacado->save();

            $v_hashes = explode(",", $req->hashes);

            //Borro hash por prevención en caso de actualización
            DestacadoHash::where("destacado_id",$destacado->id)->delete();

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
