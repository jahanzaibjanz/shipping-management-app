<?php

namespace Database\Seeders;

use App\Models\Containertype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContainerTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $containertype = Containertype::create([
            'type' => '20FT General', 
            'internal_dimension' => '5.89 x 2.35 x 2.36m',
            'door_opening' => '2.33 x 2.26m',
            'cubic_capacity' => '33m³',
            'cargo_weight' => '21,700kgs',
        ]);
    }
}
