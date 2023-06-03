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
    <h2 class="text-center text-primary mt-3">Liste des types de membre</h2>        
    <div class="container mt-5">
    <a href="adminaj" class="btn btn-success ">Ajouter un type</a>
    <a href="adminlogout" class="btn btn-danger mx-5">Se déconnecter</a>
        <div class="row d-flex justify-content-center ">
            <table class="table  table-striped-columns mt-5">
                <thead>
                    <tr>
                        <th>
                            N°
                        </th>
                        <th>
                            Nom
                        </th>
                        <th>
                            Modifier
                        </th>
                       
                    </tr>
                </thead>
                <tbody>

                    <?php

                    foreach ($typeList as  $list) {
                    ?>
                        <tr>
                            <td><?= $list['idTm'] ?></td>
                            <td><?= $list['name'] ?></td>
                            <td>
                            <form action="adminmod&num=<?=$list['idTm']?>" method="post">
                                <input type="hidden" name="num" value="<?=$list['idTm']?>">
                                    <button type="submit"  class="btn btn-warning">Modifier</button>
                                </form>                            
                            </td>

                        </tr>
                    <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>



    <script src="<?= URL ?>public/js/bootstrap.bundle.min.js"></script>
</body>

</html>