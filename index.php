<?php get_header(); ?>
    <div class="content">
      <div class="wrap">
      
        <div id="main" class="main flex">
         <div class="main-inner">
         <?php 
            if(have_posts()):
              while(have_posts()):the_post();
            ?>
             <article id="post-<?php the_ID(); ?>" <?php post_class('news'); ?> height="350px">     
             <div class="link-card shadow">
              <div class="post-thumbnail">
                <?php the_category(); ?>
                <a href="<?php the_permalink(); ?>">
                <?php if(has_post_thumbnail()): ?>
                <?php the_post_thumbnail('tumbnail');?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/noimage_180x180.png" height="180" width="180" alt="">
            <?php endif; ?>
                  </div>
                  <div class="card-bottom">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <ul class="post-meta">
                     <li>
                        <i class="fas fa-clock"></i>
                        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y/m/d'); ?></time>
                      </li>
                    </ul>
                  </div>
                  </a>
              </div><!--link-card--> 
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
