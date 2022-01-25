<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ManufacturerTableSeeder extends Seeder
{
    static $manufacturers = [
        'Agrale',
        'Aston Martin',
        'Audi',
        'BMW',
        'BYD',
        'CAOA Chery',
        'Chevrolet',
        'Citroën',
        'Dodge',
        'Effa',
        'Exeed',
        'Ferrari',
        'Fiat',
        'Ford',
        'Foton',
        'Honda',
        'Hyundai',
        'Iveco',
        'JAC',
        'Jaguar',
        'Jeep',
        'Kia',
        'Lamborghini',
        'Land Rover',
        'Lexus',
        'Lifan',
        'Maserati',
        'McLaren',
        'Mercedes-AMG',
        'Mercedes-Benz',
        'Mini',
        'Mitsubishi',
        'Nissan',
        'Peugeot',
        'Porsche',
        'RAM',
        'Renault',
        'Rolls-Royce',
        'Shineray',
        'SsangYong',
        'Subaru',
        'Suzuki',
        'Toyota',
        'Troller',
        'Volkswagen',
        'Volvo'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$manufacturers as  $value) {
            DB::table('manufacturers')->insert([
                "name" => $value
            ]);
        }
        
    }
}
