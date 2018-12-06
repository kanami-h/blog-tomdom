<div id="sidebar1" class="sidebar">
              <div class="widget_text widget widget_custom_html">
                <!-- <h4 class="widgettitle">
                  <span class="side-title-inner">プロフィール</span>
                </h4> -->
                <div class="textwidget custom-html-widget">
                  <!-- <div class="side-profile">
                    <div class="prof-pic">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/kanami2.jpg" alt="Kanami" border="0">
                    </div>
                    <div class="prof-name">
                      Kanami
                    </div>
                    <div class="prof-job">
                      フロントエンドエンジニア
                    </div>
                    <div class="prof-info">
                      <p>2020年カナダ移住を目指すシングルマザー。猫と旅行好き。海外就職に強く、子育てしながらでもバリバリできる仕事を探した結果Web開発に出会い、現在フロントエンドエンジニアを目指して勉強中。将来はWebサービスやアプリ開発にも携わりたい。</p>
                      <p>詳しいプロフィールは<a href="http://blog-tomdom.site/profile/">こちら</a></p>
                      <p>お仕事の依頼・質問などは<a href="http://blog-tomdom.site/contact/">こちら</a></p>
                      <div class="sns">
                        <a href="https://twitter.com/kanami_tomdom" class="twitter" target="_blank"><i class="fab fa-twitter fa-2x faa-vertical animated-hover"></i></a>
                        <a href="https://github.com/kanamitomato" class="github" target="_blank"><i class="fab fa-github fa-2x faa-vertical animated-hover"></i></a>
                        <a href="https://www.linkedin.com/in/kanami-hidaka-jp/" class="linkedin" target="_blank"><i class="fab fa-linkedin fa-2x faa-vertical animated-hover"></i></a>
                      </div>
                    </div>
                  </div>side-profile -->
                </div><!--textwidget-->
              </div><!--widget-->
              <h2 class="widgettitle">新着記事</h2>
              <?php
              // サブネイル付き新着記事
              $args = array('posts_per_page' => 5, 'orderby' => 'date');
              $query = new WP_Query($args);
              ?>
              <?php if( $query->have_posts() ) : ?>
              <ul>
              <?php while ($query->have_posts()) : $query->the_post(); ?>
              <li class="new-post">
                <div class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
                <div class="title-newpost"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
              </li>
              <?php endwhile; ?>
              </ul>
<?php else: ?>
              <p>記事がありません</p>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>
              
              <!-- 人気の投稿 -->
              <h2 class="widgettitle">人気の投稿</h2>
              <?php
              //views post metaで記事のPV情報を取得する
              setPostViews(get_the_ID());
              //ループ開始
              query_posts('meta_key=post_views_count&orderby=meta_value_num&posts_per_page=5&order=DESC');
              while(have_posts()):
                the_post();
              ?>
              <li class="new-post">
                <div class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
                <div class="title-newpost"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
              </li>
              <?php endwhile; ?>


              <aside>
                <?php if(is_active_sidebar('widget_id001')): ?>
                <ul id="my_sidebar_widget">
                  <?php dynamic_sidebar('widget_id001'); ?>
                </ul>
<?php endif;?>
              </aside>

              <!-- 検索 -->
              <?php get_search_form(); ?>

            </div><!--sidebar-->