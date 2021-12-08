<?php
require 'controllers/parameters-controller.php';
require 'controllers/index-controller.php';
?>
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
    <?php include 'views/includes/navbar.php'; ?>
    <div class="container my-5">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= $emploiImg; ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-carousel p-3">
                        <p><?= $emploi->item[0]->title; ?></p>
                        <p><?= $emploi->item[0]->description ?></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= $industrieImg; ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-carousel p-3">
                        <p><?= $industrie->item[0]->title; ?></p>
                        <p><?= $industrie->item[0]->description; ?></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= $economieFrancaiseImg; ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-carousel p-3">
                        <p><?= $economieFrancaise->item[0]->title; ?></p>
                        <p><?= $economieFrancaise->item[0]->description; ?></p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div>
            <?php
            if (isset($emploiXML) && isset($entrepriseXML) && isset($industrieXML) && isset($economieFrancaiseXML) && isset($economieXML)) {
                for ($i = 0; $i < $articlesNumber; $i++) {
                    $randomArticle = rand(0, 4);
                    $date = $articles[$randomArticle]->item[$i]->pubDate;
            ?>
                    <div class="d-flex flex-row justify-content-between border rounded changeColor my-3 p-3 row gx-0">
                        <div class="col-1 square <?php switch ($randomArticle) {
                                                        case 0:
                                                            echo "bg-primary";
                                                            break;
                                                        case 1:
                                                            echo "bg-success";
                                                            break;
                                                        case 2:
                                                            echo "bg-danger";
                                                            break;
                                                        case 3:
                                                            echo "bg-info";
                                                            break;
                                                        case 4:
                                                            echo "bg-warning";
                                                            break;
                                                        default:
                                                            echo "bg-secondary";
                                                            break;
                                                    } ?>"></div>
                        <div class="col-11 col-md-8 text-vertical-align">
                            <p class="articleText"><?= $articles[$randomArticle]->item[$i]->title; ?></p>
                        </div>
                        <div class="col-6 col-lg-1 text-lg-center d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-bg" data-bs-toggle="modal" data-bs-target="#modalArticle<?= $i ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-zoom-in" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                    <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z" />
                                    <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </button>
                        </div>
                        <div class="col-6 col-lg-2 text-vertical-align text-center">
                            <a class="articleText articleLink text-decoration-none" href="<?= $articles[$randomArticle]->item[$i]->link; ?>">Lien vers l'article</a>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modalArticle<?= $i ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header d-flex flex-column">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <p> <?= strftime("%A %d %B %Y %H:%M:%S", strtotime($date)); ?></p>
                                    <p class="modal-title h5" id="exampleModalLabel"><?= $articles[$randomArticle]->item[$i]->title; ?></p>
                                </div>
                                <div class="modal-body">
                                    <img class="w-100 my-3" src="<?= $articles[$randomArticle]->item[$i]->children('media', true)->content->attributes(); ?>" alt="">
                                    <p><?= $articles[$randomArticle]->item[$i]->description; ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <a href="<?= $articles[$randomArticle]->item[$i]->link; ?>"><button type="button" class="btn btn-primary btnModal">Aller vers l'article</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            }

            ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>