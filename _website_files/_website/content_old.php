<?php defined('DIR') OR exit();
    if (empty($storage->product)) {
        $section = $storage->section;
    } else {
        $section = $storage->product;
    }
    $section['pid'] = $storage->product['id'];
    $section['id'] = $storage->section['id'];
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
	if($photo=="") $photo = href().WEBSITE."/images/logo.png";
	$pageid = href($storage->section['id']).(($prod>0) ? "?product=".$_GET["product"]:"");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <base href="<?php echo href(); ?>" />
    <title><?php echo strip_tags(s('sitetitle').' - '.$section["title"]); ?></title>
    <meta name="keywords" content="<?php echo s('keywords').', '.$section["meta_keys"] ?>" />
    <meta name="description" content="<?php echo s('description').', '.$section["meta_desc"] ?>" />
    <meta name="robots" content="index, follow" />
    
    <meta property="og:title" content="<?php echo strip_tags($section["title"]).' - '.s('sitetitle');?>" />
    <meta property="og:image" content="<?php echo (!empty($section["image1"])) ? $section["image1"] : href().WEBSITE."/_website/img/logo.png";?>" />
    <meta property="og:description" content="<?php echo $section["meta_desc"] ?>"/>
    <meta property="og:url" content="<?php echo href($storage->section['id'], array(), '', $section["pid"]);?>" />
    <meta property="og:site_name" content="<?php echo s('sitetitle'); ?>" />
    <meta property="og:type" content="Website" />
    
<link href="_website/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="_website/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="_website/css/color.css" />
<link rel="stylesheet" href="_website/css/style.css" />
<link rel="stylesheet" href="_website/css/fancybox.min.css" />
<link rel="stylesheet" href="_website/css/NewStyle.css"/>
<script src="_website/js/modernizr.custom.js"></script>
<link rel="shortcut icon" href="_website/img/icons/favicon.ico">
<link rel="apple-touch-icon" href="_website/img/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="72x72" href="_website/img/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="_website/img/icons/apple-icon-114x114.png">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-65421160-21"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-65421160-21');
</script>

</head>
<body onLoad="initialize()" id="ScrollToTop">

    <header id="top" class="BGlight ResponsiveHeader">
        <div class="container">
            <div class="row row30">
				<div class="col-sm-1 padding_0">
					<a href="<?php echo href('1');?>" class="LogoDiv"></a>
				</div>
                <div class="col-sm-8">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="menu">
                                <ul class="nav navbar-nav">
                                    <?php echo main_menu(); ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
				<div class="col-sm-3 text-right ForResponsiveDiv" style="padding-right:15px; "> 
					<div class="SocialIcons">
						<a href="<?php echo s('facebook');?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
						<a href="<?php echo s('instagram');?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</div>
                    
					<a href="<?php echo href($storage->section['id'], array(), 'ge', $product).$url;?>" class="LanguageDiv">
						<img src="_website/img/geo_1.png" alt="Georgian"/>
						<span>ge</span>
					</a>
                    
					<a href="<?php echo href($storage->section['id'], array(), 'en', $product).$url;?>" class="LanguageDiv">
						<img src="_website/img/eng_1.png" alt="English"/>
						<span>en</span>
					</a>
                    
					<a href="<?php echo href($storage->section['id'], array(), 'ru', $product).$url;?>" class="LanguageDiv">
						<img src="_website/img/rus_1.png" alt="Russian"/>
						<span>ru</span>
					</a>                    
                                        
				</div>
            </div>
        </div>
    </header>
	
	<?php echo html_decode($storage->content); ?>
	
   <div class="FooterDiv">
		<div class="container">
			<div class="col-sm-3">
				<div class="CopyRight"><?php echo s('sitetitle'); ?> </div> <br/>
				<div class="CopyRight">
					<div class="PoweredBy">
						powered by <a href="http://shindi.ge/" target="_blank">shindi</a>
					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="col-sm-4">
					<div class="FooterList">
						<div class="Title"><?php echo l('location'); ?></div>
						<li><?php echo s('address'); ?></li>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="FooterList">
						<div class="Title"><?php echo l('call.us'); ?></div> 
						<li><?php echo s('telephone'); ?></li>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="FooterList">
						<div class="Title"><?php echo l('email.us'); ?></div>
						<li><?php echo s('mail'); ?></li> 
					</div>
				</div>
			</div>
		</div>
		<a href="#ScrollToTop" class="top">
        <i class="fa fa-angle-up fa-lg"></i>
    </a>
   </div>

    <script type="text/javascript" src="_website/js/jquery.min.js"></script>
    <script  
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmSpIaxT77UGVUsx0jtkFX5LDYah6NbtI&callback=initMap">
    </script>
    <script type="text/javascript" src="_website/js/directions.js"></script>
    <script type="text/javascript" src="_website/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="_website/js/placeholders.js"></script>
    <script type="text/javascript" src="_website/js/jquery.superslides.min.js"></script>
    <script type="text/javascript" src="_website/js/jquery.countdown.js"></script>
    <script type="text/javascript" src="_website/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="_website/js/fancybox.min.js"></script>
    <script type="text/javascript" src="_website/js/custom.js"></script>
    <script type="text/javascript" src="_website/js/master.js"></script>
	<script>
	$(document).ready(function(){
		$(".fancybox").fancybox({
			 
		});
		
		
		
	}); 
	</script>
</body>
</html>