<?php

namespace Database\Seeders;

use App\Models\Containertype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContainerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Containertype::insert([
            [
                'type' => '20FT General',
                'internal_dimension' => '5.89 x 2.35 x 2.36m',
                'door_opening' => '2.33 x 2.26m',
                'cubic_capacity' => '33m³',
                'cargo_weight' => '21,700kgs',
            ],

            [
                'type' => '40FT General',
                'internal_dimension' => '12.03 x 2.35 x 2.36m',
                'door_opening' => '2.33 x 2.26m',
                'cubic_capacity' => '67m³',
                'cargo_weight' => '30,480kgs',
            ],

            [
                'type' => '20FT Reefer',
                'internal_dimension' => '5.44 x 2.29 x 2.26m',
                'door_opening' => '2.26 x 2.13m',
                'cubic_capacity' => '28m³',
                'cargo_weight' => '21,700kgs',
            ],

            [
                'type' => '40FT Reefer',
                'internal_dimension' => '11.56 x 2.29 x 2.  26m',
                'door_opening' => '2.26 x 2.13m',
                'cubic_capacity' => '58m³',
                'cargo_weight' => '30,480kgs',
            ],

            [
                'type' => '40FT High Cube',
                'internal_dimension' => '12.03 x 2.35 x 2.69m',
                'door_opening' => '2.33 x 2.58m',
                'cubic_capacity' => '76m³',
                'cargo_weight' => '30,480kgs',
            ]
        ]);
    }
}
