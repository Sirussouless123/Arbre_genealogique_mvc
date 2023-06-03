<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="<?= URL ?>public/css/bootstrap.min.css">
</head>

<body>
    <style>
        form {
            width: 50% !important;
            height: 200px;
        }
    </style>
    <div class="container mt-5">
        <h2 class="text-center">Modification de type</h2>
        <div class="row d-flex justify-content-center">
            <form action="" method="post" class="bg-info">
                <div class="offset-2 col-8 mt-4 ">
                    <input type="text" name="namead" id="" placeholder="Nom du type" required class="form-control" value="<?=$name['name']?>">
                </div>
                <div class="offset-4">
                    <button type="submit" class='btn btn-success mt-5 mx-5 ' name="adminad"> Confirmer </button>
                </div>
                <?php if (isset($erreur) && !empty($erreur)) {
                ?>
                    <p class="text-danger text-center"><?= $erreur ?></p>
                <?php
                }
                ?>
            </form>
        </div>
    </div>


    <script src="<?= URL ?>public/js/bootstrap.bundle.min.js"></script>
</body>

</html>