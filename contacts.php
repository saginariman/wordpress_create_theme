<!-- СТРАНИЦА ОБРАТНАЯ СВЯЗЬ -->
<?php
/*
Template Name: Контакты
*/
?>
<?php get_header()?>
   <div id="page-title">
      <div class="row">
         <div class="ten columns centered text-center">
            <h1>contacts<span>.php</span></h1>
            <p>плагин contact form 7</p>
         </div>
      </div>
   </div>
   <div class="content-outer">
      <div id="page-content" class="row page">
         <div id="primary" class="eight columns">
            <section>
              <div id="contact-form">
                  <?php echo do_shortcode('[contact-form-7 id="81" title="Контактная форма 1"]')?>
               </div>
            </section>
         </div>
      </div>
   </div>
   <?php get_footer()?>