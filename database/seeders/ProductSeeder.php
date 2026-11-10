<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
   
    public function run(): void
    {
        $products = [
            [
                    'nama_product' => 'Kopi ulee kareng original',
                    'deskripsi'   => 'Kopi ulee kareng original adalah kopi khas Aceh',
                    'harga'       => 15000,
                    'gambar'      => 'Kopi original.jpg',
                
            ],
            [
                'nama_product' => 'Kopi sanger',
                'deskripsi' => 'Kopi sanger khas Aceh',
                'harga' => 20000,
                'gambar' => 'Kopi sanger.jpg',
                
            ],   [
                'nama_product' => 'Kopi tubruk',
                'deskripsi' => 'Kopi tubruk khas Aceh',
                'harga' => 30000,
                'gambar' => 'Kopi tubruk.jpg',
                
            ]

        ];
        foreach ($products as $product) {
            Product::query()->create($product);
    }
}
}