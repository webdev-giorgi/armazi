<?php defined('DIR') OR exit; 

$imageList = array(
    $image1,
    $image2,
    $image3,
    $image4,
    $image5,
    $image6
);
$imageList = array_filter($imageList, function($value) {
    return $value !== '' && $value !== null && $value !== ' ';
});
?>

    <div class="store-container g-event-container" style="position: relative;">

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <?php for($x=0; $x<count($imageList); $x++): ?>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$x?>"<?=($x==0) ? ' class="active"' : ''?>></li>
                <?php endfor; ?>
            </ol>
            <div class="carousel-inner">
                <?php for($x=0; $x<count($imageList); $x++): ?>
                <div class="carousel-item<?=($x==0) ? ' active' : ''?>">
                    <img class="d-block w-100" src="<?=@$imageList[$x]?>"
                        alt="First slide">
                </div>
                <?php endfor; ?>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>

            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>

            </a>
        </div>
        <div class="store-desc" style="min-height:550px;">
            <div class="store-name">
                <p><?=$title?></p>
                <p><?php echo convert_date($postdate) ?></p>
            </div>
            <div class="store-info">
                <?php echo strip_tags($content, "<p><a><ul><li>")?>
            </div>

        </div>

    </div>
