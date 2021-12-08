<?php
include 'includes/header.php';
require '../controllers/index-controller.php';
require '../controllers/parameters-controller.php';

if (isset($_POST['mode']) && isset($_POST['numberOfArticles']) && isset($_POST['articles']) && in_array($_POST['mode'], $modeChoices) && in_array($_POST['numberOfArticles'], $articlesNumberChoices) && empty(array_diff($_POST['articles'], $articlesChoices))) {
    $articleList = implode(" ", $_POST['articles']);
    setcookie('mode', htmlspecialchars(trim($_POST['mode'])), time() + 3600 * 24 * 7);
    setcookie('numberOfArticles', htmlspecialchars(trim($_POST['numberOfArticles'])), time() + 3600 * 24 * 7);
    setcookie('articles', htmlspecialchars(trim($articleList)), time() + 3600 * 24 * 7);
}

if (isset($_POST['mode'])) {
    header("Location: parametres");
    exit;
}
?>

<div class="container my-5">
    <form action="parametres" name="form" method="POST">
        <div class="mb-3">
            <p>A vous de voir si vous tenez a vos yeux ...</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="mode" id="lightMode" value="lightMode" <?php if (isset($_COOKIE['mode'])) { echo $_COOKIE['mode'] == 'lightMode' ? 'checked' : '';} else { echo 'checked';} ?>>
                <label class="form-check-label" for="lightMode">
                    Blind mode
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="mode" id="darkMode" value="darkMode" <?php if (isset($_COOKIE['mode'])) { echo $_COOKIE['mode'] == 'darkMode' ? 'checked' : '';} ?>>
                <label class="form-check-label" for="darkMode">
                    Best mode
                </label>
            </div>
        </div>

        <div class="mb-3">
            <p>Veuillez choisir le nombre d'articles a afficher dans le fils d'actualité (12 par défaut) :</p>
            <?php foreach ($articlesNumberChoices as $choices) { ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="numberOfArticles" id="<?= $choices; ?>" value="<?= $choices; ?>" <?php if (isset($_COOKIE['numberOfArticles'])) { echo $_COOKIE['numberOfArticles'] == $choices ? 'checked' : '';} else { echo $x === count($articlesNumberChoices)? 'checked': '';} ?>>
                    <label class="form-check-label" for="<?= $choices; ?>">
                        <?= $choices; ?>
                    </label>
                </div>
            <?php $x++;
            } ?>
        </div>
        <div class="mb-3">
            <p>Choississez 3 articles de votre choix :</p>
            <?php
            foreach ($articlesChoices as $item) {
            ?>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" name="articles[]" type="checkbox" id="<?= $item ?>" value="<?= $item ?>" <?php if (isset($_COOKIE['numberOfArticles'])) { echo strpos($_COOKIE['articles'], $item) !== false ? 'checked' : '';}?>>
                    <label class="form-check-label" for="<?= $item ?>"><?= $item ?></label>
                </div>
            <?php } ?>
            <p class="text-warning" id="tooMuchArticles"></p>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary btnPage">Valider</button>
        </div>
    </form>
</div>


<?php include 'includes/footer.php'; ?>
<script src="assets/script/script.js"></script>