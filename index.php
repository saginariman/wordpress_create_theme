<!-- ГЛАВНАЯ -->
<?php get_header();?>
   <section id="intro">
	   <div id="intro-slider" class="flexslider">
		   <ul class="slides">
			   <li>
				   <div class="row">
					   <div class="twelve columns">
						   <div class="slider-text">
							   <h1>index<span>.php</span></h1>
							   <p>Вывод последних записей post 4 Штуки</p>
						   </div>
                 <div class="slider-image">
                    <img src="images/sliders/home-slider-image-01.png" alt="" />
                 </div>
					   </div>
				   </div>
			   </li>
		   </ul>
	   </div>
   </section>
   <section id="journal">
      <div class="row">
         <div class="twelve columns align-center">
            <h1>Последнии четыре статьи post</h1>
         </div>
      </div>
      <div class="blog-entries">
        <?php 
        // параметры по умолчанию
        $my_posts = get_posts( array(
          'numberposts' => 3,
          'post_type'   => 'post',
          'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );

        foreach( $my_posts as $post ){
          setup_postdata( $post );
            // формат вывода the_title() ...
        ?>
         <article class="row entry">
            <div class="entry-header">
               <div class="permalink">
                  <a href="<?php the_permalink()?>"><i class="fa fa-link"></i></a>
               </div>
               <div class="ten columns entry-title pull-right">
                  <h3><a href="<?php the_permalink()?>"><?php the_title();?></a></h3>
               </div>
               <div class="two columns post-meta end">
                  <p>
                  <time datetime="2014-01-31" class="post-date" pubdate=""><?php the_time('F jS, Y')?></time>
                  <span class="dauthor">By <?php the_author()?></span>
                  </p>
               </div>
            </div>
            <div class="ten columns offset-2 post-content">
               <?php the_excerpt()?>
            </div>
         </article>
        <?php
        }
        wp_reset_postdata(); // сброс
        ?>
      </div>
   </section>
<?php get_footer();?>



