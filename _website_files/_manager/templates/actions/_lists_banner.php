<?php
$class = 'list';
function _build_lists($parent, $order_by, $start = -1, $per_page)
{
	global $class;
	$limit = ($start == -1) ? "" : "LIMIT ".$start.", ".$per_page;
    $action = Storage::instance()->action;
    $sql = "SELECT * FROM ".c("table.pages")." WHERE language = '" . l() . "' AND `deleted` = 0 AND masterid = {$parent} AND menuid = {$_GET['menu']} AND `title` LIKE '%" . get('srch', '') . "%' ORDER BY {$order_by} ".$limit.";";
    $results = db_fetch_all($sql);
    if (empty($results))
        return NULL;
    $undeletable = c('section.undeletable');
    $total = count($results);
    $count = 1;
    foreach ($results AS $result):
        $is_first = ($count == 1);
        $is_last = ($count >= $total);
        $arrow_up = $is_first ? '<img src="_manager/img/none.png" width="10" height="7" style="float:left;" />' : '<a href="' . ahref($action, 'move', array('where' => 'up', 'idx' => $result['idx'], 'menu' => $result['menuid'])) . '"><img src="_manager/img/buttons/icon_arrow_up_' . ($result['level'] == 1 ? 1 : 2) . '.png" class="star" title="' .  a('tt.moveup') . '" width="10" height="7" /></a>';
        $arrow_down = $is_last ? '<img src="_manager/img/none.png" width="10" height="7" style="float:left;" />' : '<a href="' . ahref($action, 'move', array('where' => 'down', 'idx' => $result['idx'], 'menu' => $result['menuid'])) . '"><img src="_manager/img/buttons/icon_arrow_down_' . ($result['level'] == 1 ? 1 : 2) . '.png" class="star" title="' .  a('tt.movedn') . '" width="10" height="7" /></a>';
		$arrows = ($order_by == 'position') ? $arrow_up . $arrow_down : '<img src="_manager/img/table.png" width="16" height="16" alt="" />';
        $edit_link = ahref($action, 'edit', array('menu' => $result['menuid'], 'idx' => $result['idx']));
        $count++;
        $pad = NULL;
		if($class == 'list2') $class = 'list'; else $class = 'list2';
		$ch = ($result["visibility"]=='true') ? '' : 'un';
?>
					<div class="<?php echo $class;?> fix" id="div<?php echo $result["id"];?>" >
						<div class="check" style="float:left;">
							<a href="javascript:chclick(<?php echo $result['idx'];?>);"><img src="_manager/img/buttons/icon_<?php echo $ch;?>visible.png" class="star" title="<?php echo a('tt.visibility');?>" id="img_<?php echo $result['idx'];?>" style="width:9px;height:9px;" /></a>
                            <input type="hidden" name="vis_<?php echo $result['idx'];?>" id="vis_<?php echo $result['idx'];?>" value="<?php echo $result['visibility'];?>" />
                        </div>									
						<div class="icon" style="float:left;"><?php echo $arrows;?></div>									
						<div class="name" style="float:left;width:560px;"><a href="<?php echo ahref($action, 'edit', array('menu'=>$result['menuid'], 'id'=>$result["id"], 'idx'=>$result["idx"]));?>" style="width:100%; background:none;"><span class="star" title="<?php echo a('ql.edit');?>"><?php echo $pad . $result["title"];?>&nbsp;</a></span></div>									
						<div class="date"><?php echo $result["postdate"];?>&nbsp;</div>									
						<div class="id"><?php echo $result["id"];?>&nbsp;</div>									
                        <div class="action fix" style="width:120px;">
                            <a href="<?php echo ahref($action, 'edit', array('menu'=>$result['menuid'], 'id'=>$result["id"], 'idx'=>$result["idx"]));?>"><img src="_manager/img/buttons/icon_edit.png" class="star" title="<?php echo a('ql.edit');?>" /></a>
                            <a href="javascript:del(<?php echo $result['id'];?>, '<?php echo $result['title'];?>');"><img src="_manager/img/buttons/icon_delete.png" class="star" title="<?php echo a('ql.delete');?>" /></a>
                        </div>									
					</div>		
<?php
		_build_lists($result['idx'], $order_by, -1, $per_page);
	endforeach;
}
?>
		<div id="title" class="fix">
			<div class="icon"><img src="_manager/img/table.png" width="16" height="16" alt="" /></div>			
			<div class="name"><?php echo $title;?></div>
		</div>	

		<div id="box">
			<div id="part">
				<div id="top" class="fix">
					<input type="text" class="inp" id="srch" name="srch" style="margin-top:0px;" value="<?php echo get('srch', ''); ?>" />
					<a href="javascript:srch();" class="button br"><?php echo a('search');?></a>
					<a href="<?php echo ahref($action, '', array('menu'=>$params['menu']));?>" class="button br"><?php echo a('reset');?></a>
					<a href="<?php echo ahref($action, 'add', array('menu'=>$params['menu'], 'level'=>0));?>" class="button br" style="float: right"><?php echo a('add');?></a>
				</div>	
				<div id="info">
                    <div class="list-top">
						<div class="check"><?php echo a("vis");?>.</div>									
						<div class="name-title" style="width:590px;"><?php echo a("name");?></div>									
						<div class="date"><?php echo a("date");?></div>									
						<div class="id">ID</div>									
						<div class="action fix"><?php echo a("actions");?></div>						
					</div>
<?php 
	$st = ($pager == 'true') ? $start : -1;
	$per_page = a_s('banner.per.page');

	_build_lists(0, $order_by, $st, $per_page);
?>
				</div>	
				<div id="bottom" class="fix">
<?php
	if($pager == 'true') {
		$curpage = ceil(($start + 1) / $per_page);
		$firstpage = 1;
		$lastpage = ceil(($count) / $per_page);
		$prevpage = ($curpage == 1) ? 1 : $curpage - 1;
		$nextpage = ($curpage == $lastpage) ? $lastpage : $curpage + 1;
		$first = 0;
		$last = $per_page * ($lastpage - 1);
		$prev = $per_page * ($prevpage - 1);
		$next = $per_page * ($nextpage - 1);
?>
					<ul id="page" class="fix left">
						<li><a href="<?php echo ahref($action, $subaction, $params) . '&start=' . $first;?>"><img src="_manager/img/prev2.png" width="5" height="5" alt=""  class="arrow" /></a></li>
						<li><a href="<?php echo ahref($action, $subaction, $params) . '&start=' . $prev;?>"><img src="_manager/img/prev.png" width="5" height="5" alt=""  class="arrow" /></a></li>
<?php
		for($i = $firstpage; $i<=$lastpage; $i++) {
			$nst = $per_page * ($i - 1);
?>
						<li><?php echo ($i == $curpage) ? '<span style="color:#2e84d7; font-weight:bold;">' : '<a href="' . ahref($action, $subaction, $params) . '&start=' . $nst . '">';?><?php echo $i;?><?php echo ($i == $curpage) ? '</span>' : '</a>';?></li>
<?php
		}
?>
						<li><a href="<?php echo ahref($action, $subaction, $params) . '&start=' . $next;?>"><img src="_manager/img/next.png" width="5" height="5" alt="" class="arrow" /></a></li>
						<li><a href="<?php echo ahref($action, $subaction, $params) . '&start=' . $last;?>"><img src="_manager/img/next2.png" width="5" height="5" alt="" class="arrow" /></a></li>
					</ul>
<?php } ?>
					<a href="<?php echo ahref($action, 'add', array('menu'=>$params['menu'], 'level'=>0));?>" class="button br" style="float: right"><?php echo a('add');?></a>
				</div>					
			</div>		
		</div>
<script language="javascript">
$(document).ready(function(){ 
	$(function() {
		$("#sortable").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize") + '&action=updateRecordsListings'; 
			$.post("updateDB.php", order, function(theResponse){
				$("#contentRight").html(theResponse);
			}); 															 
		}});
	});
});	

function chclick(idx) {
	var active = ($('#vis_'+idx).val()=='false') ? 'true':'false'; 
	$.post("<?php echo ahref($action, 'visibility');?>&idx=" + idx + "&visibility=" + active + "&menu=" + <?php echo $params["menu"];?>, function() {
		if(active=='true') 
	        $('#img_'+idx).attr("src","_manager/img/buttons/icon_visible.png"); 
		else
	        $('#img_'+idx).attr("src","_manager/img/buttons/icon_unvisible.png"); 
		$('#vis_'+idx).val(active);
	});
};	


function del(id, title) {
	if (confirm("<?php echo a("deletequestion"); ?>" + title + "?")) { 
//		window.location="<?php echo ahref($action,'delete');?>&id=" + id + "&menu=<?php echo $_GET["menu"];?>";
		$.post("<?php echo ahref($action, 'delete');?>&id=" + id + "&menu=<?php echo $_GET["menu"];?>", function(){
			$("#div" + id).innerHTML = "";
			$("#div" + id).hide();
			setFooter();
		});
	}
}

function srch() {
	window.location="<?php echo ahref($action, '', array('menu'=>$params['menu']));?>&srch=" + $("#srch").val();
}

$(".list").mouseover(function(){
    	$(this).css('background', '#ededed');
    }).mouseout(function(){
    	$(this).css('background', '#f8f8f8');
    });
$(".list2").mouseover(function(){
    	$(this).css('background', '#ededed');
    }).mouseout(function(){
    	$(this).css('background', '#ffffff');
    });
</script>
