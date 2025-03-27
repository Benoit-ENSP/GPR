<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Plateforme GPR ENSP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Style custom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login.css') ?>">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            text-align: center;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .login-container img {
            max-width: 120px;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 30px;
        }

        .google-button {
            margin-top: 20px;
        }

        .google-button img {
            width: 240px;
            cursor: pointer;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <img src="<?= base_url('assets/icons/header-logo.png') ?>" alt="ENSP">
        <h2>Connexion à la plateforme GPR</h2>

        <div class="google-button">
            <?= $googleButton ?>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
