<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnic-popup.min.css" rel="stylsheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="<?= URL ?>public/css/inscription.css">
</head>

<body>

    <form action="" method="post">
        <?php
        if (isset($erreur) && !empty($erreur)) {
        ?>
            <div class="alert alert-danger">
                <?= $erreur ?>
            </div>
        <?php
        }
        ?>
        <h2>Connexion</h2>
        <input type="text" name="mail" placeholder="Email">
        <input type="password" name="pwd" placeholder="Mot de passe">
        <div class="button">
            <button type="submit" name="login">Connexion</button>
        </div>

    </form>
    <div class="inscri">
        <h5>Vous n'êtes pas inscrit?</h5>
        <a href="inscription">Inscrivez vous</a> </li>
    </div>
</body>

</html>