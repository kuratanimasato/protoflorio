<?php
/*
 * Template Name: functions.php
 */

/* style.cssの読み込み */

function add_meta_tags()
{
    // 共通のメタタグ
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="robots" content="noindex">
    <link rel="canonical" href="https://kuratani-portfolio.xyz/">

    <?php
    // OGP用のメタタグ（動的に生成）
    ?>
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php bloginfo('name'); ?>">
    <meta property="og:url" content="<?php echo esc_url(home_url($_SERVER['REQUEST_URI'])); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/ogp.png">

    <?php
}
add_action('wp_head', 'add_meta_tags');
/**
 * ファビコン設置
 * @return void
 */

function my_theme_favicon()
{
    echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/assets/images/favicon.ico" />';
}
add_action('wp_head', 'my_theme_favicon');
function register_style()
{
    wp_enqueue_style('ress-css', get_template_directory_uri() . '/assets/css/ress.css');
    wp_enqueue_style('style-name', get_template_directory_uri() . '/assets/css/style.css');

}
add_action('wp_enqueue_scripts', 'register_style');

function my_load_widget_scripts()
{
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js', array(), '3.7.0', true);
    wp_enqueue_script('script-name', get_template_directory_uri() . '/assets/js/script.js');

}
add_action('wp_footer', 'my_load_widget_scripts');
function notimport_script()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
    }
}
add_action('wp_print_scripts', 'notimport_script', 100);

function my_theme_enqueue_styles()
{
    // Google Fonts: Montserrat
    wp_enqueue_style(
        'google-fonts-montserrat', // ハンドル名（任意）
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap',
        array(), // 依存関係
        null // バージョン
    );

    // Google Fonts: Material Icons
    wp_enqueue_style(
        'google-fonts-material-icons', // ハンドル名（任意）
        'https://fonts.googleapis.com/css?family=Material+Icons+Outlined',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


/**************************************************
投稿サムネイル有効化
**************************************************/
function custom_theme_setup()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'custom_theme_setup');

/**************************************************
固定ページで「抜粋」を有効化
**************************************************/
function my_custom_init()
{
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'my_custom_init');

/**************************************************
editor-style.css
**************************************************/
function add_gutenberg_editor_style()
{
    wp_enqueue_style('block-editor-style', get_theme_file_uri('editor-style.css'), array(), '1.0.0');
}
add_action('enqueue_block_editor_assets', 'add_gutenberg_editor_style');


/**************************************************
Classic Widgets
**************************************************/
add_filter('use_widgets_block_editor', '__return_false');

/**************************************************
管理画面 メディアの位置を変更
**************************************************/
function custom_menus()
{
    global $menu;
    $menu[19] = $menu[10];
    unset($menu[10]);
}
add_action('admin_menu', 'custom_menus');


/**************************************************
ナビゲーションメニュー（カスタムメニュー）
**************************************************/
function register_my_menus()
{
    register_nav_menus(
        array(
            'header_nav' => 'グローバルナビ（ヘッダー領域下に表示）',
            'footer_nav' => 'フッターナビ（フッター領域に表示）',
        )
    );
}
add_action('after_setup_theme', 'register_my_menus');

/**************************************************
ナビゲーションメニュー（カスタムメニュー）の<li>タグに、クラスを付与
**************************************************/
function add_additional_class_on_li($classes, $item, $args)
{
    // 共通のクラスを追加する場合
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);





function add_footer_link_class($atts, $item, $args)
{
    // メニューがfooter用の場合のみリンクにクラスを追加
    if ('footer_nav' === $args->theme_location) {
        // 'footer-link' クラスを追加
        $atts['class'] = 'footer-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_footer_link_class', 10, 3);


function enqueue_custom_editor_styles()
{
    add_editor_style('custom-editor-style.css');
}
add_action('admin_init', 'enqueue_custom_editor_styles');


/**************************************************
カスタム投稿タイプ/カスタムタクソノミー
**************************************************/
function custom_post_type_and_taxonomies()
{
    // カスタム投稿タイプ "works" の登録
    register_post_type('works', array(
        'label' => 'WORKS',
        'labels' => array(
            'name' => 'WORKS',
            'singular_name' => 'WORKS',
            'menu_name' => 'WORKS',
            'all_items' => 'WORKS',
            'add_new' => '新規追加',
            'add_new_item' => '新規作品を追加',
            'edit_item' => '作品を編集',
            'view_item' => '作品を見る',
            'search_items' => '作品を検索',
            'not_found' => '作品が見つかりませんでした',
            'not_found_in_trash' => 'ゴミ箱内に作品が見つかりませんでした',
        ),
        'public' => true,
        'menu_position' => 5,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'works'),
    ));

    // カスタムカテゴリー "cat_works" の登録
    register_taxonomy('cat_works', 'works', array(
        'label' => '作品カテゴリー',
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'cat_works'),
    ));

    // カスタムタグ "tag_works" の登録
    register_taxonomy('tag_works', 'works', array(
        'label' => '作品タグ',
        'hierarchical' => false,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'tag_works'),
    ));
}
add_action('init', 'custom_post_type_and_taxonomies');

function custom_breadcrumb()
{
    // ホームのURLを取得
    $home_url = home_url('/');
    echo '<nav class="breadcrumb">';
    echo '<a href="' . esc_url($home_url) . '"><i class="fa fa-home"></i> HOME</a>';

    if (is_category() || is_single()) {
        // カテゴリページまたは投稿ページ
        echo '<span class="breadcrumb-separator"> > </span>';
        the_category('<span class="breadcrumb-separator"> > </span>');
        if (is_single()) {
            echo '<span class="breadcrumb-separator"> > </span>';
            echo '<span class="breadcrumb-title">' . esc_html(get_the_title()) . '</span>';
        }
    } elseif (is_page()) {
        // 固定ページ
        echo '<span class="breadcrumb-separator"> > </span>';
        echo '<span class="breadcrumb-title">' . esc_html(get_the_title()) . '</span>';
    } elseif (is_search()) {
        // 検索結果ページ
        echo '<span class="breadcrumb-separator"> > </span>';
        echo '<span class="breadcrumb-search">検索結果: ' . esc_html(get_search_query()) . '</span>';
    } elseif (is_404()) {
        // 404ページ
        echo '<span class="breadcrumb-separator"> > </span>';
        echo '<span class="breadcrumb-404">404 エラー</span>';
    } elseif (is_tax('tag_works')) {
        // タグページ
        echo '<span class="breadcrumb-separator"> > </span>';
        echo '<span class="breadcrumb-taxonomy">' . single_term_title('', false) . '</span>';
    } elseif (is_author()) {
        // 著者アーカイブページ
        echo '<span class="breadcrumb-separator"> > </span>';
        echo '<span class="breadcrumb-author">著者: ' . esc_html(get_the_author()) . '</span>';
    } elseif (is_date()) {
        // 日付アーカイブページ
        echo '<span class="breadcrumb-separator"> > </span>';
        if (is_day()) {
            echo '<span class="breadcrumb-date">' . get_the_date('Y年m月d日') . '</span>';
        } elseif (is_month()) {
            echo '<span class="breadcrumb-date">' . get_the_date('Y年m月') . '</span>';
        } elseif (is_year()) {
            echo '<span class="breadcrumb-date">' . get_the_date('Y年') . '</span>';
        }
    } elseif (is_archive()) {
        // その他のアーカイブページ
        echo '<span class="breadcrumb-separator"> > </span>';
        echo '<span class="breadcrumb-archive">' . esc_html(post_type_archive_title('', false)) . '</span>';
    } elseif (is_singular('your_custom_post_type')) {
        echo " > ";
        echo '<a href="' . get_post_type_archive_link('your_custom_post_type') . '">' . post_type_archive_title('', false) . '</a>';
        echo " > ";
        the_title();
    }

    echo '</nav>';
}