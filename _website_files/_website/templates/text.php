<?php defined('DIR') OR exit; ?>
    <div class="innerpage-hero about-hero-img" style="background-image: url('<?=(isset($image1) && $image1!='') ? $image1 : '/_website/images/shoppage.jpg'?>');">
        <div class="about-overlay"> </div>
        <img src="_website/images/icons/scrolldown.png" alt="<?php echo $title ?>" class="scrolldown">
        <h1><?php echo $title ?></h1>
    </div>
    <main class="about-contect g-about-contect">
        <?php echo strip_tags($content, "<strong><br><p><a><ul><li><h2>"); ?>

        <?php if(count($images)>0) : ?>
        <h3><?php echo l('photo.gallery');?></h2>
        <div class="gal-container">
        <?php
        foreach($images as $image) :
        ?>

            <div class="gal-box g-gal-box">
                <a href="<?php echo $image["file"];?>" class="image-link">
                    <img src="<?php echo $image["file"];?>" alt="<?php echo $image['title'];?>">
                </a>
            </div>

        <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </main>