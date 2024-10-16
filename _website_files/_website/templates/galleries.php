<?php defined('DIR') OR exit; ?>
<div class="CoverDiv DisplayInline">
    <div class="container-fluid Padding_0">
        <div class="Image">
            <img src="<?php echo $image1 ?>" alt="<?php echo $title ?>">
        </div>
        <div class="Content">
            <div class="Title">
                <?php echo $title ?>
            </div>
        </div>
    </div>
    <div class="BottomEffect">
     	<svg viewBox="0 -20 700 110" width="100%" height="150" preserveAspectRatio="none">
 		    <path d="M0,10 c80,-18 230,-12 350,7 c80,13 260,80 350,-5 v100 h-700z" fill="#f2f5fa" />
      	</svg>
    </div>
</div>

<div class="NewsList DisplayInline">
    <div class="DisplayFlex">
        <div class="container MyContainer">
            <div class="row">

<?php
    foreach ($photos as $item):
        if ($item['image1']):
?>
                <div class="col-sm-4">
                    <a href="<?php echo $item['image1'] ?>" class="Item fancybox" data-fancybox="group">
                        <div class="Image">
                            <img src="<?php echo $item['image1'] ?>"  alt="<?php echo $title ?>"/>
                        </div>
                    </a>
                </div>
<?php
        endif;
    endforeach;
?>
                    <div class="clear"></div>
            </div>
        </div>
    </div>
</div>