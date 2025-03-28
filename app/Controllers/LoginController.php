<?php

namespace App\Controllers;

use App\Models\MembresModel; // 🧠 Ton modèle pour accéder à la table membres

class LoginController extends BaseController
{
    private $googleClient;

    public function __construct()
    {
        $this->googleClient = new \Google_Client();

        // ✅ Ton supérieur en a besoin :
        $this->googleClient->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->googleClient->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->googleClient->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    public function loginPage()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        // Bouton Google (lien généré par Google_Client)
        $googleButton = '<a href="' . $this->googleClient->createAuthUrl() . '">
    <img src="' . base_url('assets/img/google_Connect.png') . '" alt="Se connecter avec Google" />
</a>';


        return view('login', ['googleButton' => $googleButton]);
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        if ($this->request->getGet('code')) {
            $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getGet('code'));

            if (!isset($token['error'])) {
                $this->googleClient->setAccessToken($token['access_token']);
                $googleService = new \Google_Service_Oauth2($this->googleClient);
                $data = $googleService->userinfo->get();

                $userEmail = $data['email'];

                // 🔍 Vérifier dans la base de données que l'utilisateur est autorisé
                $membresModel = new MembresModel();
                $user = $membresModel
                    ->where('email', $userEmail)
                    ->where('adminGPR', 1) // ✅ SEULEMENT s’il est autorisé
                    ->first();

                if ($user) {
                    // ✅ Connexion autorisée
                    session()->set('user', $user);
                    session()->set('isLoggedIn', true);

                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->to('/login')->with('error', 'Accès refusé. Vous n\'êtes pas autorisé à utiliser cette plateforme.');
                }
            } else {
                return redirect()->to('/login')->with('error', 'Erreur OAuth : ' . $token['error']);
            }
        }

        return redirect()->to('/login')->with('error', 'Code manquant dans la requête OAuth.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function debugSession()
    {
        echo "<pre>";
        print_r(session()->get());
        echo "</pre>";
    }
}
