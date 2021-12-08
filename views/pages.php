<?php include 'includes/header.php';
require '../controllers/pages-controller.php';
require '../controllers/parameters-controller.php';
setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
?>

<div class="container"><?php
foreach($categories[$_GET['sujet']]->channel->item as $item) {
    ?><div class="d-flex flex-column flex-md-row justify-content-between border rounded changeColor my-3 p-3 row gx-0 fw-bold">
    <div class="col-12 col-md-5 text-vertical-align">
    <img class="img-fluid my-3" src="<?= $item->children('media', true)->content->attributes(); ?>" alt="">
    </div>
    <div class="col-12 col-md-7 text-vertical-align ps-4 pe-4">
    <?php echo $item->title;?>
    <p class="fw-normal pt-3"><?= $item->description; ?></p>
    <p class="fw-normal pt-3"><?= strftime("%A %d %B %Y %H:%M:%S", strtotime($item->pubDate)); ?></p>
    <div><a href="<?= $item->link; ?>"><button type="button" class="btn btn-dark btnPage">Aller vers l'article</button></a></div>
    </div>
    </div>
    <?php
}?>
</div>
<?php include "includes/footer.php";
?>
