<?php get_header(); ?>
    <div class="content">
      <div class="top">
      <div class="top-text">
          <h1>Technology × Solution</h1>
          <p>Webテクノロジーであなたのビジネスの課題解決をお手伝い。</p>
        </div>
        <div class="top-img">
          <img src="<?php echo get_template_directory_uri(); ?>/images/kanami-top.jpg" alt="">
        </div>
        <div class="top-img-sp">
        <img src="<?php echo get_template_directory_uri(); ?>/images/kanami-top-sp.jpg" alt="">
        </div>
      </div><!--/top-->
    
      <div class="greeting">
        <div class="greeting-title">
          <h1>Hello! I'm Kanami</h1>
        </div>
        <div class="greeting-inner">
          <div class="greeting-img">
            <img src="<?php echo get_template_directory_uri(); ?>/images/prof-gif.gif" alt="">
          </div>
          <div class="greeting-text">
            <p>こんにちは！</p>
            <p>フリーでWebサイトの制作をしているKanamiです。</p>
            <p>ブログでは仕事のことやカナダ移住などについて発信しています。</p>
            <p>趣味：ねこ、テクノロジー、英語、旅行</p>
            <p>スキル：HTML / CSS / JavaScript</p>
            <p>詳しいプロフィールは<a href="http://blog-tomdom.site/profile/">こちら</a></p>
            <div class="greeting-sns">
              <a href="https://twitter.com/kanami_tomdom" class="twitter" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
              <a href="https://www.instagram.com/kanami_tomdom/" class="instagram" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
            </div>
          </div>
        </div><!--/greeting-inner-->
      </div><!--greeting-->


      <div class="mywork">
        <div class="title">
          <h1>MY WORK</h1>
        </div>
        <div class="info">
          <div class="portfolio">
            <a href="https://kanami.tech" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/portfolio.png" alt=""></a>
          </div>
          <div class="concept">
            <a href="https://blog-tomdom.site/concept"><img src="<?php echo get_template_directory_uri(); ?>/images/concept.png" alt=""></a>            
          </div>
        </div>
      </div>


      <div class="wrap">
        <div id="main" class="main flex">
          <div class="title">
            <h1>BLOG</h1>
          </div>
         <div class="main-inner">
         <?php get_template_part('loop', 'main'); ?>
          </div><!--main-inner-->
          
          <?php if(function_exists('wp_pagenavi')){wp_pagenavi(); }?>

          </div><!--main-->
          

            <div id="page_top">
              <a href="#"><i class="fas fa-caret-up fa-2x icon_color"></i></a>
            </div>
        </div><!--wrap-->
      </div><!--content-->
<?php get_footer(); ?>
