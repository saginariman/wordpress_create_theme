<?php
/*Template Name: Шаблон страница ПОРТФОЛИО*/
?>
<?php get_header()?>
   <div id="page-title">
      <div class="row">
         <div class="ten columns centered text-center">
            <h1>portfolio<span>.php</span></h1>
            <p>ВСЕ МОИ РАБОТЫ. ВЫВОД ВСЕХ ЗАПИСЕЙ ТИПА PORTFOLIO</p>
         </div>
      </div>
   </div>
   <div class="content-outer">
      <div id="page-content" class="row portfolio">
         <section class="entry cf">
            <div id="secondary"  class="four columns entry-details">
               <h1>МОЕ ПОРТФОЛИО</h1>
               <p class="lead">СПРАВА ЗАПИСИ С ТИПОМ PORTFOLIO</p>
            </div>
            <div id="primary" class="eight columns portfolio-list">
              <div id="portfolio-wrapper" class="bgrid-halves cf">
                <?php // параметры по умолчанию
                $my_posts = get_posts( array(
                  'numberposts' => 5,
                  'post_type'   => 'portfolio',
                  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                foreach( $my_posts as $post ){
                  setup_postdata( $post );
                    // формат вывода the_title() ...
                    ?>
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
                    <?php
                }
                wp_reset_postdata(); // сброс
                ?>
              </div>
            </div>
         </section>
      </div>
   </div>
   <?php get_footer()?>