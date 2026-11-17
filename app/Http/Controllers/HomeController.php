<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDemandeRequest;
use App\Models\Client;
use App\Models\Demande;
use App\Models\User;
use App\Notifications\ClientNotification;
use App\Notifications\MaintenanceNotification;
use App\Notifications\CommercialeNotification;
use App\Mail\PasswordSetupMail;
use App\Services\SmsService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
        return view('maintenance.index');
    }

    public function about()
    {
        return view('maintenance.about');
    }

    public function documents()
    {
        return view('maintenance.documents');
    }

    public function formulaire_demande()
    {
        return view('CLIENTS.Clients_Particuliers.formulaire_demande');
    }

    public function store(StoreDemandeRequest $request)
    {
        try {
            DB::beginTransaction();

            // Vérification si le user et le client existent déjà
            $user   = User::where('email', $request->email)->first();
            $client = Client::where('email', $request->email)->first();

            // Création de l'utilisateur s'il n'existe pas encore
            if (!$user) {
                $user = User::create([
                    'name'     => $request->nom_complet,
                    'email'    => $request->email,
                    'password' => Hash::make(Str::random(10)),
                    'phone'    => $request->telephone,
                ]);

                $user->assignRole('client');
            }

            // Je crée ou je  mets à jour le client 
            if ($client) {
                $client->update([
                    'type_clients' => 'Particuliers',
                    'nom_complet'  => $request->nom_complet,
                    'telephone'    => $request->telephone,
                    'email'        => $request->email,
                    'adresse'      => $request->adresse,
                    'user_id'      => $user->id,
                ]);
            } else {
                $client = Client::create([
                    'type_clients' => 'Particuliers',
                    'user_id'      => $user->id,
                    'nom_complet'  => $request->nom_complet,
                    'telephone'    => $request->telephone,
                    'email'        => $request->email,
                    'adresse'      => $request->adresse,
                ]);
            }

            // creation de  la demande
            $demande = Demande::create([
                'nom_complet' => $request->nom_complet,
                'telephone'   => $request->telephone,
                'email'       => $request->email,
                'adresse'     => $request->adresse,
                'objet'       => $request->objet,
                'panne'       => $request->panne,
                'statut'      => 'en_attente',
                'user_id'     => $user->id,
                'client_id'   => $client->id,
            ]);

            DB::commit();

            //  Notifier les administrateurs 
            $admins = User::role('administrateur')->get();
            foreach ($admins as $admin) {
                $admin->notify(new MaintenanceNotification($demande));
            }

            //  Notifier les commerciaux 
            $commerciaux = User::role('commerciale')->get();
            foreach ($commerciaux as $commercial) {
                $commercial->notify(new CommercialeNotification($demande));
            }

            //  Message de retour selon si le user est connecté ou non 
            if (Auth::check()) {
                return back()->with('success', 'Votre demande a été envoyée avec succès.');
            }

            return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès. Elle est en cours d\'examen par notre équipe commerciale. Dès validation, vous recevrez un lien sur votre adresse mail afin de définir votre mot de passe et accéder à votre compte.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    
    public function approuver($notificationId)
    {
        /** @var \App\Models\User $authUser */
        $authUser     = Auth::user();
        $notification = $authUser->notifications()->findOrFail($notificationId);
        $demande      = Demande::findOrFail($notification->data['demande_id']);



        // Verification si la demande est déjà approuvée pour éviter les doublons et les erreurs
        if ($demande->statut === 'approuve') {
            return back()->with('warning', 'Cette demande a déjà été approuvée.');
        }

        // Vérification si c'est un nouveau compte AVANT d'activer le compte client

        $estNouveauCompte = !Demande::where('user_id', $demande->user_id)
            ->where('id', '!=', $demande->id)
            ->where('statut', 'approuve')
            ->exists() && $demande->user->hasRole('client');


        // $estNouveauCompte = is_null($demande->user->statut) , $demande->user->statut !== 'actif';

        // Mise à jour du  statut de la demande
        $demande->update(['statut' => 'approuve']);

        // Activation du  compte client
        $demande->user->update(['statut' => 'actif']);

        //  Envoyer le lien UNIQUEMENT si c'est un nouveau compte 
        if ($estNouveauCompte) {

            // Générer un token unique pour rendre le lien à usage unique
            $token = Str::random(64);

            // Enregistrer le token sur l'utilisateur (sera créé via migration)
            try {
                $demande->user->update([
                    'password_setup_token' => $token,
                    'password_setup_sent_at' => now(),
                ]);
            } catch (\Exception $e) {
                Log::error('Impossible d\'enregistrer le token password_setup', ['error' => $e->getMessage(), 'user_id' => $demande->user_id]);
            }

            // Générer le lien signé temporaire (valable 24h) avec token
            $url = URL::temporarySignedRoute(
                'password.setup',
                now()->addHours(24),
                ['user' => $demande->user_id, 'token' => $token]
            );

            $sentEmail = false;
            $sentSms = false;

            // Canal 1 : Email (si présent et valide)
            if (!empty($demande->user->email) && filter_var($demande->user->email, FILTER_VALIDATE_EMAIL)) {
                try {
                    Mail::to($demande->user->email)->queue(new PasswordSetupMail($demande->user, $url));
                    $sentEmail = true;
                } catch (\Exception $e) {
                    Log::error('Envoi email PasswordSetup échoué', ['error' => $e->getMessage(), 'user_id' => $demande->user_id]);
                }
            } else {
                Log::info('Email absent ou invalide pour l\'envoi du lien password setup', ['user_id' => $demande->user_id, 'email' => $demande->user->email ?? null]);
            }

            // Canal 2 : SMS (si numéro présent) — envois en complément ou fallback
            if (!empty($demande->telephone)) {
                $telephone = $this->formaterNumero($demande->telephone);

                $message  = "Bonjour {$demande->nom_complet}, ";
                $message .= "votre demande de maintenance a été approuvée. ";
                $message .= "Veuillez définir votre mot de passe via ce lien : {$url}";

                try {
                    $smsService = new SmsService();
                    $sent = $smsService->send($telephone, $message);
                    if ($sent) {
                        $sentSms = true;
                    } else {
                        Log::error('Echec envoi SMS pour password setup', ['to' => $telephone, 'user_id' => $demande->user_id]);
                    }
                } catch (\Exception $e) {
                    Log::error('Exception lors de l\'envoi SMS', ['error' => $e->getMessage(), 'user_id' => $demande->user_id]);
                }
            }

            // Si email absent/invalid et SMS non envoyé -> log
            if (!$sentEmail && empty($sentSms)) {
                Log::warning('Aucun canal disponible pour l\'envoi du lien password setup', ['user_id' => $demande->user_id]);
            }
        }

        // Notification du  client dans l'interface 
        $demande->user->notify(new ClientNotification(

            'Votre demande de maintenance a été approuvée.
Les frais de diagnostic sont de 5 000 FCFA. Merci de venir à l\'ACSI avec votre appareil.',
            'succes'
        )); 

        return back()->with('success', 'Demande approuvée' . ($estNouveauCompte ? ', Liens de connexion envoyés au client' : '.')); 
    }


    // Formater le numéro de téléphone en format international

    private function formaterNumero(string $telephone): string
    {
        // Supprimer tous les espaces
        $tel = preg_replace('/\s+/', '', $telephone);

        // Si déjà en format international (+242...), on ne touche pas
        if (str_starts_with($tel, '+')) {
            return $tel;
        }

        // Si commence par 0, remplacer le 0 par +242
        //if (str_starts_with($tel, '0')) {
           // return '+242' . substr($tel, 1);
        //}

        // Sinon ajouter +242 devant
        return '+242' . $tel;
    }


    public function markAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return back();
    }
}
