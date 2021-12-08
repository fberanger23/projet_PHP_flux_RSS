<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" type="image/jpg" href="favicon.ico" />
    <title>Document</title>
</head>

<body class="<?= isset($_COOKIE['mode']) ? $_COOKIE['mode'] : ""; ?>">
    <a class="text-decoration-none <?= isset($_COOKIE['mode']) ? $_COOKIE['mode'] : 'text-dark'; ?>" href="accueil">
        <p class="h1 text-center my-5">Super RSS Reader</p>
    </a>
    <?php include 'includes/navbar.php'; ?>