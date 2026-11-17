<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client_Contrat; 

class ContractualClientSeeder extends Seeder
{
    public function run(): void
    { 
        $clients = [
            [
                'client'                 => 'DRTV',
                'telephone'              => '+242 22 294 02 65',
                'email'                  => 'contact@drtv.cg',
                'adresse'                => 'Loandjili',          
                'type_contrats'          => 'maintenance_preventive',
                'interventions_par_mois' => 1,
            ],
            [
                'client'                 => 'Télévision Pointe-Noire',
                'telephone'              => '+242 06 000 00 02',
                'email'                  => 'info@tvpn.cg',
                'adresse'                => 'Rue Mbinda - Camp 31 juillet',
                'type_contrats'          => 'maintenance_preventive',
                'interventions_par_mois' => 1,
            ],
            [
                'client'                 => 'Radio Pointe-Noire',
                'telephone'              => '+242 06 000 00 03',
                'email'                  => 'radio@rpn.cg',
                'adresse'                => 'Boulevard Charles de Gaulle, Pointe-Noire',
                'type_contrats'          => 'maintenance_preventive,maintenance_curative', 
                'interventions_par_mois' => 1,
            ],
        ];

        foreach ($clients as $client) {
            Client_Contrat::create($client); 
        } 
    }
}
