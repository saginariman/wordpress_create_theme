            <article class="post">

               <div class="entry-header cf">

                  <h1><a href="<?php the_permalink()?>" title=""><?php the_title()?></a></h1>

                  <p class="post-meta">

                     <time class="date" datetime="2014-01-14T11:24">Jan 14, 2014</time>
                     /
                     <span class="categories">
                     <a href="#">Design</a> /
                     <a href="#">User Inferface</a> /
                     <a href="#">Web Design</a>
                     </span>

                  </p>

               </div>

               <div class="post-thumb">
                  <?php the_post_thumbnail()?>
               </div>

               <div class="post-content">
                  <?php the_content()?>
               </div>
               <?php do_action('my_action')?>
            </article> <!-- post end -->