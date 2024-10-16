<?php defined('DIR') OR exit;
    $parent_slug = db_retrieve('slug', c("table.pages"), 'menutype', $menuid);
?>
    <div id="title" class="fix">
        <div class="icon"><img src="_manager/img/edit.png" width="16" height="16" alt="" /></div>
        <div class="name"><?php echo a("catalogs");?>: <?php echo ($route[1] == 'edit') ? $pagetitle.' - '.a('ql.edit') : $pagetitle.' - '.a('add'); ?></div>
    </div>
    <div id="box">
        <div id="part">
<?php $ulink = ($route[1]=="add") ? ahref(array($route[0], 'add', $menuid)) : ahref(array($route[0], 'edit', $id)); ?>
            <div id="news">
                <form id="catform" name="catform" method="post" action="<?php echo $ulink;?>">
                    <div id="general">
                        <input type="hidden" name="tabstop" id="tabstop" value="edit" />
                        <input type="hidden" name="menuid" value="<?php echo $menuid ?>" />
                        <div class="list fix">
                            <div class="icon"><a href="#"><img src="_manager/img/minus.png" width="16" height="16" alt="" /></a></div>
                            <div class="title"><?php echo a("info");?>: <span class="star">*</span></div>
                        </div>

                        <div class="list2 fix">
                            <div class="name"><?php echo a("title");?>: <span class="star">*</span></div>
                            <input type="text" id="pagetitle" name="title" value="<?php echo ($route[1]=='edit') ? $title : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name"><?php echo a("friendlyURL");?>:</div>
                            <?php echo c('site.url') . l() .'/'. $parent_slug.'/'; ?>
                            <input type="text" id="slug" name="slug" value="<?php echo ($route[1]=='edit') ? $slug : '' ?>" class="inp-ssmall" />
                            <?php echo ($route[1] == 'edit') ? '/'.$id : '';?>
                        </div>

                        <div class="list2 fix dn">
                            <div class="name"><?php echo a("date");?>: <span class="star">*</span></div>
                            <input type="text" name="postdate" value="<?php echo ($route[1]=='edit') ? date('Y-m-d', strtotime($postdate)) : date('Y-m-d'); ?>" id="postdate" class="inp-small" />
                            <div class="name"><?php echo a("time");?>: <span class="star">*</span></div>
                            <input type="text" name="posttime" value="<?php echo ($route[1]=='edit') ? date('H:i:s', strtotime($postdate)) : date('H:i:s'); ?>" id="posttime" class="inp-small" />
                        </div>

                        <div class="list fix">
                            <div class="name">Brands:</div>
                            <?php
                            $brands = g_gallery(4, ' ORDER BY `position` ASC');
                            
                            if(isset($artikul)){
                                $artikul = explode(",", $artikul);
                            }else{
                                $artikul = array();
                            }
                            foreach($brands as $b):
                            ?>
                            <label for="artikul<?=$b['id']?>">
                                <input type="checkbox" name="artikul[]" value="<?=$b['id']?>" <?php echo ($route[1]=='edit' && in_array($b['id'], $artikul)) ? ' checked="checked"' : '' ?> id="artikul<?=$b['id']?>"/>
                                <span><?=$b['title']?></span>                                
                            </label>
                            <?php
                            endforeach;
                            ?>
                        </div>
                        
                        <div class="list fix">
                            <div class="name">Categories:</div>
                            <?php
                            $categories = g_gallery(7, ' ORDER BY `position` ASC');
                            
                            if(isset($poly)){
                                $poly = explode(",", $poly);
                            }else{
                                $poly = array();
                            }
                            foreach($categories as $ca):
                            ?>
                            <label for="poly<?=$ca['id']?>">
                                <input type="checkbox" name="poly[]" value="<?=$ca['id']?>" <?php echo ($route[1]=='edit' && in_array($ca['id'], $poly)) ? ' checked="checked"' : '' ?> id="poly<?=$ca['id']?>" />
                                <span><?=$ca['title']?></span>
                            </label>
                            <?php
                            endforeach;
                            ?>
                        </div>                        

                        <div class="list fix">
                            <div class="name">Type:</div>
                            <?php
                            $type = g_pages(6, ' ORDER BY `position` ASC');
                            
                            if(isset($price)){
                                $price = explode(",", $price);
                            }else{
                                $price = array();
                            }
                            foreach($type as $ty):
                            ?>
                            <label for="price<?=$ty['id']?>">
                                <input type="checkbox" name="price[]" value="<?=$ty['id']?>" <?php echo ($route[1]=='edit' && in_array($ty['id'], $price)) ? ' checked="checked"' : '' ?> id="price<?=$ty['id']?>" />
                                <span><?=$ty['title']?></span>
                            </label>
                            <?php
                            endforeach;
                            ?>
                        </div>

                        <div class="list fix">
                            <div class="name">Floor:</div>
                            <?php
                            $floors = g_pages(11, ' ORDER BY `position` ASC');
                            
                            if(isset($space)){
                                $space = explode(",", $space);
                            }else{
                                $space = array();
                            }
                            foreach($floors as $floor):
                            ?>
                            <label for="space<?=$floor['id']?>">
                                <input type="checkbox" name="space[]" value="<?=$floor['id']?>" <?php echo ($route[1]=='edit' && in_array($floor['id'], $space)) ? ' checked="checked"' : '' ?> id="space<?=$floor['id']?>" />
                                <span><?=$floor['title']?></span>
                            </label>
                            <?php
                            endforeach;
                            ?>
                        </div>

                        <div class="list fix">
                            <div class="name">Working Hour:</div>
                            <input type="text" name="balcony" value="<?php echo ($route[1]=='edit') ? $balcony : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name">Contact Number:</div>
                            <input type="text" name="apartment" value="<?php echo ($route[1]=='edit') ? $apartment : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name">Website:</div>
                            <input type="text" name="website" value="<?php echo ($route[1]=='edit') ? $website : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name">Discount %:</div>
                            <input type="text" name="discount" value="<?php echo ($route[1]=='edit') ? $discount : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name">Discount Short Description:</div>
                            <input type="text" name="discount_text" value="<?php echo ($route[1]=='edit') ? $discount_text : '' ?>" class="inp"/>
                        </div>
                                                                      
                        
                        <div class="list fix">
                            <div class="icon"><a href="#"><img src="_manager/img/minus.png" width="16" height="16" alt="" /></a></div>
                            <div class="title"><?php echo a("general");?>: <span class="star">*</span></div>
                        </div>

                        <div class="list2 fix">
                            <div class="name" style="line-height:16px;"><?php echo a('content') ?>: <span class="star">*</span></div>
                            <div class="left" style="width:900px;">
                                <textarea name="description" class="editor" style="height:200px; margin-top:2px; margin-bottom:2px;"><?php echo ($route[1]=='edit') ? $description : '' ?></textarea>
                            </div>
                        </div>

                        <div class="list fix">
                            <div class="name"><?php echo a("keywords");?></div>
                            <input type="text" name="meta_keys" value="<?php echo ($route[1]=='edit') ? $meta_keys : '' ?>" class="inp"/>
                        </div>

                        <div class="list2 fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image1" name="image1" value="<?php echo ($route[1]=='edit') ? $image1 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image1"><?php echo a('browse') ?></a>
                        </div>
                        <div class="list fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image2" name="image2" value="<?php echo ($route[1]=='edit') ? $image2 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image2"><?php echo a('browse') ?></a>
                        </div>
                        <div class="list2 fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image3" name="image3" value="<?php echo ($route[1]=='edit') ? $image3 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image3"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image4" name="image4" value="<?php echo ($route[1]=='edit') ? $image4 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image4"><?php echo a('browse') ?></a>
                        </div>
                        <div class="list2 fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image5" name="image5" value="<?php echo ($route[1]=='edit') ? $image5 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image5"><?php echo a('browse') ?></a>
                        </div>       
                        <div class="list fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image6" name="image6" value="<?php echo ($route[1]=='edit') ? $image6 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image6"><?php echo a('browse') ?></a>
                        </div>                                                   
                      
                        <div class="list2 fix">
                            <div class="name">File: <span class="star">*</span></div>
                            <input type="text" id="file" name="file" value="<?php echo ($route[1]=='edit') ? $file : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="file"><?php echo a('browse') ?></a>
                        </div>

                        <input type="hidden" name="sold" value="<?php echo ($route[1]=='edit') ? $sold : '' ?>"/>

                        <!--                      

                        <div class="list fix">
                            <div class="name">Sold: <span class="star" title="Sold">*</span></div>
                            <input type="checkbox" name="sold" class="inp-check"<?php echo (($route[1]=='edit')&&($sold==1)) ? ' checked' : '' ?> value="1" />
                        </div> -->

                        <div class="list fix">
                            <div class="name">homepage: <span class="star" title="Sold">*</span></div>
                            <input type="checkbox" name="homepage" class="inp-check"<?php echo (($route[1]=='edit')&&($homepage==1)) ? ' checked' : '' ?> value="1" />
                        </div>
                        
                        <div class="list2 fix">
                            <div class="name"><?php echo a("visibility");?>: <span class="star" title="<?php echo a('tt.visibility');?>">*</span></div>
                            <input type="checkbox" name="visibility" class="inp-check"<?php echo (($route[1]=='edit')&&($visibility==0)) ? '' : ' checked' ?> />
                        </div>
                    </div>
                </form>
            </div>
            <div id="bottom" class="fix">
                <a href="javascript:save('edit');" class="button br"><?php echo a("save");?></a>
                <a href="javascript:save('close');" class="button br"><?php echo a("save&close");?></a>
                <a href="<?php echo ahref(array($route[0], 'show', $menuid));?>" class="button br"><?php echo a("cancel");?></a>
            </div>
        </div>
    </div>
<script language="javascript" type="text/javascript">
    $(document).on('click', function(e){
        target = $(e.target);
        if (target.hasClass('popup')) {
            id = target.data('browse');
            $.fancybox({
                width    : 985,
                height   : 600,
                type     : 'iframe',
                href     : '<?php echo JAVASCRIPT ?>/tinymce/filemanager/dialog.php?field_id='+id,
                autoSize : false
            });
            e.preventDefault();
        } else if (target.data('tab')) {
            $(target).toggleClass('selbutton');
            $(target).siblings().removeClass('selbutton');
            $('#'+target.data('tab')).show().siblings().hide();
            $('#tab').val(target.data('tab'));
        }
    });

	function save(action) {
        $("#tabstop").val(action);
		var validate = 1;
		var msg = "";
        if($("#pagetitle, #otitle").val()=='') {
            msg = "<?php echo a('error.title');?>";
            validate = 0;
        }
		if(validate == 1) {
            $('#catform').submit();
		} else {
			alert(msg);
		}
	}

    function nextlang(lang) {
        save(lang);
    }
    function chclick(id, tab) {
        var active = ($('#vis_'+id).val()==0) ? 1 : 0;
        $.post("<?php echo ahref(array($route[0], 'visitem'));?>?visibility=" + active + "&id=" + id + "&tab=" + tab, function(data) {
            if(active==1)
                $('#img_'+id).attr("src","_manager/img/buttons/icon_visible.png");
            else
                $('#img_'+id).attr("src","_manager/img/buttons/icon_unvisible.png");
            $('#vis_'+id).val(active);
        });
    }

    function del(id, title, tab) {
        if (confirm("<?php echo a('deletequestion'); ?>" + title + "?")) {
            $.post("<?php echo ahref(array($route[0], 'delitem'));?>?id=" + id + "&tab=" + tab, function(){
                $("#div" + id).innerHTML = "";
                $("#div" + id).hide();
            });
        }
    }
</script>