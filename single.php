<?php get_header(); ?>
    <div class="content">
        <?php breadcrumb(); ?>
      <div class="wrap">
          
        <div id="main" class="main flex">
         <div class="main-inner">
           <?php
           if(have_posts()):
            while(have_posts()): the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                <header class="article-header entry-header">
                  <div class="header-upper">
                    <span class="category-name"><?php the_category(); ?></span>
                    <time class="entry-date" datatime="<?php the_time('Y-m-d'); ?>"><i class="far fa-clock clock"></i><?php the_time('Y年m月d日'); ?></time>
                  </div>
                  <div>
                    <h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
                  </div>
                </header>
                <div class="post-contents">
                  <div class="eyecatch">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('tumbnail');?>
            <?php endif; ?>
                </div><!--eyecatch-->
                  <div class="post-content">
                    <?php the_content(); ?>
                  </div>
                </div><!--post-content-->
              </article>
              <?php
              endwhile;
            endif;
            ?>

             <div class="postNav">
              <?php
              $prevpost = get_adjacent_post(false, '', true);
              $nextpost = get_adjacent_post(false, '', false);
              if($prevpost or $nextpost) {
                ?>
               
                  <?php
                  if($prevpost) {
                    echo '<div class="post-link"><a href="' . get_permalink($prevpost->ID) . '">' .get_the_post_thumbnail($prevpost->ID, 'thumbnail'). get_the_title($prevpost->ID) . '</a></div>';
                  } else {
                    echo'<div><a href="' . home_url('/') . '">TOPへ戻る</a></div>';
                  }
                  if($nextpost){
                    echo '<div class="post-link"><a href="' . get_permalink($nextpost->ID) . '">' .get_the_post_thumbnail($nextpost->ID, 'thumbnail'). get_the_title($nextpost->ID) . '</a></div>';
                  } else {
                    echo '<div><a href="' . home_url('/') . '">TOPへ戻る</a></div>';
                  }
                  ?>
                <?php }  ?>
                </div>             
            <!-- 記事へのコメント -->
            <?php comments_template(); ?>

              <!-- <div class="related-posts"><!--https://manablog.org/wordpress-related-post/
                <h4 class="related-title">おすすめ関連記事</h4>
                  <div class="col-xs-12">
                    <div class="col-xs-6 inner">
                      <div itemscope itemtype='http://schema.org/ImageObjuct' class="thumbnail">
                      <a href=""></a>
                      </div>
                      <h5><a href=""></a></h5>
                      <p></p>
                    </div>
                </div>
              </div> 関連記事-->
             
          </div><!--main-inner-->
          </div><!--main-->

          <?php get_sidebar(); ?>
          <div id="page_top">
              <a href="#"><i class="fas fa-caret-up fa-2x icon_color"></i></a>
            </div>
        </div><!--wrap-->
      </div><!--content-->

<?php get_footer(); ?>