<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Warehouse;
class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //insert name and type 
    public function run()
    {
        return DB::table('warehouse')->insert([
            [
            'name' => 'Kho kiểm soát khí hậu',
            'type' => 'Dịch vụ'
            ],
            [
                'name' => 'Kho tư nhân',
                'type' => 'Dịch vụ'
            ],
            [
                'name' => 'Kho chung công cộng',
                'type' => 'Dịch vụ'
            ],
        ]);    
        
        
    }
}
