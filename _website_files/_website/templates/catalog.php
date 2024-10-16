<?php defined('DIR') OR exit;
    $maincat = db_fetch_all("SELECT id,title,masterid from ".c("table.pages")." where id = {$id} and visibility=1 and deleted=0 and language='".l()."'");
    $maincatid = $maincat[0]['masterid'];


// echo "<pre>";
// print_r($items);
// echo "</pre>";
// echo $masterid;

$left = count($items);
for($i = 0; $i < count($items); $i++){
    if(isset($items[$i]["sold"]) && $items[$i]["sold"]==1){
        $left--;
    }
}
?>
<div class="FloorContentDiv">
	<div class="WithBackground BackgroundBlue"></div>
	<div class="container Padding0">
		<div class="row">
			<div class="col-sm-12">
				<div class="FloorPageDiv">
					<div class="Head">
						<div class="row">
							<div class="col-sm-6">
								<div class="Title"><?php echo (int)$title; ?>  <?php echo l('floor');?></div>
							</div>
							<div class="col-sm-6">
								<div class="FloorSlide InlineBlock">
									<div class="SmallTitle">
										<?php echo l('choose.mobile');?>
									</div>
									<div class="LeftArrowNumbers"></div>
									<div class="NumberContent">
                                    <?php if($maincatid==7){?>
										<div class="SlideNum">
<!--											<a href="<?php echo href('103');?>">1</a>
											<a href="<?php echo href('89');?>">2</a>
											<a href="<?php echo href('90');?>">3</a>
											<a href="<?php echo href('91');?>">4</a>
											<a href="<?php echo href('92');?>">5</a>
											<a href="<?php echo href('93');?>">6</a> -->
											<a href="<?php echo href('94');?>">10</a>
											<a href="<?php echo href('99');?>">11</a>
											<a href="<?php echo href('96');?>">12</a>
											<a href="<?php echo href('97');?>">13</a>
											<a href="<?php echo href('98');?>">14</a>
										</div>
                                    <?php }else if($maincatid==8){ ?>
										<div class="SlideNum">
											<a href="<?php echo href('102');?>">4</a>
											<a href="<?php echo href('72');?>">5</a>
											<a href="<?php echo href('73');?>">6</a>
											<a href="<?php echo href('74');?>">7</a>
											<a href="<?php echo href('75');?>">8</a>
											<a href="<?php echo href('76');?>">9</a>
											<a href="<?php echo href('77');?>">10</a>
											<a href="<?php echo href('82');?>">11</a>
											<a href="<?php echo href('79');?>">12</a>
											<a href="<?php echo href('80');?>">13</a>
											<a href="<?php echo href('81');?>">14</a>
										</div>
                                    <?php }else{ ?>
										<div class="SlideNum">
											<a href="<?php echo href('104');?>">4</a>
											<a href="<?php echo href('61');?>">5</a>
											<a href="<?php echo href('62');?>">6</a>
											<a href="<?php echo href('63');?>">7</a>
											<a href="<?php echo href('64');?>">8</a>
											<a href="<?php echo href('65');?>">9</a>
											<a href="<?php echo href('66');?>">10</a>
											<a href="<?php echo href('71');?>">11</a>
											<a href="<?php echo href('68');?>">12</a>
											<a href="<?php echo href('69');?>">13</a>
											<a href="<?php echo href('70');?>">14</a>
										</div>
                                    <?php } ?>
									</div>
									<div class="RightArrowNumbers"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="Content InlineBlock">
						<div class="row row20 HideDesktop">
							<div class="MobileFloorChange">
								<div class="FloorNumber1"><?php echo l('choose.mobile');?></div>
                                    <?php if($maincatid==7){?>
                                    <select id="SelectOnChangeValue">
<!--                                        <option value="<?php echo href('103');?>">1</option>
                                        <option value="<?php echo href('89');?>">2</option>
                                        <option value="<?php echo href('90');?>">3</option>
                                        <option value="<?php echo href('91');?>">4</option>
                                        <option value="<?php echo href('92');?>">5</option>
                                        <option value="<?php echo href('93');?>">6</option>-->
                                        <option value="<?php echo href('94');?>">10</option>
                                        <option value="<?php echo href('99');?>">11</option>
                                        <option value="<?php echo href('96');?>">12</option>
                                        <option value="<?php echo href('97');?>">13</option>
                                        <option value="<?php echo href('98');?>">14</option>
                                    </select>
                                    <?php }else if($maincatid==8){ ?>
                                    <select id="SelectOnChangeValue">
                                        <option value="<?php echo href('102');?>">4</option>
                                        <option value="<?php echo href('72');?>">5</option>
                                        <option value="<?php echo href('73');?>">6</option>
                                        <option value="<?php echo href('74');?>">7</option>
                                        <option value="<?php echo href('75');?>">8</option>
                                        <option value="<?php echo href('76');?>">9</option>
                                        <option value="<?php echo href('77');?>">10</option>
                                        <option value="<?php echo href('82');?>">11</option>
                                        <option value="<?php echo href('79');?>">12</option>
                                        <option value="<?php echo href('80');?>">13</option>
                                        <option value="<?php echo href('81');?>">14</option>
                                    </select>
                                    <?php }else{ ?>
                                    <select id="SelectOnChangeValue">
                                        <option value="<?php echo href('104');?>">4</option>
                                        <option value="<?php echo href('61');?>">5</option>
                                        <option value="<?php echo href('62');?>">6</option>
                                        <option value="<?php echo href('63');?>">7</option>
                                        <option value="<?php echo href('64');?>">8</option>
                                        <option value="<?php echo href('65');?>">9</option>
                                        <option value="<?php echo href('66');?>">10</option>
                                        <option value="<?php echo href('71');?>">11</option>
                                        <option value="<?php echo href('68');?>">12</option>
                                        <option value="<?php echo href('69');?>">13</option>
                                        <option value="<?php echo href('70');?>">14</option>
                                    </select>
                                    <?php } ?>
							</div>
						</div>
						<div class="FloorImageDiv row20" id="FloorMapID">
							<div class="LeftTextDiv Tooltip11" data-toggle="tooltip" data-placement="top" title="<?php echo l('mountains');?>"><img src="_website/img/mta.png"/></div>
							<div class="RightTextDiv Tooltip11" data-toggle="tooltip" data-placement="top" title="<?php echo l('sea');?>"><img src="_website/img/zgva.png"/></div>
							<div class="MobileFloorInfo">
								<span><?php echo (int)$title; ?> <?php echo l('floor');?></span>
								<div class="Btn1"><?php echo l('left');?> <?php echo $left;?> <?php echo l('room');?></div>
							</div>
                            <?php if($id==102 OR $id==72 OR $id==73 OR $id==74 OR $id==75 OR $id==76 OR $id==77 OR $id==104 OR $id==61 OR $id==62 OR $id==63 OR $id==64 OR $id==65 OR $id==66){ ?>
							<img src="<?php echo $image1 ?>" class="ImgMap ImgMap22 gflx<?=$maincatid?>-<?=$id?>" usemap="#features" />
                            <?php }else{ ?>
                            <img src="<?php echo $image1 ?>" class="ImgMap gflx<?=$maincatid?>-<?=$id?>" usemap="#features" />
                            <?php } ?>
							<map name="features">
								<?php
									foreach ($items as $item):
									$link = href($id,array(), l(), $item['id']);
								?>
									<?php if($item['sold']==1){?>
									<area size="<div class='FloorToolTip222'><span><?php echo $item['space'];?> m<i>2</i></span><label><?php echo l('room');?> - <?php echo (int)$item['title'];?></label></div>" class="FloorHover222" shape="poly" coords="<?php echo $item['poly'];?>" href="javascript:void(0)" data-id="<?php echo $item['id'];?>" data-maphilight='{"alwaysOn":false}' />
									<?php } else { ?>
									<area size="<div class='FloorToolTip222'><span><?php echo $item['space'];?> m<i>2</i></span><label><?php echo l('room');?> - <?php echo (int)$item['title'];?></label></div>" class="FloorHover222" shape="poly" coords="<?php echo $item['poly'];?>" href="<?php echo $link;;?>" data-id="<?php echo $item['id'];?>"/>
                                    <?php } ?>
								<?php endforeach; ?>
							</map>

							<?php if($maincatid==6){ ?>
							<div class="ApartSoldDiv HortenziaSold">
							<?php }else{ ?>
							<div class="ApartSoldDiv">
                            <?php } ?>
                            	<?php
                                    // $array20 = array(
                                    //     "plan/oleander/8-floor",
                                    //     "plan/oleander/9-floor",
                                    //     "plan/oleander/10-floor",
                                    //     "plan/oleander/11-floor"
                                    // );
                                    // if(in_array($slug, $array20)){
                                    //     $i=20;    
                                    // }else{
                                    //     $i=19;
                                    // }
                                    if($masterid==6){
                                        $i=20;    
                                    }else{
                                        $i=19;
                                    }
									
									foreach ($items as $item):
									$i--;
									$link = href($id,array(), l(), $item['id']);
								?>
                                <?php if($item['sold']==1){?>
                                <div id="Sold_<?php echo $i;?>" class="active">Sold</div>
								<?php } else if ($item['homepage']==1) {?>
                                <div id="Sold_<?php echo $i;?>" class="active">Reserved</div>
                                <?php } else {?>
                                <div id="Sold_<?php echo $i;?>">0</div>
                                <?php } ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="ScrollTop11"></div>


<div class="StageRightDiv" id="StageRightDivID">
    <ul class="Title current" id="InsideMenu2"><?php echo l('choose');?></ul>
	<div id="ScrollStage">
	<?php
		foreach ($items as $item):
		$link = href($id,array(), l(), $item['id']);
	?>
 		<li>
        <?php if($item['sold']==1){?>
            <a href="<?php echo $link;;?>" class="SoldDiv">
            <div class="Sold">Sold</div>
            <?php if($item['space']==65){?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/65.0/main.jpg"/></div>
            <?php } else if ($item['space']==46.3) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/46.30/main.jpg"/></div>
            <?php } else if ($item['space']==43) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/43.0/main.jpg"/></div>
            <?php } else if ($item['space']==68.60) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/68.60/main.jpg"/></div>
            <?php } else if ($item['space']==70.90) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/70.90/main.jpg"/></div>
            <?php } else if ($item['space']==43.6) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/43.6/main.jpg"/></div>
            <?php } else if ($item['space']==46.7) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/46.70/main.jpg"/></div>
            <?php } else if ($item['space']==66) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/66/main.jpg"/></div>
            <?php } else if ($item['space']==72.8) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/72.8/main.jpg"/></div>
            <?php }  ?>

            <?php echo $item['space'];?>
            <span><?php echo l('room');?> - <?php echo (int)$item['title'];?></span>
            </a>
        <?php } else if ($item['homepage']==1) {?>
            <a href="<?php echo $link;;?>" class="SoldDiv">
            <div class="Sold">Reserved</div>
            <?php if($item['space']==65){?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/65.0/main.jpg"/></div>
            <?php } else if ($item['space']==46.3) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/46.30/main.jpg"/></div>
            <?php } else if ($item['space']==43) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/43.0/main.jpg"/></div>
            <?php } else if ($item['space']==68.60) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/68.60/main.jpg"/></div>
            <?php } else if ($item['space']==70.90) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/70.90/main.jpg"/></div>
            <?php } else if ($item['space']==43.6) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/43.6/main.jpg"/></div>
            <?php } else if ($item['space']==46.7) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/46.70/main.jpg"/></div>
            <?php } else if ($item['space']==66) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/66/main.jpg"/></div>
            <?php } else if ($item['space']==72.8) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/72.8/main.jpg"/></div>
            <?php }  ?>

            <?php echo $item['space'];?>
            <span><?php echo l('room');?> - <?php echo (int)$item['title'];?></span>
            </a>
		<?php } else {?>
            <a href="<?php echo $link;;?>">
            <?php if($item['space']==65){?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/65.0/main.jpg"/></div>
            <?php } else if ($item['space']==46.3) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/46.30/main.jpg"/></div>
            <?php } else if ($item['space']==43) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/43.0/main.jpg"/></div>
            <?php } else if ($item['space']==68.60) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/68.60/main.jpg"/></div>
            <?php } else if ($item['space']==70.90) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/70.90/main.jpg"/></div>
            <?php } else if ($item['space']==43.6) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/43.6/main.jpg"/></div>
            <?php } else if ($item['space']==46.7) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/46.70/main.jpg"/></div>
            <?php } else if ($item['space']==66) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/66/main.jpg"/></div>
            <?php } else if ($item['space']==72.8) { ?>
            <div class="Image"><img src="https://mziurigardens.ge/files/flats/apartments/72.8/main.jpg"/></div>
            <?php }  ?>

            <?php echo $item['space'];?>
            <span><?php echo l('room');?> - <?php echo (int)$item['title'];?></span>
            </a>
		<?php } ?>

        </li>

	<?php endforeach; ?>
    </div>
</div>