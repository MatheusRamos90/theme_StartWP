<?php
/** FUNÇÕES DO TEMA */


/* WIDGETS */
/* Habilita o WP há instalar widgets no sidebar */
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name'          => 'Sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}

/* REMOVER VERSÃO DO TEMA/WP DO CÓDIGO FONTE */
remove_action('wp_head','wp_generator');

/* REMOVER MENSAGENS DE ERRO NO LOGIN */
/* Isso dificulta hackers ou tentativas de acesso de força bruta */
add_filter('login_errors', create_function("$a", 'return null;'));

/* BOOTSTRAP 3.3.7 */
function bootstrap_cdn () {
    wp_enqueue_style( 'bootstrap' , 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
}
add_action( 'wp_enqueue_scripts' , 'bootstrap_cdn');

/* FONTAWESOME 4.7.0 */
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {

    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}

/* Adiciona Imagem Destacada na Coluna da Listagem de Posts */
if (function_exists('add_theme_support')):
    add_theme_support('post-thumbnails');
endif;

add_theme_support( 'post-thumbnails', array( 'post' ) ); // Para colocar no loop de seus posts
add_theme_support( 'post-thumbnails', array( 'page' ) ); // Para páginas colocar no page, onde você chama sua página

set_post_thumbnail_size( 200, 200, true ); //coloco valor padrão para largura e altura

/* REMOVER VERSÃO DO WORDPRESS (evitar ataques) */
function cwp_remove_version() {
    return '';
}
add_filter('the_generator', 'cwp_remove_version');

/* PAGINAÇÃO DE POSTS - ANTERIOR E PRÓXIMO*/
function wpbeginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

}

function namespace_add_custom_types( $query ) {
    if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
        $query->set( 'post_type', array(
            'post', 'nav_menu_item', 'your-custom-post-type-here'
        ));
        return $query;
    }
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

?>


