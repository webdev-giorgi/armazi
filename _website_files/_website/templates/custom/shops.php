<div class="innerpage-hero shops-hero-img" style="background-image: url('<?=(isset($image1) && $image1!='') ? $image1 : '/_website/images/shoppage.jpg'?>');">
    <div class="shops-overlay">  </div>
    <img src="/_website/images/icons/scrolldown.png" alt="" class="scrolldown">
    <h1><?=$title?></h1>
  </div>

   <section class="shops-search" id="shops-search">
    <h2><?=$menutitle2?></h2>
    <form action="<?=href(2)?>" class="shops-filters" method="get">
      <?php
      $_SESSION['token'] = md5(sha1('batumimall'));
      ?>
      <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
      <div class="shops-search-input">

        <input type="text" name="g-keyword" placeholder="<?=l('enterShop')?>" value="<?=(isset($_GET['g-keyword']) ? htmlentities($_GET['g-keyword']) : '') ?>">
        <button type="submit"><?=l('search')?></button>
      </div>
    <div class="shops-selects-wrapper">
      <select name="g-category" id="g-category">
        <option value="" disabled selected><?=l('category')?></option>
        <?php
        $categories = g_gallery(7, ' ORDER BY `position` ASC');

        foreach($categories as $cat):
        ?>
        <option value="<?=$cat['id']?>"<?=((isset($_GET['g-category']) && $_GET['g-category']==$cat['id']) ? ' selected="selected"' : '') ?>><?=$cat['title']?></option>
        <?php
        endforeach;
        ?>
      </select>

      <select name="g-floor" id="g-floor">
        <option value="" disabled selected><?=menu_title(23)?></option>

        <?php
        $floors = g_pages(11, ' ORDER BY `position` ASC');

        foreach($floors as $floor):
        ?>
        <option value="<?=$floor['id']?>"<?=((isset($_GET['g-floor']) && $_GET['g-floor']==$floor['id']) ? ' selected="selected"' : '') ?>><?=$floor['title']?></option>
        <?php
        endforeach;
        ?>
      </select>
      <select name="g-type" id="g-type">
        <option value="" disabled selected><?=l('type')?></option>
        <?php
        $types = g_pages(6, ' ORDER BY `position` ASC');

        foreach($types as $type):
        ?>
        <option value="<?=$type['id']?>"<?=((isset($_GET['g-type']) && $_GET['g-type']==$type['id']) ? ' selected="selected"' : '') ?>><?=$type['title']?></option>
        <?php
        endforeach;
        ?>
      </select>
    </div>
    
    </form>
    <div class="shops-list">
      <?php
        foreach ($items as $item):
        $link = href($id,array(), l(), $item['id']);
      ?>
      <a href="<?=$link?>" class="single-shop">
        <div class="image" style="background-image: url('<?=$item['image1']?>');"></div>
        <span><?=$item['title']?></span>
      </a>
      <?php
      endforeach;
      ?>
      
    </div>
   </section>

   <script>
    <?php if(isset($_GET['token']) && $_GET['token']!=""): ?>
      setTimeout(function(){
        document.querySelector('.scrolldown').click();
      }, 500);      
    <?php endif; ?>
   </script>