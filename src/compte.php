<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/compte.css">
    <title>Compte</title>
</head>

<body>


    <h1 class="fidelite">Votre compte</h1>

    <!-- lien connexion-inscription -->

    <div class="compte-wrapper">
        <a href="#" class="compte-link" onclick="showForm('connexion')">Connexion &ensp;|</a>
        <a href="#" class="compte-link" onclick="showForm('inscription')">Inscription &ensp;|</a>
        <a href="../index.php" class="compte-link">Accueil</a>
    </div>

    <!-- Connexion -->

    <div id="connexion" class="form-section active">
        <form method="POST">
            <input type="hidden" name="action" value="connexion">
            <div class="container">
                <div class="form">
                    <h2>Connectez-vous</h2>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" placeholder="E-mail">
                    </div>
                    <div class="inputBox">
                        <input type="password" name="password" id="password" placeholder="Mot de passe">
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Connexion" class="button-connexion">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Inscription -->

    <div id="inscription" class="form-section">
        <form method="POST">
            <input type="hidden" name="action" value="inscription">
            <div class="container">
                <div class="form">
                    <h2>Inscrivez-vous</h2>
                    <div class="inputBox">
                        <input type="text" name="username" id="username" placeholder="Nom d'Utilisateur">
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" placeholder="E-mail">
                    </div>
                    <div class="inputBox">
                        <input type="password" name="password" id="password" placeholder="Mot de passe">
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Inscription">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- lien connexion-inscription -->

    <script>
    function showForm(formId) {
        document.getElementById('connexion').classList.remove('active');
        document.getElementById('inscription').classList.remove('active');
        document.getElementById(formId).classList.add('active');
    }
    </script>

</body>

</html>