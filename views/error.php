<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur</title>
    <link rel="stylesheet" href="<?= URL ?>public/css/bootstrap.min.css">

</head>
<body>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
           <p class="text-center text-danger mt-5">
                 <?=$e?>
           </p>
           
           <a href="accueil" class="btn btn-primary mt-5 col-6">Retour à l'accueil </a>
    </div>
</div>
         
</body>
</html>