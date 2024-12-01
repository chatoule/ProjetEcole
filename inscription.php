
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #c4c4c4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .register-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .register-container:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-size: 14px;
            color: #333;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="text"]:focus {
            border-color: #065718;
            outline: none;
        }

        button {
            background-color: #065718;
            color: white;
            border: none;
            padding: 15px;
            font-size: 16px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #065718;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 15px;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #065718;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="register-container">
        <h2>Inscription</h2>

        <!-- Formulaire d'inscription -->
        <form action="log.php" method="POST">
            <div class="form-group">
                <label for="compte">Compte :</label>
                <input type="text" id="compte" name="compte" required placeholder="Entrez votre Utilisateur">
            </div>

            <div class="form-group">
                <label for="nomPrenom">Nom & Prenom:</label>
                <input type="text" id="nomPrenom" name="nomPrenom" required placeholder="Entrez votre nom">
            </div>
            
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required placeholder="Entrez votre email">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="motpasse" required placeholder="Entrez votre mot de passe">
            </div>
            
            <button type="submit" name="register" value='1'>S'inscrire</button>
        </form>

        <div class="footer">
            <p>Déjà inscrit ? <a href="authent.php">Se connecter</a></p>
        </div>
    </div>

</body>
</html>
