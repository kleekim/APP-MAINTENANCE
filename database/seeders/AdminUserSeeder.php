<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class AdminUserSeeder extends Seeder
{

   use WithoutModelEvents;
    /** 
     * Run the database seeds.
     */
    public function run(): void
    {
        // administrateur 
        $admin = User::firstOrCreate(
            ['email' => 'admin@maintenance.local'],
            [
                'name' => 'Administrateur',
                'password' => bcrypt('password123'),
                'phone' => '054758614',
                'email_verified_at' => now(),
            ]
        );

        $admin->assignRole('administrateur');

        // client  
        $client = User::firstOrCreate(
            ['email' => 'client@maintenance.local'],
            [
                'name' => 'Client ',
                'password' => bcrypt('password123'),
                'phone' => '064712258',
                'email_verified_at' => now(),
            ] 
        );

        $client->assignRole('client');

        // commercial 
        $commercial = User::firstOrCreate(
            ['email' => 'commercial@maintenance.local'],
            [
                'name' => 'Commercial',
                'password' => bcrypt('password123'),
                'phone' => '055846215',
                'email_verified_at' => now(),
            ]
        );

        $commercial->assignRole('commerciale');

        // technicien
        $technicien = User::firstOrCreate(
            ['email' => 'technicien@maintenance.local'],
            [
                'name' => 'Technicien',
                'password' => bcrypt('password123'),
                'phone' => '043302128',
                'email_verified_at' => now(),
            ]
        );

        $technicien->assignRole('technicien');

        // recouvrement 
        $recouvrement = User::firstOrCreate(
            ['email' => 'recouvrement@maintenance.local'],
            [
                'name' => 'Recouvrement',
                'password' => bcrypt('password123'),
                'phone' => '041478233',
                'email_verified_at' => now(),
            ]
        );

        $recouvrement->assignRole('recouvrement');


        // Client 

        $clientcontrat = User::firstOrCreate(
            ['email' => 'clientcontrat@maintenance.local'],
            [
                'name' => 'Client Contrat',
                'password' => bcrypt('password123'),
                'phone' => '062214582',
                'email_verified_at' => now(),
            ]
        );
        $clientcontrat->assignRole('Client_Contrat');
    
    }
} 



