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
        <h2>Inscription</h2>
        <input type="text" name="f_name" placeholder="Nom"  autocomplete="off">
        <input type="text" name="l_name" placeholder="Prénom" required="required" autocomplete="off">
        <input type="text " name="mail" placeholder="Email" required="required" autocomplete="off">
        <input type="date " name="birth_date" placeholder="Date de naissance Ex : 01/12/2000" required="required" autocomplete="off">
        <input type="text " name="birth_city" placeholder="Ville de naissance" required="required" autocomplete="off">
        <input type="password" name="pwd" placeholder="Mot de passe" required="required" autocomplete="off">
        <input type="password" name="cpwd" placeholder="Confirmez votre mot de passe" required="required" autocomplete="off">

        <!-- <div class="fichier">
             <h6></h6>
             Image :<input type="file" name="picture" >
           
        </div> -->
        <select name="membre" id="statut">
            <?php

            foreach ($list as $data) {
            ?>
                <option value="<?= $data['idTm'] ?>"><?= $data['name'] ?></option>
            <?php
            }
            ?>
        </select>
        <div class="button">
            <button type="submit" name="signup">Inscription</button>
        </div>



    </form>


</body>

</html>