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
            else: //記事がなかった場合
            ?>

            <?php if(is_search()): //検索ページの場合 ?>
                <p>検索結果はありませんでした</p>
                <?php else: //以外のページの場合 ?>
                    <p>記事はありません。</p>
                <?php endif; ?>
              <?php endif; ?>

