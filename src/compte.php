<?php
session_start();

require_once("connect.php");

if (isset($_GET["action"]) && $_GET["action"] == "deconnexion") {
    session_destroy();
    header("Location: compte.php");
    exit();
}

if (isset($_SESSION["compte"])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}

if (!empty($_POST)) {
    if (isset($_POST["action"])) {
        
        // Inscription
        if ($_POST["action"] == "inscription" && isset($_POST["username"], $_POST["email"], $_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {

            $username = strip_tags($_POST["username"]);
            $email = $_POST["email"];
            $password = $_POST["password"];
            $role = 'user'; 

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die("L'adresse email est incorrecte");
            }

            $password = password_hash($password, PASSWORD_ARGON2ID);

            $sql = "INSERT INTO `compte` (`username`, `email`, `password`, `role`) VALUES (:username, :email, :password, :role)";
            $query = $db->prepare($sql);
            $query->bindValue(":username", $username, PDO::PARAM_STR);
            $query->bindValue(":email", $email, PDO::PARAM_STR);
            $query->bindValue(":password", $password, PDO::PARAM_STR);
            $query->bindValue(":role", $role, PDO::PARAM_STR); 

            // Après l'inscription, on va sur connexion 
            if ($query->execute()) {
                header("Location: compte.php?form=connexion");
                exit();
            } else {
                die("Erreur lors de l'inscription.");
            }

        // Connexion
        } elseif ($_POST["action"] == "connexion" && isset($_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {

            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM `compte` WHERE `email` = :email";
            $query = $db->prepare($sql);
            $query->bindValue(":email", $email, PDO::PARAM_STR);
            $query->execute();

            $user = $query->fetch();

            if (!$user || !password_verify($password, $user["password"])) { 
                die("L'utilisateur et/ou le mot de passe est incorrect");
            }

            $_SESSION["compte"] = [
                "id" => $user["id"],
                "username" => $user["username"],
                "email" => $user["email"],
                "role" => $user["role"] 
            ];

            // Redirection en fonction du rôle
            if ($_SESSION["compte"]["role"] === 'admin') {
                header("Location: backend-ajout.php"); 
            } else {
                header("Location: index.php"); 
            }
            exit();
        } else {
            die("Le formulaire est incomplet ou invalide");
        }
    }
}
?>


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