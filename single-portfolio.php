<!-- Убрал шаблонизацио. И место него назвал файл mywork.php как single-portfolio.php c структора которого single-[posttype].php
Теперь не нужно для каждой записи в разделе портфолио выберать щаблон
Template%%%Name: Шаблон моя работа из портфолио
Template&&&Post Type: portfolio
 -->
 <!-- СТРАНИЦА ДЛЯ РАБОТА ИЗ ПОРТФОЛИО ДЕТАЛЬНЕЕ -->
<?php get_header()?>
   <div class="content-outer">
      <div id="page-content" class="row portfolio">
         single-portfolio.php
         <section class="entry cf">
            <div id="secondary"  class="four columns entry-details">
               <h1><?php the_title()?></h1>
               <div class="entry-description">
               	<?php the_content()?>
               </div>
               <ul class="portfolio-meta-list">
					   <li><span>Date: </span><?php the_field('project_date')?></li>
					   <li><span>Client </span><?php the_field('client')?></li>
					   <li><span>Skills: </span>
					   	<?php the_terms(get_the_ID(), 'skills', '', ' / ', '' );?>
					   </li>
			      </ul>
               <a class="button" href="http://behance.net">View project</a>
            </div>
            <div id="primary" class="eight columns">
               <div class="entry-media">
               	<?php the_post_thumbnail()?>
                  <img src="<?php the_field('photos')?>" alt="" />
               </div>
               <div class="entry-excerpt">
                  <?php the_excerpt()?>
					</div>
            </div>
         </section>
         <ul class="post-nav cf">
			   <li class="prev"><a href="#" rel="prev"><strong>Previous Entry</strong> Duis Sed Odio Sit Amet Nibh Vulputate</a></li>
				<li class="next"><a href="#" rel="next"><strong>Next Entry</strong> Morbi Elit Consequat Ipsum</a></li>
			</ul>
      </div>
   </div>
  <?php get_footer()?>