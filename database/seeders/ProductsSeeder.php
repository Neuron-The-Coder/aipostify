<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(Storage::disk('local')->get('public/products.json'), true);

        for ($i = 0; $i < sizeof($data); $i++){
            $data[$i]["image"] = asset('storage/product_image/' . strtolower(str_replace(' ', '_', $data[$i]["name"])) . '.PNG');
            $data[$i]["stock"] = random_int(1, 12);
        }

        Product::insert($data);
    }
}
