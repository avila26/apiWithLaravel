<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre'=>'Alimentacion'
        ]);
        Categoria::create([
            'nombre'=>'Transporte'
        ]);
        Categoria::create([
            'nombre'=>'Entretenimiento'
        ]);
    }
}
