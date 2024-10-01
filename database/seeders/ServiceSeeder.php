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
                'name' => 'Capelli',
                'description' => 'Servizio di taglio capelli base per un look fresco e rinnovato. Perfetto per chi desidera mantenere uno stile semplice e curato.',
                'price' => 10.00,
                'duration' => 30,
            ],
            [
                'name' => 'Capelli + Shampoo',
                'description' => 'Taglio capelli con lavaggio e shampoo inclusi. Questo servizio offre una pulizia profonda e un massaggio rilassante del cuoio capelluto, per un’esperienza rinvigorente.',
                'price' => 15.00,
                'duration' => 30,
            ],
            [
                'name' => 'Capelli + Shampoo + Barba',
                'description' => 'Un pacchetto completo che include taglio di capelli, lavaggio e shampoo, e cura della barba. Perfetto per chi desidera apparire impeccabile dalla testa ai piedi.',
                'price' => 18.00,
                'duration' => 30,
            ],
            [
                'name' => 'Capelli Bimbo',
                'description' => 'Taglio di capelli per bambini, realizzato in un ambiente amichevole e divertente. Assicuriamo un’esperienza piacevole per i più piccoli, senza stress.',
                'price' => 7.00,
                'duration' => 30,
            ],
            [
                'name' => 'Modellatura Barba',
                'description' => 'Servizio di modellatura e rifinitura della barba per un look elegante e curato. Utilizziamo tecniche specializzate per enfatizzare la tua forma del viso.',
                'price' => 5.00,
                'duration' => 30,
            ],
            [
                'name' => 'Tintura Barba',
                'description' => 'Trattamento di tintura per la barba, ideale per coprire i capelli grigi o semplicemente per cambiare look. Utilizziamo prodotti di alta qualità per un risultato naturale e duraturo.',
                'price' => 10.00,
                'duration' => 30,
            ],
            [
                'name' => 'Stiratura',
                'description' => 'Servizio di stiratura dei capelli per ottenere un look liscio e setoso. Perfetto per chi desidera domare i capelli crespi e avere un aspetto ordinato.',
                'price' => 20.00,
                'duration' => 30,
            ],
            [
                'name' => 'Permanente',
                'description' => 'Trattamento permanente per i capelli che dona volume e onde morbide. Ideale per chi desidera un cambiamento duraturo e uno stile unico.',
                'price' => 25.00,
                'duration' => 30,
            ],
            [
                'name' => 'Lozione Curativa',
                'description' => 'Applicazione di lozione curativa per i capelli, progettata per nutrire e riparare i capelli danneggiati. Perfetta per migliorare la salute e l’aspetto dei tuoi capelli.',
                'price' => 5.00,
                'duration' => 30,
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
