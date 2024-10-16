<div class="innerpage-hero about-hero-img" style="background-image: url('<?=(isset($image1) && $image1!='') ? $image1 : '/_website/images/shoppage.jpg'?>');">
        <div class="about-overlay" style="background-color: <?=$cover_color?>"> </div>
        <img src="_website/images/icons/scrolldown.png" alt="<?php echo $title ?>" class="scrolldown">
        <h1><?php echo $title ?></h1>
    </div>

     <main class="offers-content">
    <h2><?=$menutitle2?></h2>
    
    <div class="offers-container">
        <?php
        $limit = " ORDER BY `position` DESC";
        $g_all_discounts = g_all_discounts($limit);

        foreach($g_all_discounts as $item):
                $link = href(2,array(), l(), $item['id']);
        ?>
                <a href="<?=$link?>" class="offer ">
                        <div class="offer-top">
                            <img src="/_website/images/offer.png" alt="">
                            <span class="discount">-<?=$item['discount']?><span class="fs81">%</span></span>
                          </div>
                        <div class="offer-bottom">
                                <div class="offer-text">
                                        <h3><?=$item['title']?></h3>
                                        <p><?=$item['discount_text']?></p>
                                </div>
                        </div>
                        <div class="offer-link">
                                <img src="<?=$item['image1']?>" width="110">
                                <svg  class="offer-arrow" xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20">
                                <path  id="Path_776" data-name="Path 776" d="M96.536,67.863l10-10-10-10Z" transform="translate(-96.536 -47.862)" fill="#c9c9c9" />
                                </svg>
                        </div>
                </a>
        <?php
        endforeach;
        ?>
     
    </div>
  </main>