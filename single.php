<!-- <?php //get_header('page');?> -->
<!-- Страница поста детальнее -->
<?php get_header();?>
<?php if( have_posts() ) : while( have_posts() ) : the_post();?>
<?php echo get_post_format() //выводит на экран формат статьи (video, aside, т.д.)?>
   <div class="content-outer">
      <b>single.php</b>
      <div id="page-content" class="row">
         <div id="primary" class="eight columns">
            <?php get_template_part('post-templates/post', get_post_format()); //выводит тот файл post который совпадет(post.php, post-aside.php, post-video.php)?>
         </div>
         <div id="secondary" class="four columns end">
            <?php get_sidebar();?>
         </div>
      </div>
   </div>
   <?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>