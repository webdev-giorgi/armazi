<?php defined('DIR') OR exit; ?>
<div class="CoverDiv DisplayInline">
    <div class="container-fluid Padding_0">
        <?php if($image1!=""){?>
        <div class="Image">
            <img src="<?php echo $image1 ?>" alt="<?php echo $title ?>">
        </div>
        <?php }else{ ?>
            <?php
            $attached = db_fetch_all("SELECT * from ".c("table.attached")." where page = {$id} and language='".l()."'");
            if(!empty($attached)):
            ?>
                    <div class="Image">
            <?php foreach($attached as $att): ?>
                        <img src="<?php echo $att['file'] ?>" alt="<?php echo $title ?>">
            <?php endforeach; ?>
                    </div>
            <?php endif; ?>
        <?php } ?>
        <div class="Content">
            <div class="Title" style="margin-top:-20px;">
                <?php echo l('services');?>
            </div>
        </div>
    </div>
    <div class="BottomEffect">
     	<svg viewBox="0 -20 700 110" width="100%" height="150" preserveAspectRatio="none">
 		    <path d="M0,10 c80,-18 230,-12 350,7 c80,13 260,80 350,-5 v100 h-700z" fill="#f2f5fa" />
      	</svg>
    </div>
</div>

<div class="Services DisplayInline">
    <div class="DisplayFlex">
        <div class="container MyContainer">
            <div class="Head">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="Icon">
                            <img src="<?php echo $image2 ?>" alt="<?php echo $title ?>">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="ServiceMenu">
                            <?php echo pages($masterid);?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Content">
                <div class="Title"><?php echo $title ?></div>
                <div class="row">
					<div class="col-sm-6">
						<div class="Text">
							<?php echo $content ?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="Image">
							 <img src="<?php echo $image3 ?>" alt="<?php echo $title ?>">
						</div>
					</div>
				</div>	
            </div>
        </div>
    </div>
</div>

<div class="NewsList NewsList22 DisplayInline">
    <div class="DisplayFlex">
        <div class="container MyContainer">
            <div class="row">

                <?php foreach($lists as $a) : ?>
                <div class="col-sm-3">
                    <a href="<?php echo href($a["id"]);?>" class="Item">
                        <div class="Image">
                            <img src="<?php echo ($a["image1"]!="") ? $a["image1"]:"_website/img/article1.jpg";?>"  alt="<?php echo $title ?>"/>
                        </div>
                        <div class="Info">
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
            </div>
        </div>
    </div>
</div>