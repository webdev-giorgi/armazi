<?php defined('DIR') OR exit();
    if (empty($storage->product)) {
        $section = $storage->section;
    } else {
        $section = $storage->product;
    }
    $section['pid'] = @$storage->product['id'];
    $section['id'] = @$storage->section['id'];
    empty($section["meta_keys"]) AND $section["meta_keys"] = s('keywords');
    empty($section["meta_desc"]) AND $section["meta_desc"] = s('description');
?>
<?php
	$url="";
	$urlparts=array();
	foreach($_GET as $k=>$v) {
        if($k!='product')
		  $urlparts[]=$k."=".$v;
	}
	if(count($urlparts)>0)
		$url='?'.implode("&",$urlparts);
    $product=NULL;
    if(isset($_GET["product"])) 
        $product=$_GET["product"];

	$photo = "";
	$desc = "";
	$producttitle = "";
	$prod = 0;
	if(isset($_GET["product"])) {
		$prod = $_GET["product"];
		$cat = db_fetch("select * from catalogs where id = '".$_GET["product"]."' and language = '".l()."'");
		$photo = $cat["photo1"];
		$producttitle = $cat["title"];
		$desc = $cat["description"];
		if($desc=="") $desc = $producttitle;
	}
	if($photo=="") $photo = href().WEBSITE."/assets/img/logo.png";
	$pageid = href($storage->section['id']).(($prod>0) ? "?product=".$_GET["product"]:"");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <base href="<?php echo href(); ?>" />
	
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.svg">
    <title><?php echo strip_tags(s('sitetitle').' - '.$section["title"]); ?></title>
    <meta name="keywords" content="<?php echo s('keywords').', '.$section["meta_keys"] ?>" />
    <meta name="description" content="<?php echo s('description').', '.$section["meta_desc"] ?>" />
    <meta name="robots" content="index, follow" />
    
    <meta property="og:title" content="<?php echo strip_tags($section["title"]).' - '.s('sitetitle');?>" />
    <meta property="og:image" content="<?php echo (!empty($section["image1"])) ? $section["image1"] : href().WEBSITE."/_website/assets/img/logo.png";?>" />
    <meta property="og:description" content="<?php echo $section["meta_desc"] ?>"/>
    <meta property="og:url" content="<?php echo href($storage->section['id'], array(), '', $section["pid"]);?>" />
    <meta property="og:site_name" content="<?php echo s('sitetitle'); ?>" />
    <meta property="og:type" content="Website" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="/_website/magnific-popup/magnific-popup.css">

    <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Magnific Popup core JS file -->
    <script src="/_website/magnific-popup/jquery.magnific-popup.js"></script>

    <link rel="stylesheet" href="_website/css/customslider.css">
    <link rel="stylesheet" href="_website/css/styles.css">

</head>
<body>
  <nav class="navbar">
      <a class="logo" href="<?php echo href('1');?>">
        <img src="_website/images/main.logo.svg" alt="<?php echo s('sitetitle'); ?>">
      </a>

        <ul class="nav-menu">
            <?php echo main_menu();?>
        </ul>
      <div class="nav-right">

        <div class="search">
          <img src="_website/images/icons/search.png" alt="">
        </div>
        <div class="custom-select mainpage-langs">
          <?php if(l()=="ka"){ ?>
          <a href="<?=g_replaceLanguage('en')?>" id="g-change-language">ENG</a>
          <?php }else{ ?>
          <a href="<?=g_replaceLanguage('ka')?>" id="g-change-language">ქარ</a>
          <?php } ?>
          
          <!-- <select id="g-change-language">
            <option value="<?=g_replaceLanguage('en')?>"<?=(l()=="en") ? ' selected="selected"' : ''?>>ENG</option>
            <option value="<?=g_replaceLanguage('ka')?>"<?=(l()=="ka") ? ' selected="selected"' : ''?>>ქარ</option>
          </select> -->
        </div>
      </div>

  </nav>
  <div class="mobile-nav">
    <div class="hamburger" id="hamburger">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <a class="logo" href="<?php echo href('1');?>">
      <img src="_website/images/icons/logo.png" alt="<?php echo s('sitetitle'); ?>">
    </a>
  </div>

    <?php echo html_decode($storage->content); ?>
    
  <footer>
      <a class="footer-logo" href="<?php echo href('1');?>">
      <img src="_website/images/footer.logo.svg" alt="<?php echo s('sitetitle'); ?>">
    </a>
    <main class="footer-content">
      <div class="footer-col">
        <h3><?=l('menu')?></h3>
        <ul>
          <?=footer_menu()?>
        </ul>
      </div>
      <div class="footer-col">
        <h3><?=l('address')?></h3>
     <p>
      <?php echo s('address');?>
     </p>
     <a href="<?=s('see.on.map')?>" class="footer-showonmap" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20">
      <path id="Path_776" data-name="Path 776" d="M96.536,67.863l10-10-10-10Z" transform="translate(-96.536 -47.862)" fill="#fff"
      />
      </svg>
      <span><?=l('see.on.map')?></span>
     </a>
      </div>
      <div class="footer-col">
        <h3><?=l('information')?></h3>
        <ul class="footer-contacts">
          <?php
          $mobile = str_replace(array('+', '+995', ' '), '', s('mobile'));
          ?>
          <li> <a href="tel:%2B995<?php echo $mobile;?>"><?php echo s('mobile');?></a></li>
          <li> <a href="mailto:<?php echo s('email');?>"><?php echo s('email');?></a></li>
        </ul>
        <ul class="footer-social-links">
          <div class="icon-container">
            <a href="<?=s('facebook')?>" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <g id="Group_16" data-name="Group 16" transform="translate(-1631 -995)">
                  <g id="XMLID_834_" transform="translate(1642 1002)">
                    <path id="XMLID_835_"
                      d="M76.958,8.435h1.736v7.147a.255.255,0,0,0,.255.255h2.943a.255.255,0,0,0,.255-.255V8.468h2a.255.255,0,0,0,.254-.226l.3-2.631a.255.255,0,0,0-.254-.285h-2.3V3.677c0-.5.268-.749.8-.749h1.5a.255.255,0,0,0,.255-.255V.257A.255.255,0,0,0,84.448,0H82.376l-.095,0a3.969,3.969,0,0,0-2.6.978A2.722,2.722,0,0,0,78.781,3.4V5.326H76.958a.255.255,0,0,0-.255.255v2.6A.255.255,0,0,0,76.958,8.435Z"
                      transform="translate(-76.703)" fill="#fff" />
                  </g>
                  <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1631 995)" fill="none" stroke="#fff"
                    stroke-width="0.5" opacity="0.5">
                    <circle cx="15" cy="15" r="15" stroke="none" />
                    <circle cx="15" cy="15" r="14.75" fill="none" />
                  </g>
                </g>
              </svg>
            </a>
          </div>
          <div class="icon-container">
            <a href="<?=s('instagram')?>" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <g id="Group_17" data-name="Group 17" transform="translate(-1680 -995)">
                  <path id="Path_702" data-name="Path 702"
                    d="M25.791,18c-2.116,0-2.381.009-3.212.047a5.717,5.717,0,0,0-1.891.362,3.985,3.985,0,0,0-2.279,2.278,5.691,5.691,0,0,0-.362,1.891c-.037.831-.047,1.1-.047,3.213s.009,2.381.047,3.212a5.725,5.725,0,0,0,.362,1.891,3.987,3.987,0,0,0,2.278,2.279,5.722,5.722,0,0,0,1.891.362c.831.038,1.1.047,3.212.047s2.381-.009,3.212-.047a5.725,5.725,0,0,0,1.892-.362,3.992,3.992,0,0,0,2.278-2.279A5.774,5.774,0,0,0,33.534,29c.037-.831.047-1.1.047-3.212s-.01-2.381-.047-3.212a5.772,5.772,0,0,0-.362-1.891,3.986,3.986,0,0,0-2.279-2.278A5.735,5.735,0,0,0,29,18.047c-.831-.038-1.1-.047-3.212-.047Zm-.7,1.4h.7c2.08,0,2.327.007,3.148.045a4.313,4.313,0,0,1,1.446.268A2.581,2.581,0,0,1,31.864,21.2a4.3,4.3,0,0,1,.268,1.446c.037.821.045,1.068.045,3.147s-.008,2.326-.045,3.147a4.309,4.309,0,0,1-.268,1.446,2.583,2.583,0,0,1-1.478,1.478,4.3,4.3,0,0,1-1.446.268c-.821.037-1.068.045-3.148.045s-2.327-.008-3.148-.045A4.322,4.322,0,0,1,21.2,31.86a2.581,2.581,0,0,1-1.479-1.478,4.3,4.3,0,0,1-.268-1.446c-.037-.821-.045-1.068-.045-3.148s.007-2.326.045-3.147a4.313,4.313,0,0,1,.268-1.446A2.582,2.582,0,0,1,21.2,19.714a4.3,4.3,0,0,1,1.447-.269c.719-.032,1-.042,2.449-.044ZM29.95,20.7a.935.935,0,1,0,.935.935.935.935,0,0,0-.935-.935ZM25.791,21.79a4,4,0,1,0,4,4,4,4,0,0,0-4-4Zm0,1.4a2.6,2.6,0,1,1-2.6,2.6A2.6,2.6,0,0,1,25.791,23.194Z"
                    transform="translate(1669 984)" fill="#fff" />
                  <g id="Ellipse_2" data-name="Ellipse 2" transform="translate(1680 995)" fill="none" stroke="#fff"
                    stroke-width="0.5" opacity="0.5">
                    <circle cx="15" cy="15" r="15" stroke="none" />
                    <circle cx="15" cy="15" r="14.75" fill="none" />
                  </g>
                </g>
              </svg>

            </a>
          </div>
          <div class="icon-container">
            <a href="<?=s('tiktok')?>" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <g id="Group_18" data-name="Group 18" transform="translate(-1727 -995)">
                  <path id="tiktok-svgrepo-com"
                    d="M15.709,5.579a3.661,3.661,0,0,1-2.88-3.242V2H10.2V12.443a2.212,2.212,0,0,1-3.973,1.331h0a2.211,2.211,0,0,1,2.431-3.445V7.656a4.834,4.834,0,1,0,4.173,4.787V7.108a6.249,6.249,0,0,0,3.646,1.166V5.659A3.69,3.69,0,0,1,15.709,5.579Z"
                    transform="translate(1731.84 1000)" fill="#fff" />
                  <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(1727 995)" fill="none" stroke="#fff"
                    stroke-width="0.5" opacity="0.5">
                    <circle cx="15" cy="15" r="15" stroke="none" />
                    <circle cx="15" cy="15" r="14.75" fill="none" />
                  </g>
                </g>
              </svg>
            </a>
          </div>
          <div class="icon-container">
            <a href="<?=s('google')?>" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30"
                viewBox="0 0 30 30">
                <defs>
                  <clipPath id="clip-path">
                    <path id="Path_22" data-name="Path 22"
                      d="M16.8,8.27H9.663V11.23h4.11c-.383,1.881-1.985,2.961-4.11,2.961a4.528,4.528,0,1,1,0-9.056,4.43,4.43,0,0,1,2.821,1.01l2.229-2.229a7.658,7.658,0,1,0-5.051,13.41,7.229,7.229,0,0,0,7.315-7.663A6.357,6.357,0,0,0,16.8,8.27Z"
                      transform="translate(-2 -2)" fill="#fff" />
                  </clipPath>
                </defs>
                <g id="Group_19" data-name="Group 19" transform="translate(-1773 -995)">
                  <g id="_1534129544" data-name="1534129544" transform="translate(1781 1002)">
                    <g id="Group_5" data-name="Group 5" transform="translate(0 0)" clip-path="url(#clip-path)">
                      <path id="Path_21" data-name="Path 21" d="M0,20.056V11l5.921,4.528Z"
                        transform="translate(-0.697 -7.865)" fill="#fff" />
                    </g>
                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)" clip-path="url(#clip-path)">
                      <path id="Path_23" data-name="Path 23" d="M0,3.831,5.921,8.359,8.36,6.235l8.36-1.358V0H0Z"
                        transform="translate(-0.697 -0.697)" fill="#fff" />
                    </g>
                    <g id="Group_7" data-name="Group 7" transform="translate(0 0)" clip-path="url(#clip-path)">
                      <path id="Path_25" data-name="Path 25" d="M0,12.888,10.449,4.876l2.752.348L16.719,0V16.719H0Z"
                        transform="translate(-0.697 -0.697)" fill="#fff" />
                    </g>
                    <g id="Group_8" data-name="Group 8" transform="translate(0 0)" clip-path="url(#clip-path)">
                      <path id="Path_27" data-name="Path 27" d="M25.191,23.888l-10.8-8.359L13,14.483,25.191,11Z"
                        transform="translate(-9.169 -7.865)" fill="#fff" />
                    </g>
                  </g>
                  <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(1773 995)" fill="none" stroke="#fff"
                    stroke-width="0.5" opacity="0.5">
                    <circle cx="15" cy="15" r="15" stroke="none" />
                    <circle cx="15" cy="15" r="14.75" fill="none" />
                  </g>
                </g>
              </svg>
            </a>
          </div>

          <div class="icon-container">
            <a href="<?=s('youtube')?>" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <g id="Group_8156" data-name="Group 8156" transform="translate(-1631 -995)">
                  <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1631 995)" fill="none" stroke="#fff"
                    stroke-width="0.5" opacity="0.5">
                    <circle cx="15" cy="15" r="15" stroke="none" />
                    <circle cx="15" cy="15" r="14.75" fill="none" />
                  </g>
                  <path id="Path_703" data-name="Path 703"
                    d="M15.317,11.226,6.367,16.717a.548.548,0,0,1-.578,0,.622.622,0,0,1-.289-.532V5.2a.622.622,0,0,1,.289-.532.548.548,0,0,1,.578,0l8.951,5.491a.634.634,0,0,1,0,1.063Z"
                    transform="translate(1636.447 999.306)" fill="#fff" />
                </g>
              </svg>
            </a>
          </div>

        </ul>
      </div>
    </main>
  </footer>
  <div class="copyright">
    <a href="https://shindi.ge" target="_blank">
      <img src="/_website/images/icons/shindi.png" alt="">
    </a>
    <p>
      <?=s('copyright')?>
    </p>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="_website/js/main.js"></script>
<script src="_website/js/customslider.js"></script>



<script>
  $(document).ready(function() {
  $('.image-link').magnificPopup({
    type:'image',
    gallery: {
      enabled: true
    }
  });
});
</script>

</body>
</html>