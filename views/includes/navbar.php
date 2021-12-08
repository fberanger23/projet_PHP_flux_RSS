<?php
$articlesChoices = array('Emploi', 'Entreprise', 'Industrie', 'Economie-Francaise', 'Economie');
?>
<nav class="navbar navbar-expand-lg <?= isset($_COOKIE['mode']) ? 'navbar-light bg-light' : 'navbar-dark bg-dark'; ?>">
    <div class="container">
        <div class="container-fluid d-lg-flex flex-lg-row">
            <a class="navbar-brand" href="accueil">Accueil</a>
            <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarNav">
                <div>
                    <ul class="navbar-nav">
                        <?php
                        if (isset($_COOKIE['articles'])) {
                            $articlesNav = explode(" ", $_COOKIE['articles']);
                            foreach ($articlesNav as $key => $value) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $value; ?>"><?= $value; ?></a>
                                </li>

                            <?php }
                        } else {
                            foreach ($articlesChoices as $key => $value) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $value; ?>"><?= $value; ?></a>
                                </li>
                        <?php }
                        } ?>
                    </ul>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link text-color" href="parametres">Paramètres</a>
                </div>
            </div>
        </div>
    </div>
</nav>