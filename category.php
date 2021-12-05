<!-- <?php //get_header('page');?> -->
<!-- СТРАНИЦА ВСЕХ НОВОСТЕЙ -->
<?php get_header();?>
   <div id="page-title">
      <div class="row">
         <div class="ten columns centered text-center">
            <h1>category<span>.php</span></h1>
            <p>Все посты post </p>
         </div>
      </div>
   </div>
   <div class="content-outer">
      <div id="page-content" class="row">
         <div id="primary" class="eight columns">
            <?php 
            if(have_posts()) {
               while (have_posts()) {
                  the_post();
            ?>
               <article class="post">
                  <div class="entry-header cf">
                     <h1><a href="<?php the_permalink()?>" title=""><?php the_title();?></a></h1>
                     <p class="post-meta">
                        <time class="date" datetime="2014-01-14T11:24"><?php the_time('F jS, Y')?></time>
                        /
                        <span class="categories">
                           <?php the_category($separator='/', '')?>
                           <?php the_tags(null, '/')?>
                        </span>
                     </p>
                  </div>
                  <div class="post-thumb">
                     <a href="<?php the_permalink()?>" title="">
                        <?php the_post_thumbnail('post_thumb')?>
                     </a>
                  </div>
                  <div class="post-content">
                     <?php the_excerpt()//the_content()?>
                  </div>
               </article>
            <?php }//конец while ?>
            <?php the_posts_pagination(); ?>
            <?php }//конец if ?>
         </div>
         <div id="secondary" class="four columns end">
            <?php get_sidebar();?>
         </div>
      </div>
   </div>
<?php get_footer();?>