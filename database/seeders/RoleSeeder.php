<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //gestion des rôles 


    Role::firstOrCreate(['name'=> 'administrateur']);
    Role::firstOrCreate(['name'=> 'client']);
    Role::firstOrCreate(['name'=> 'commerciale']);
    Role::firstOrCreate(['name'=> 'technicien']);
    Role::firstOrCreate(['name'=> 'recouvrement']);
    Role::firstOrCreate(['name'=> 'Client_Contrat']);

        
    }
}








