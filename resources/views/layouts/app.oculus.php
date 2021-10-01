<?php extract($params); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset('css/app.css') ?>">
    
    <title>
        <?php echo $title ?>
    </title>
</head>
<body>
    <h1>Olá</h1>
    
    <?php require $page; ?>

    <script src="<?php echo asset('js/app.js') ?>"></script>
</body>
</html>