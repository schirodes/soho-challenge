<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Hashes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("destacado_hashes")->insert([
            ["destacado_id"=>1, "hash"=>"usabilidad"],
            ["destacado_id"=>1, "hash"=>"ui"],
            ["destacado_id"=>1, "hash"=>"ux"],
            ["destacado_id"=>1, "hash"=>"test con usuarios"],
        ]);

        DB::table("destacado_hashes")->insert([
            ["destacado_id"=>2, "hash"=>"responsive"],
            ["destacado_id"=>2, "hash"=>"ui"],
            ["destacado_id"=>2, "hash"=>"ux"],
        ]);

        DB::table("destacado_hashes")->insert([
            ["destacado_id"=>3, "hash"=>"usabilidad"],
            ["destacado_id"=>3, "hash"=>"ui"],
            ["destacado_id"=>3, "hash"=>"ux"],
            ["destacado_id"=>3, "hash"=>"test con usuarios"],
        ]);

    }
}
