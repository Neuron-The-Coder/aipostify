<?php

namespace Database\Seeders;

use App\Models\NewStock;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewStocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(Storage::disk('local')->get('public/new_stocks.json'), true);
        foreach ($data as $d){
            if ($d["total_price"] == null){
                $d["total_price"] = $d["price_per_unit"] * $d["quantity"];
            }
            DB::table('new_stocks')->insert($d);
        }
    }
}
