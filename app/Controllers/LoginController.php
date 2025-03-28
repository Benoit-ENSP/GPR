<?php

namespace App\Controllers;

use App\Models\MembresModel;

class LoginController extends BaseController
{
    private $googleClient;

    public function __construct()
    {
        $this->googleClient = new \Google_Client();

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

        $googleButton = '<a href="' . $this->googleClient->createAuthUrl() . '">
            <img src="' . base_url('assets/img/google_Connect.png') . '" alt="Se connecter avec Google" />
        </a>';

        return view('login', ['googleButton' => $googleButton]);
    }

    public function login()
{
    log_message('debug', '➡️ Callback OAuth appelé');

    if (session()->get('isLoggedIn')) {
        log_message('debug', '🔁 Déjà connecté, redirection');
        return redirect()->to('/dashboard');
    }

    if ($this->request->getGet('code')) {
        log_message('debug', '✅ Code OAuth reçu : ' . $this->request->getGet('code'));

        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getGet('code'));

        if (!isset($token['error'])) {
            $this->googleClient->setAccessToken($token['access_token']);
            $googleService = new \Google_Service_Oauth2($this->googleClient);
            $data = $googleService->userinfo->get();

            $userEmail = $data['email'];

            log_message('debug', '👤 Email récupéré : ' . $userEmail);

            $membresModel = new MembresModel();
            $user = $membresModel
                ->where('email', $userEmail)
                ->where('adminGPR', 1)
                ->first();

            if ($user) {
                log_message('debug', '🎉 Utilisateur autorisé, connexion réussie');

                session()->set('user', $user);
                session()->set('isLoggedIn', true);

                return redirect()->to('/dashboard');
            } else {
                log_message('error', '🚫 Utilisateur non autorisé');

                return redirect()->to('/login')->with('error', 'Accès refusé.');
            }
        } else {
            log_message('error', '❌ Erreur OAuth : ' . $token['error']);

            return redirect()->to('/login')->with('error', 'Erreur OAuth : ' . $token['error']);
        }
    }

    log_message('error', '⛔ Code OAuth manquant');

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

    public function forceLogout()
{
    session()->destroy();
    return redirect()->to('https://accounts.google.com/Logout');
}

}
