<!-- ГЛАВНЫЙ УПРАВЛЯЮЩИЙ ФАЙЛ -->
<?php
add_action('wp_enqueue_scripts', 'style_theme');//хук для подключений стилий
add_action('wp_footer', 'scripts_theme');//хук для подключений скриптов
add_action('after_setup_theme', 'theme_register_nav_menu' );//хук для регистрации меню которая будет добавлена в админку и на сайт
add_action('widgets_init', 'register_my_widgets' );//хук для регистрации sidebar которая будет добавлена в админку и на сайт
add_filter('the_content', 'test_content');//хук при выводе полного текста поста
add_action( 'init', 'register_post_types' );//регистрация новой тип записи Портфолио в админ панели (после типов записей Страницы, Записи, Настройки)

function test_content($content){
	$content.= 'ЭТО ХУК ФИЛТР the_content. Спасибо за чтение.';
	return $content;
}

function style_theme(){
	// echo "Подключаем стили";
	wp_enqueue_style('style', get_stylesheet_uri() );//подключаем основные стили с файла style.css
	wp_enqueue_style('babushka', get_template_directory_uri() . '/assets/css/default.css'); //подключаем все стили произвольные из папки assets
	wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
	wp_enqueue_style('media-queries', get_template_directory_uri() . '/assets/css/media-queries.css');

}
function scripts_theme(){
	// echo "Подключаем scripts";
	wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js'); //подключение init.js 
}
function theme_register_nav_menu() {
	register_nav_menu( 'top', 'Меню в Шапке' );
	register_nav_menu( 'footer', 'Меню в подвале' );
	add_theme_support( 'title-tag' );//добавление авто титулок на вкладке страницы
	add_theme_support( 'post-thumbnails', array( 'post', 'portfolio' ) ); //превьющка для поста картинка
	add_image_size('post_thumb', 1300, 500, true); //создание своей миниатюры(размер картинки)
	add_filter( 'excerpt_more', 'new_excerpt_more' );//хук для изменение в "краткое описание поста [...]" на "краткое описание поста Читать Далее..."
	function new_excerpt_more( $more ){
		global $post;
		return '<a href="'. get_permalink($post->ID) . '"> Читать дальше...</a>';
	}
	add_theme_support( 'post-formats', array( 'aside', 'video' ) );//добавление в админку селектора формат записей(стандартный, видео, заметка) при написании статьи
}
function register_my_widgets(){

	register_sidebar( array(
		'name'          => 'Left Sidebar',
		'id'            => "left_sidebar",
		'description'   => 'Описание нашего сайдбара',
		'before_widget' => '<div class="widget %2$s link-list cf">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n"
	) );
	register_sidebar( array(
		'name'          => 'Top Sidebar',
		'id'            => "top_sidebar",
		'description'   => 'Верхний сайдбара',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n"
	) );
}

// Создание своего хука Действия
add_action('my_action', 'action_function');
function action_function(){
	echo 'ЭТО МОЙ СОБСТВЕННЫЙ ХУК ДЕЙСТВИЯ!!! Я тут 59';
}

// Создание своего Шорткода, которого можно вставлять везде. Например: в середине поста в базе.
add_shortcode('my_short', 'short_function');
function short_function(){
	return 'ЭТО МОЙ  ШОРТКОД!!! Я тут 64';
}

// Шорткоде из https://wp-kama.ru/function/add_shortcode
add_shortcode( 'iframe', 'Generate_iframe' );

function Generate_iframe( $atts ) {
	$atts = shortcode_atts( array(
		'href'   => 'http://example.com',
		'height' => '550px',
		'width'  => '600px',     
	), $atts );

	return '<iframe src="'. $atts['href'] .'" width="'. $atts['width'] .'" height="'. $atts['height'] .'"> <p>Your Browser does not support Iframes.</p></iframe>';
}

// использование: 
// [iframe href="http://www.exmaple.com" height="480" width="640"]

function register_post_types(){
	register_post_type( 'portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Портфолио', // основное название для типа записи
			'singular_name'      => 'Портфолио', // название для одной записи этого типа
			'add_new'            => 'Добавить работу', // для добавления новой записи
			'add_new_item'       => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование работы', // для редактирования типа записи
			'new_item'           => 'Новая работа', // текст новой записи
			'view_item'          => 'Смотреть работу', // для просмотра записи этого типа.
			'search_items'       => 'Искать работу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Портфолиоs', // название меню
		],
		'description'         => 'Это наши работы в портфолио',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-format-gallery',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author','thumbnail','excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['skills'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

// ТАКСОНОМИЯ
// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
	register_taxonomy( 'skills', [ 'portfolio' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Навыки',
			'singular_name'     => 'Навык',
			'search_items'      => 'Найти навык',
			'all_items'         => 'Все навыки',
			'view_item '        => 'Смотреть навыки',
			'parent_item'       => 'Родительский навык',
			'parent_item_colon' => 'Родительский навык:',
			'edit_item'         => 'Изменить навык',
			'update_item'       => 'Обновить навык',
			'add_new_item'      => 'Добавить новый навык',
			'new_item_name'     => 'Новое имя навыка',
			'menu_name'         => 'Навыки',
			'back_to_items'     => '← Back to Genre',
		],
		'description'           => 'Навыки использованные для проекта', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'hierarchical'          => false,
		'rewrite'               => true,
	] );
}