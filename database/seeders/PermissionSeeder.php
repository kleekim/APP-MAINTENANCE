<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //gestions des permissions
        $permissions=[


            //administrateur

            'voir_admin_Dashboard',
            'ajouter_utilisateur',
            'supprimer_utilisateur',
            'modifier_utilisateur',
            'voir_client',
            'ajouter_client',
            'supprimer_client',
            'modifier_client',
            'voir_demande',
            'envoyer_demande',
            'modifier_demande',
            'supprimer_demande',
            'voir fiche_accueil',
            'voir fiche_intervention',
            'voir facture',
            
            //client
            

            'voir_Dashboard_client',
            'soumettre_demande',
            'suivre_statut_demande',
            'voir_notification',

            //commerciale


            'Voir_commerciale_Dashboard',
            'consulter_demande',
            'remplir_fiche_accueil',
            'modifier_fiche_accueil',
            'envoyer_fiche_accueil',
            'voir_fiche_intervention',
            'remplir_fiche_intervention',
            'remplir_facture',


            //Technicien


            'Voir_technicien_dashboard',
            'remplir_fiche_accueil',
            'envoyer_fiche_accueil',
            'remplir_fiche_intervention',
            'envoyer_fiche_intervention',
            'modifier_fiche_intervention',
           

            //Recouvrement

            'voir_recouvrement_dashboard',
            'consulter_facture',

            //Client Contrat 

            'Voir_Dashboard_client_contrat',
            'consulter_contrat',
            'voir_planning_intervention',
        ];

        //Association des rôles aux permissions 

        foreach($permissions as $permission){
            Permission::firstOrCreate(['name'=> $permission]);
        }
         
        $roleAdministrateur = Role::where('name', 'administrateur')->first();
        $roleAdministrateur->givePermissionTo([
        'voir_admin_Dashboard',
        'ajouter_utilisateur',
        'supprimer_utilisateur',
        'modifier_utilisateur',
        'voir_client',
        'ajouter_client',
        'supprimer_client',
        'modifier_client',
        'voir_demande',
        'envoyer_demande',
        'modifier_demande',
        'supprimer_demande',
        'voir fiche_accueil',
        'voir fiche_intervention',
        'voir facture',
            
        
        ]);


        $roleClient = Role::where('name', 'client')->first();
        $roleClient->givePermissionTo([

        'voir_Dashboard_client',
        'soumettre_demande',
        'suivre_statut_demande',
        'voir_notification',

        ]);

        $roleCommerciale = Role::where('name', 'commerciale')->first();
        $roleCommerciale->givePermissionTo([
        

        'Voir_commerciale_Dashboard',   
        'consulter_demande',
        'remplir_fiche_accueil',
        'modifier_fiche_accueil',
        'envoyer_fiche_accueil',
        'voir_fiche_intervention',
        'remplir_fiche_intervention',
        'remplir_facture',

        ]);


        $roleTechnicien = Role::where('name', 'technicien')->first();
        $roleTechnicien->givePermissionTo([

        'Voir_technicien_dashboard',    
        'remplir_fiche_accueil',
        'envoyer_fiche_accueil',
        'remplir_fiche_intervention',
        'envoyer_fiche_intervention',
        'modifier_fiche_intervention',

        ]);


        $roleRecouvrement = Role::where('name', 'recouvrement')->first();
        $roleRecouvrement->givePermissionTo([
        
            'voir_recouvrement_dashboard', 
            'consulter_facture',
            
        ]);

        $roleClientContrat = Role::where('name', 'client_contrat')->first();
        $roleClientContrat->givePermissionTo([
        'Voir_Dashboard_client_contrat',
        'consulter_contrat',
        'voir_planning_intervention',

        ]);

    

    }
}







