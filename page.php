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
            <article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
                <header class="article-header entry-header">
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
          </div><!--main-inner-->
          </div><!--main-->

          <?php get_sidebar(); ?>
          <div id="page_top">
              <a href="#"><i class="fas fa-caret-up fa-2x icon_color"></i></a>
            </div>
        </div><!--wrap-->
      </div><!--content-->

<?php get_footer(); ?>