<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminClientController;
use App\Http\Controllers\AdminDemandeController;
use App\Http\Controllers\CommercialDashboardController;
use App\Http\Controllers\PasswordSetupController;
use App\Http\Controllers\SmsLogController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\FacturationController;
use App\Http\Controllers\FacturesClientController;
use App\Http\Controllers\FicheInterventionContratController;
use App\Http\Controllers\FichesAccueilController;
use App\Http\Controllers\FichesInterventionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListeClientController;
use App\Http\Controllers\NotificationsAdminController;
use App\Http\Controllers\NotificationsClientController;
use App\Http\Controllers\NotificationsCommercialeController;
use App\Http\Controllers\NotificationsRecouvrementController;
//use App\Http\Controllers\PlanningInterventionController;
use App\Http\Controllers\RapportsController;
use App\Http\Controllers\ReceptionDemandeController;
use App\Http\Controllers\ReceptionFactureController;
use App\Http\Controllers\SuiviDemandeController;
use App\Http\Controllers\SuiviInterventionController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\PageFactureController;
use App\Http\Controllers\ContractuelsController;
use App\Http\Controllers\NotificationsTechnicienController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageMessageController;
use App\Http\Controllers\PageMessageClientController;
use App\Http\Controllers\RecouvrementDashboardController;
use App\Http\Controllers\TechnicienDashboardController;






use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;


//

use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

Route::get('/test-email', function () {
    Mail::to('ton_email@example.com')->send(new TestEmail("Ceci est un test d'envoi d'email !"));
    return "Email envoyé !";
});


//Routes Publiques (Non authentifiées)


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('documents', [HomeController::class, 'documents'])->name('documents');

// Formulaire de demande (accessible sans authentification)
Route::get('formulaire_demande', [HomeController::class, 'formulaire_demande'])->name('formulaire_demande');
Route::post('formulaire_demande', [HomeController::class, 'store'])->name('formulaire_demande.store');


Route::get('/password-setup/{user}', [PasswordSetupController::class, 'show'])->name('password.setup');

Route::post('/password-setup/{user}', [PasswordSetupController::class, 'store'])->name('password.setup.store');

// SMS Logs (les routes pour les messages en developpement)
Route::prefix('dev/sms')->group(function () {
    Route::get('/', [SmsLogController::class, 'index'])->name('sms-logs.index');
    Route::get('/latest', [SmsLogController::class, 'latest'])->name('sms-logs.latest');
    Route::get('/{smsLog}', [SmsLogController::class, 'show'])->name('sms-logs.show');
    Route::delete('/{smsLog}', [SmsLogController::class, 'destroy'])->name('sms-logs.destroy');
    Route::post('/truncate', [SmsLogController::class, 'truncate'])->name('sms-logs.truncate');
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});


//Routes Authentifiées - Tableaux de bord par rôle

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {

        $roleName = auth()->user()->roles->first()?->name;
        $dashboardRoute = match ($roleName) {
            'administrateur' => 'admin.dashboard',
            'client' => 'client_Dashboard',
            'commerciale' => 'commercial.dashboard',
            'technicien' => 'technicien.dashboard',
            'recouvrement' => 'recouvrement.dashboard',
            'Client_Contrat' => 'client_contrat.dashboard',
            default => null,
        };


        if ($dashboardRoute !== null) {
            return redirect()->route($dashboardRoute);
        }

        return view('dashboard');
    })->name('dashboard');

    // Dashboard Admin

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard')
        ->middleware('role:administrateur');
        



    // Dashboard Client
    Route::get('/client/dashboard', [SuiviDemandeController::class, 'dashboard'])
        ->name('client_Dashboard')
        ->middleware('role:client');

    // Dashboard Commercial
    // Corrigé
    Route::get('/commercial/dashboard', [CommercialDashboardController::class, 'dashboard_commercial'])
        ->name('commercial.dashboard')
        ->middleware('role:commerciale');



    // Dashboard Technicien
    Route::get('/technicien/dashboard', [TechnicienDashboardController::class, 'dashboard_technicien'])
        ->name('technicien.dashboard')
        ->middleware('role:technicien');


    // Dashboard Recouvrement
    Route::get('/recouvrement/dashboard', [RecouvrementDashboardController::class, 'dashboard_recouvrement'])
        ->name('recouvrement.dashboard')
        ->middleware('role:recouvrement');


    // Dashboard Client Contrat
    Route::get('/client-contrat/dashboard', function () {
        return view('CLIENTS.Clients_Particuliers.Clients Sous Contrats.client_contrat_Dashboard');
    })->name('client_contrat.dashboard')
        ->middleware('role:Client_Contrat');
});


//Routes Authentifiées - Admin - Gestion des Utilisateurs

Route::middleware(['auth', 'verified', 'role:administrateur'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', AdminUserController::class);

    Route::resource('clients', AdminClientController::class);

    Route::resource('demandes', AdminDemandeController::class);


    // Route::get('/search', [AdminDashboardController::class, 'search'])->name('search');

    Route::post(
        '/notifications/mark-all-read', 
        [HomeController::class, 'markAllRead']
    )
        ->name('notifications.markAllRead');


    Route::get('/notifications', [NotificationsAdminController::class, 'notification'])
        ->name('notification_admin');


    Route::delete('/notifications/{id}', [NotificationsAdminController::class, 'destroy'])
        ->name('notification_admin.destroy');
});

Route::get('suivi-interventions', [SuiviInterventionController::class, 'suivi_intervention'])
    ->name('admin.interventions.suivi.interventions');


Route::get('rapports', [RapportsController::class, 'rapport'])
    ->name('admin.rapport.suivi_rapport');




//Routes Authentifiées - Clients


Route::middleware(['auth', 'verified'])->prefix('client')->name('client.')->group(function () {
    Route::get('demande', [SuiviDemandeController::class, 'demande'])
        ->name('demande')
        ->middleware('permission:suivre_statut_demande');


    Route::get('notification', [NotificationsClientController::class, 'notification'])
        ->name('notification')
        ->middleware('permission:voir_notification');

    Route::delete('notification/{id}', [NotificationsClientController::class, 'destroy'])
        ->name('notification.destroy')
        ->middleware('permission:voir_notification');

    Route::get('facture', [FacturesClientController::class, 'facture'])
        ->name('facture');

    Route::get('contrat', [ContratController::class, 'contrat'])
        ->name('contrat');

    Route::get('message', [PageMessageClientController::class, 'message'])
        ->name('message');

    Route::post('message', [PageMessageClientController::class, 'store'])
        ->name('message.send');

    Route::get('message/poll', [PageMessageClientController::class, 'poll'])->name('message.poll');

    Route::get('message/unread-count', [PageMessageClientController::class, 'unreadCount'])
        ->name('message.unread-count');

    Route::delete('message/delete-for-me/{id}', [PageMessageClientController::class, 'deleteForMe'])
        ->name('message.delete-for-me');


    Route::get('fiches', function () {
        $demandes = auth()->user()->demande()
            ->with(['ficheAccueil', 'ficheIntervention', 'facture'])
            ->latest()
            ->get();
        return view('CLIENTS.Clients_Particuliers.fiches', compact('demandes'));
    })->name('fiches');
});


//Routes Authentifiées - Commercial

Route::middleware(['auth', 'verified'])->prefix('commercial')->name('commercial.')->group(function () {

    Route::get('reception_demande', [ReceptionDemandeController::class, 'reception_demande'])
        ->name('reception_demande')
        ->middleware('permission:consulter_demande');

    Route::post(
        '/notifications/{id}/approuver',
        [HomeController::class, 'approuver']
    )->name('notifications.approuver');

    //page du message 

    Route::get('message', [PageMessageController::class, 'message'])
        ->name('message');

    // Envoi de message
    Route::post('message/send', [PageMessageController::class, 'store'])
        ->name('message.send');

    // Suppression de message
    Route::delete('message/delete-for-me/{id}', [PageMessageController::class, 'deleteForMe'])
        ->name('message.delete-for-me');

    Route::get('message/poll', [PageMessageController::class, 'poll'])->name('message.poll');

    Route::get('message/unread-counts', [PageMessageController::class, 'unreadCounts'])->name('message.unread');

    Route::get('fiches_accueil/{id?}', [FichesAccueilController::class, 'fiche_accueil'])
        ->name('fiches_accueil')
        ->middleware('permission:remplir_fiche_accueil');

    //route pour les fiches d'accueil

    // Enregistrer la fiche pour la 1ère fois
    Route::post('fiches_accueil/{demande_id}', [FichesAccueilController::class, 'store'])
        ->name('fiches_accueil.store');

    // Modifier la fiche
    Route::put('fiches_accueil/{fiche}', [FichesAccueilController::class, 'update'])
        ->name('fiches_accueil.update');


    //fin route fiches d'accueil

    Route::get('facturation/{demande}', [FacturationController::class, 'facturation'])
        ->name('facturation');

    Route::post('facturation/{demande}/store', [FacturationController::class, 'store'])
        ->name('facturation.store');

    Route::put('facturation/{facture}/update', [FacturationController::class, 'update'])
        ->name('facturation.update');

    Route::get('/notifications', [NotificationsCommercialeController::class, 'notification'])
        ->name('notification_commerciale');

    Route::delete('/notifications/{id}', [NotificationsCommercialeController::class, 'destroy'])
        ->name('notification_commerciale.destroy');

    Route::get('demandes/{id}', function ($id) {
        $demande = \App\Models\Demande::with('user')->findOrFail($id);
        return view('commercial.show_demande', compact('demande'));
    })->name('show_demande');


    Route::get('/facture', [PageFactureController::class, 'facture'])
        ->name('pagefacture');
});



// Routes Authentifiées - Technicien

Route::middleware(['auth', 'verified'])->prefix('technicien')->name('technicien.')->group(function () {

    Route::get('liste_client', [ListeClientController::class, 'liste_client'])
        ->name('liste_client');

    Route::get('intervention', [InterventionController::class, 'intervention'])
        ->name('intervention');

    Route::get('rapports-pannes', [TechnicienDashboardController::class, 'rapportPannes'])
        ->name('rapports_pannes');

    Route::get('Contractuels', [ContractuelsController::class, 'Contractuels'])
        ->name('Contractuels');

    Route::get('/notifications', [NotificationsTechnicienController::class, 'notification'])
        ->name('notifications_technicien');

    Route::delete('/notifications/{id}', [NotificationsTechnicienController::class, 'destroy'])
        ->name('notifications_technicien.destroy');

    Route::get('diagnostic', [DiagnosticController::class, 'diagnostic'])
        ->name('diagnostic');

    Route::get('fiches_accueil/{id?}', [FichesAccueilController::class, 'fiche_accueil'])
        ->name('fiches_accueil');

    Route::put('fiches_accueil/{fiche}', [FichesAccueilController::class, 'updateTechnicien'])
        ->name('fiches_accueil.update');

    Route::get('fiches_intervention/{id}', [FichesInterventionController::class, 'fiches_intervention'])
        ->name('fiches_intervention')
        ->middleware('permission:remplir_fiche_intervention');

    // Fiche intervention contrat
    Route::get('fiche_intervention_contrat/{clientId}', [FicheInterventionContratController::class, 'fiche_intervention_contrat'])
        ->name('fiche_intervention_contrat');

    Route::post('fiche_intervention_contrat/{clientId}', [FicheInterventionContratController::class, 'store'])
        ->name('fiche_intervention_contrat.store');

    Route::post('fiche_intervention_contrat/{clientId}/update', [FicheInterventionContratController::class, 'update'])
        ->name('fiche_intervention_contrat.update');

    // Planning
    Route::get('planning_intervention/{clientId}', [ContractuelsController::class, 'create'])
        ->name('planning_intervention');

    Route::post('planning_intervention/{clientId}', [ContractuelsController::class, 'store'])
        ->name('planning_intervention.store');

    Route::post('planning_intervention/{clientId}/update', [ContractuelsController::class, 'update'])
        ->name('planning_intervention.update');

    Route::post('fiches_intervention/{demande_id}', [FichesInterventionController::class, 'store'])
        ->name('fiche_intervention.store');
});

// Routes Authentifiées - Recouvrement

Route::middleware(['auth', 'verified'])->prefix('recouvrement')->name('recouvrement.')->group(function () {
    Route::get('reception_facture', [ReceptionFactureController::class, 'reception_facture'])
        ->name('reception_facture')
        ->middleware('permission:consulter_facture');

    // Nouvelle route : factures par client
    Route::get('clients', [RecouvrementDashboardController::class, 'factures_par_client'])
        ->name('clients');

    // Nouvelles routes pour les notifications du recouvrement
    Route::get('/notifications', [NotificationsRecouvrementController::class, 'notification'])
        ->name('notification_recouvrement');

    Route::delete('/notifications/{id}', [NotificationsRecouvrementController::class, 'destroy'])
        ->name('notification_recouvrement.destroy');
});


// Routes API (Sanctum)

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {});


Route::middleware('auth')->group(function () {
    Route::post('/messages/send', [MessageController::class, 'send'])->name('messages.send');
    Route::get('/messages/history', [MessageController::class, 'history'])->name('messages.history');
    Route::get('/messages/unread-count', [MessageController::class, 'unreadCount'])->name('messages.unread');
});
