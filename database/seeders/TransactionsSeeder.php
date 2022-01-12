<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $headers = json_decode(Storage::disk('local')->get('/public/header_transactions.json'), true);
        $details = json_decode(Storage::disk('local')->get('/public/detail_transactions.json'), true);
        $infos = json_decode(Storage::disk('local')->get('/public/customer_informations.json'), true);
        $idx = 0;

        foreach($headers as $h){
            $id = Str::uuid();
            $h['id'] = $id;
            DB::table('header_transactions')->insert($h);

            $infos[$idx]["id"] = $id;
            DB::table('customer_informations')->insert($infos[$idx]);

            foreach($details[$idx] as $d){
                $d["id"] = $id;
                if ($d['total_price'] == null) $d['total_price'] = $d['quantity'] * $d['price_per_unit'];
                DB::table('detail_transactions')->insert($d);
            }

            $idx++;
        }

    }
}
