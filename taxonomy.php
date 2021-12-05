<!-- СТРАНИЦА ТАКСОНОМИЯ ДЛЯ ВЫВОДА ЗАПИСЕЙ С ОДНОЙ МЕТКОЙ ИЛИ ХЭШТЕГОМ В ОБЩЕМ ТАКСОНОМИЯ КОТОРАЯ В АДМИНКЕ НАВЫКИ -->
<?php get_header()?>
   <div id="page-title">
      <div class="row">
         <div class="ten columns centered text-center">
            <h1>taxonomy<span>.php</span></h1>
            <p>ВЫВЕЛИСЬ ВСЕ ЗАПИСИ ТИПА PORTFOLIO С ОДНОЙ ТАКСОНОМИЕЙ(НАВЫКИ в админке) </p>
         </div>
      </div>
   </div>
   <div class="content-outer">
      <div id="page-content" class="row portfolio">
         <section class="entry cf">
            <div id="primary" class="eight columns portfolio-list">
              <div id="portfolio-wrapper" class="bgrid-halves cf">
                <?php 
                if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
                  <div class="columns portfolio-item">
                    <div class="item-wrap">
                      <a href="<?php the_permalink()?>">
                          <?php the_post_thumbnail();?>
                          <div class="overlay"></div>
                          <div class="link-icon"><i class="fa fa-link"></i></div>
                      </a>
                      <div class="portfolio-item-meta">
                          <h5><a href="<?php the_permalink()?>"><?php the_title()?></a></h5>
                          <p><?php the_excerpt();?></p>
                      </div>
                    </div>
                  </div>
                <?php } 
                } else { ?>
                  <p>Записей нет.</p>
                <?php 
                } ?>
              </div>
            </div>
         </section>
      </div>
   </div>
<?php get_footer()?>