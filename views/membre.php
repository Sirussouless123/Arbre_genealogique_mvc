<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membre</title>
    <link rel="stylesheet" href="<?= URL ?>public/css/membre.css">

</head>

<body>
    <div class="head">
        <h1>Famille</h1>
        <div class="nav-links">
            <ul>
                <?php
                if (isset($_SESSION['idTm']) && ($_SESSION['idTm'] == 6 || $_SESSION['idTm'] == 7)) {
                ?>
                    <a href="recensement">Recensement</a>
                    <a href="memout">Déconnexion</a>
                <?php
                } else {
                ?>
                    <a href="memout">Déconnexion</a>
                <?php
                }
                ?>
            </ul>


        </div>
    </div>

    <div class="famille">

        <?php
        if (isset($_SESSION['idTm']) && ($_SESSION['idTm'] == 6 || $_SESSION['idTm'] == 7)) {

            foreach ($userList as $user) {
        ?>
                <div class="personne">
                    <h5> <span>Membre</span> </h5>
                    <p>Nom: <span><?= $user['f_name'] ?></span></p>
                    <p>Prénom: <span><?= $user['l_name'] ?></span></p>
                    <p>Date de naissance: <span><?= $user['birth_date'] ?></span></p>
                    <p>Statut: <span><?= $user['name'] ?></span></p>
                    <u> <a href="modifier&num=<?= $user['idUt'] ?>" style='color:blue;'>Modifier les informations</a></u>
                </div>
            <?php
            }
        } else {
            foreach ($userList as $user) {
            ?>
                <div class="personne">
                    <h5> <span>Membre</span> </h5>
                    <p>Nom: <span><?= $user['f_name'] ?></span></p>
                    <p>Prénom: <span><?= $user['l_name'] ?></span></p>
                    <p>Date de naissance: <span><?= $user['birth_date'] ?></span></p>
                    <p>Statut: <span><?= $user['name'] ?></span></p>


                </div>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>