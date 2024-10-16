<div class="innerpage-hero about-hero-img" style="background-image: url('<?=(isset($image1) && $image1!='') ? $image1 : '/_website/images/shoppage.jpg'?>');">
        <div class="about-overlay" style="background-color: <?=$cover_color?>"> </div>
        <img src="_website/images/icons/scrolldown.png" alt="<?php echo $title ?>" class="scrolldown">
        <h1><?php echo $title ?></h1>
    </div>

<main class="events-content">
    <h2><?=$menutitle2?></h2>
    <div class="events-wrapper">
      
      <?php foreach($news as $a) : ?>
      <a href="<?php echo href($a["id"]);?>" class="event">
        <div class="event-top">
          <img src="<?php echo ($a["image1"]!="") ? $a["image1"]:"/_website/images/eventimg.png";?>" alt="">
        </div>
        <p><?php echo $a["title"];?></p>
        <div class="event-bottom">
          <span>
            <!-- 10 | 05 | 2024 -->
            <?php echo convert_date($a['postdate']) ?>
          </span>
          <div class="event-time">
            <div class="event-arrow"></div>
            <svg xmlns="http://www.w3.org/2000/svg" width="10.238" height="20.476" viewBox="0 0 10.238 20.476">
              <path id="Path_2242" data-name="Path 2242" d="M96.535,47.862,106.774,58.1,96.535,68.339" transform="translate(-96.536 -47.863)" fill="#e9e9e9"/>
            </svg>
            
          </div>
        </div>
      </a>
      <?php endforeach; ?>
      
    </div>
    
  </main>