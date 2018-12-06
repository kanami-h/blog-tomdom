<?php get_header(); ?>

    <div class="content">
    <?php breadcrumb(); ?>
    <h3 class=search_result>「<?php the_search_query(); ?>」の検索結果</h3>
      <div class="wrap">
        <div id="main" class="main flex">
         <div class="main-inner">
            <?php get_template_part('loop', 'main'); ?>
          </div><!--main-inner--> 
        </div><!--main-->
          
          <?php get_sidebar(); ?>
            <div id="page_top">
              <a href="#"><i class="fas fa-caret-up fa-2x icon_color"></i></a>
            </div>
        </div><!--wrap-->
      </div><!--content-->

<?php get_footer(); ?>
