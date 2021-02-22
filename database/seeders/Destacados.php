<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Destacados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("destacados")->insert([
            "titulo"=>"Sitio publico y privado",
            "parrafo"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh tortor. Etiam facilisis tristique ex, sit amet sagittis neque consequat quis.",
            "color_titulo"=>"white",
            "color_background"=>"#223B82",
            "color_button"=>"white",
            "color_button_text"=>"#223B82",
            "color_parrafo"=>"#A6B0CD",
            "color_hash"=>"white",
            "color_logo"=>"white",
            "path_logo"=>"destacados/diners_club_logo.png",
            "path_display"=>"destacados/diners_club.png"
        ]);

        DB::table("destacados")->insert([
            "titulo"=>"Sitio web 2017",
            "parrafo"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh tortor. Etiam facilisis tristique ex, sit amet sagittis neque consequat quis.",
            "color_titulo"=>"white",
            "color_background"=>"#C92C3A",
            "color_button"=>"white",
            "color_button_text"=>"#C92C3A",
            "color_parrafo"=>"#E28F97",
            "color_hash"=>"white",
            "color_logo"=>"white",
            "path_logo"=>"destacados/derco_logo.png",
            "path_display"=>"destacados/derco.png"
        ]);

        DB::table("destacados")->insert([
            "titulo"=>"TV App",
            "parrafo"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh tortor. Etiam facilisis tristique ex, sit amet sagittis neque consequat quis.",
            "color_titulo"=>"black",
            "color_background"=>"white",
            "color_button"=>"#EE2E24",
            "color_button_text"=>"white",
            "color_parrafo"=>"#4A4A4A",
            "color_hash"=>"#696969",
            "color_logo"=>"#EE2E24",
            "path_logo"=>"destacados/copec_logo.png",
            "path_display"=>"destacados/copec.png"
        ]);
    }
}
