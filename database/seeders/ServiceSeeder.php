<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //lista servizi
        $servicesList = [
            [
                'name' => 'Taglio Classico',
                'description' => 'Un taglio di capelli classico per tutte le lunghezze.',
                'price' => 20.00,
                'duration' => 30,
            ],
            [
                'name' => 'Rasatura Barba Completa',
                'description' => 'Rasatura tradizionale con rasoio a mano libera.',
                'price' => 15.00,
                'duration' => 20,
            ],
            [
                'name' => 'Taglio e Modellatura Barba',
                'description' => 'Taglio e modellatura della barba con forbici e rifinitura.',
                'price' => 25.00,
                'duration' => 30,
            ],
            [
                'name' => 'Trattamento Capelli e Cuoio Capelluto',
                'description' => 'Trattamento rinvigorente per il cuoio capelluto e i capelli.',
                'price' => 35.00,
                'duration' => 40,
            ],
            [
                'name' => 'Taglio Capelli per Bambini',
                'description' => 'Taglio di capelli per bambini fino a 12 anni.',
                'price' => 15.00,
                'duration' => 25,
            ],
            [
                'name' => 'Lavaggio e Asciugatura',
                'description' => 'Lavaggio delicato e asciugatura per tutti i tipi di capelli.',
                'price' => 10.00,
                'duration' => 15,
            ],
            [
                'name' => 'Colorazione Capelli Uomo',
                'description' => 'Trattamento di colorazione per capelli maschili.',
                'price' => 40.00,
                'duration' => 45,
            ],
            [
                'name' => 'Trattamento Anticaduta',
                'description' => 'Trattamento specifico per contrastare la caduta dei capelli.',
                'price' => 50.00,
                'duration' => 50,
            ],
        ];

        foreach($servicesList as $service){
            $newService = new Service();
            $newService->name = $service['name'];
            $newService->description = $service['description'];
            $newService->price = $service['price'];
            $newService->duration = $service['duration'];
            $newService->save();
        }
    }
}
