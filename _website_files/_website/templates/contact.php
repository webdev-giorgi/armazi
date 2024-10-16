<?php defined('DIR') OR exit; ?>
<div class="innerpage-hero about-hero-img contacts-hero-img" style="background-image: url('<?php echo $image1 ?>');">
    <div class="about-overlay">  </div>
    <img src="_website/images/icons/scrolldown.png" alt="" class="scrolldown">
    <h1><?php echo $title ?></h1>

  </div>
  <h2 class="contacts-h2"><?php echo l('contact.text');?></h2>
  <div class="contact-map">
    <div class="iframe-overlay">
      <span style="margin-bottom: 15px;"><?php echo strip_tags(s('address'));?></span>
      <a href="<?=s('see.on.map')?>" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" width="10.238" height="20.476" viewBox="0 0 10.238 20.476">
          <path id="Path_2242" data-name="Path 2242" d="M96.535,47.862,106.774,58.1,96.535,68.339" transform="translate(-96.536 -47.863)" fill="#fff"/>
        </svg>
        <?=l('see.on.map')?>
      </a>
    </div>

    <iframe src="<?=s('map.iframe')?>" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="contact-content">
    <div class="contact-row">

      <?php
      $mobile = str_replace(array('+', '+995', ' '), '', s('mobile'));
      ?>
      <a href="tel:%2B995<?=$mobile?>" class="contact-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="10.238" height="20.476" viewBox="0 0 10.238 20.476">
          <path id="Path_2242" data-name="Path 2242" d="M96.535,47.862,106.774,58.1,96.535,68.339" transform="translate(-96.536 -47.863)" fill="#777777"/>
        </svg>
         <span>
         <?php echo s('mobile');?>
         </span>
      </a>

      <a href="mailto:<?php echo s('email');?>" class="contact-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="10.238" height="20.476" viewBox="0 0 10.238 20.476">
          <path id="Path_2242" data-name="Path 2242" d="M96.535,47.862,106.774,58.1,96.535,68.339" transform="translate(-96.536 -47.863)" fill="#777777"/>
        </svg>
         <span>
            <?php echo s('email');?>
         </span>
      </a>

      <ul class="contact-social-links">

          <a href="<?=s('facebook')?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
              <g id="Group_16" data-name="Group 16" transform="translate(-1631 -995)">
                <g id="XMLID_834_" transform="translate(1642 1002)">
                  <path id="XMLID_835_"
                    d="M76.958,8.435h1.736v7.147a.255.255,0,0,0,.255.255h2.943a.255.255,0,0,0,.255-.255V8.468h2a.255.255,0,0,0,.254-.226l.3-2.631a.255.255,0,0,0-.254-.285h-2.3V3.677c0-.5.268-.749.8-.749h1.5a.255.255,0,0,0,.255-.255V.257A.255.255,0,0,0,84.448,0H82.376l-.095,0a3.969,3.969,0,0,0-2.6.978A2.722,2.722,0,0,0,78.781,3.4V5.326H76.958a.255.255,0,0,0-.255.255v2.6A.255.255,0,0,0,76.958,8.435Z"
                    transform="translate(-76.703)" fill="##777777" />
                </g>
                <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1631 995)" fill="#777777" stroke="#777777"
                  stroke-width="0.5" opacity="0.5">
                  <circle cx="15" cy="15" r="15" stroke="#777777" />
                  <circle cx="15" cy="15" r="14.75" fill="#fff" />
                </g>
              </g>
            </svg>
          </a>


          <a href="<?=s('instagram')?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
              <g id="Group_17" data-name="Group 17" transform="translate(-1680 -995)">
                <path id="Path_702" data-name="Path 702"
                  d="M25.791,18c-2.116,0-2.381.009-3.212.047a5.717,5.717,0,0,0-1.891.362,3.985,3.985,0,0,0-2.279,2.278,5.691,5.691,0,0,0-.362,1.891c-.037.831-.047,1.1-.047,3.213s.009,2.381.047,3.212a5.725,5.725,0,0,0,.362,1.891,3.987,3.987,0,0,0,2.278,2.279,5.722,5.722,0,0,0,1.891.362c.831.038,1.1.047,3.212.047s2.381-.009,3.212-.047a5.725,5.725,0,0,0,1.892-.362,3.992,3.992,0,0,0,2.278-2.279A5.774,5.774,0,0,0,33.534,29c.037-.831.047-1.1.047-3.212s-.01-2.381-.047-3.212a5.772,5.772,0,0,0-.362-1.891,3.986,3.986,0,0,0-2.279-2.278A5.735,5.735,0,0,0,29,18.047c-.831-.038-1.1-.047-3.212-.047Zm-.7,1.4h.7c2.08,0,2.327.007,3.148.045a4.313,4.313,0,0,1,1.446.268A2.581,2.581,0,0,1,31.864,21.2a4.3,4.3,0,0,1,.268,1.446c.037.821.045,1.068.045,3.147s-.008,2.326-.045,3.147a4.309,4.309,0,0,1-.268,1.446,2.583,2.583,0,0,1-1.478,1.478,4.3,4.3,0,0,1-1.446.268c-.821.037-1.068.045-3.148.045s-2.327-.008-3.148-.045A4.322,4.322,0,0,1,21.2,31.86a2.581,2.581,0,0,1-1.479-1.478,4.3,4.3,0,0,1-.268-1.446c-.037-.821-.045-1.068-.045-3.148s.007-2.326.045-3.147a4.313,4.313,0,0,1,.268-1.446A2.582,2.582,0,0,1,21.2,19.714a4.3,4.3,0,0,1,1.447-.269c.719-.032,1-.042,2.449-.044ZM29.95,20.7a.935.935,0,1,0,.935.935.935.935,0,0,0-.935-.935ZM25.791,21.79a4,4,0,1,0,4,4,4,4,0,0,0-4-4Zm0,1.4a2.6,2.6,0,1,1-2.6,2.6A2.6,2.6,0,0,1,25.791,23.194Z"
                  transform="translate(1669 984)" fill="##777777" />
                <g id="Ellipse_2" data-name="Ellipse 2" transform="translate(1680 995)" fill="#777777" stroke="#fff"
                  stroke-width="0.5" opacity="0.5">
                  <circle cx="15" cy="15" r="15" stroke="#777777" />
                  <circle cx="15" cy="15" r="14.75" fill="#fff" />
                </g>
              </g>
            </svg>

          </a>


          <a href="<?=s('tiktok')?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
              <g id="Group_18" data-name="Group 18" transform="translate(-1727 -995)">
                <path id="tiktok-svgrepo-com"
                  d="M15.709,5.579a3.661,3.661,0,0,1-2.88-3.242V2H10.2V12.443a2.212,2.212,0,0,1-3.973,1.331h0a2.211,2.211,0,0,1,2.431-3.445V7.656a4.834,4.834,0,1,0,4.173,4.787V7.108a6.249,6.249,0,0,0,3.646,1.166V5.659A3.69,3.69,0,0,1,15.709,5.579Z"
                  transform="translate(1731.84 1000)" fill="##777777" />
                <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(1727 995)" fill="none" stroke="#fff"
                  stroke-width="0.5" opacity="0.5">
                  <circle cx="15" cy="15" r="15" stroke="#777777" />
                  <circle cx="15" cy="15" r="14.75" fill="#fff" />
                </g>
              </g>
            </svg>
          </a>


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
                      transform="translate(-0.697 -7.865)" fill="#777777" />
                  </g>
                  <g id="Group_6" data-name="Group 6" transform="translate(0 0)" clip-path="url(#clip-path)">
                    <path id="Path_23" data-name="Path 23" d="M0,3.831,5.921,8.359,8.36,6.235l8.36-1.358V0H0Z"
                      transform="translate(-0.697 -0.697)" fill="#777777" />
                  </g>
                  <g id="Group_7" data-name="Group 7" transform="translate(0 0)" clip-path="url(#clip-path)">
                    <path id="Path_25" data-name="Path 25" d="M0,12.888,10.449,4.876l2.752.348L16.719,0V16.719H0Z"
                      transform="translate(-0.697 -0.697)" fill="#777777" />
                  </g>
                  <g id="Group_8" data-name="Group 8" transform="translate(0 0)" clip-path="url(#clip-path)">
                    <path id="Path_27" data-name="Path 27" d="M25.191,23.888l-10.8-8.359L13,14.483,25.191,11Z"
                      transform="translate(-9.169 -7.865)" fill="#777777" />
                  </g>
                </g>
                <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(1773 995)" fill="none" stroke="#fff"
                  stroke-width="0.5" opacity="0.5">
                  <circle cx="15" cy="15" r="15" stroke="#777777" />
                  <circle cx="15" cy="15" r="14.75" fill="none" />
                </g>
              </g>
            </svg>
          </a>


          <a href="<?=s('youtube')?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
              <g id="Group_8156" data-name="Group 8156" transform="translate(-1631 -995)">
                <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1631 995)" fill="none" stroke="#777777"
                  stroke-width="0.5" opacity="0.5">
                  <circle cx="15" cy="15" r="15" stroke="#777777" />
                  <circle cx="15" cy="15" r="14.75" fill="none" />
                </g>
                <path id="Path_703" data-name="Path 703"
                  d="M15.317,11.226,6.367,16.717a.548.548,0,0,1-.578,0,.622.622,0,0,1-.289-.532V5.2a.622.622,0,0,1,.289-.532.548.548,0,0,1,.578,0l8.951,5.491a.634.634,0,0,1,0,1.063Z"
                  transform="translate(1636.447 999.306)" fill="#777777" />
              </g>
            </svg>
          </a>


      </ul>
    </div>
    <form action="" class="contact-form">
      <input type="text" placeholder="<?=l('firstname')?>">
      <input type="text" placeholder="<?=l('email')?>">
      <input type="text" placeholder="<?=l('subject')?>">
      <input type="text" placeholder="<?=l('text')?>">
      <button type="submit" class="contact-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="10.238" height="20.476" viewBox="0 0 10.238 20.476">
          <path id="Path_2242" data-name="Path 2242" d="M96.535,47.862,106.774,58.1,96.535,68.339" transform="translate(-96.536 -47.863)" fill="#fff"/>
        </svg>
        <span><?=l('send')?></span>
      </button>
    </form>
  </div>