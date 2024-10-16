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

                <?php foreach($news as $a) : ?>
                <div class="col-sm-4">
                    <a href="<?php echo href($a["id"]);?>" class="Item">
                        <div class="Image">
                            <img src="<?php echo ($a["image1"]!="") ? $a["image1"]:"_website/img/article1.jpg";?>"  alt="<?php echo $title ?>"/>
                        </div>
                        <div class="Info">
                            <div class="Date"><?php echo convert_date($a['postdate']) ?></div>
                            <div class="Title">
                                <?php echo $a["title"];?>
                            </div>
                            <div class="Text">
                                <?php echo $a["description"];?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>

                    <div class="clear"></div>

                <?php if($page_max>1) : ?>
                    <div class="pagination">
                <?php for($i=1;$i<=$page_max;$i++) : ?>
                        <a href="<?php echo href($id).'?page='.$i;?>" <?php echo ($page_cur==$i) ? 'class="active"':'';?> ><?php echo $i;?></a>
                <?php endfor; ?>
                        <div class="clear"></div>
                    </div>
                <?php endif;?>

            </div>
        </div>
    </div>
</div>