<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <title><?php wp_title('');?> - Start WP</title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url')?>">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        /* jssor keyframes */
        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 032 css*/
        .jssorb032 {position:absolute;}
        .jssorb032 .i {position:absolute;cursor:pointer;}
        .jssorb032 .i .b {fill:#fff;fill-opacity:0.7;stroke:#000;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.25;}
        .jssorb032 .i:hover .b {fill:#000;fill-opacity:.6;stroke:#fff;stroke-opacity:.35;}
        .jssorb032 .iav .b {fill:#000;fill-opacity:1;stroke:#fff;stroke-opacity:.35;}
        .jssorb032 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 051 css*/
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="/start_wp/wp-content/themes/StartWP/js/jssor.slider.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
                $AutoPlay: 1,
                $SlideDuration: 800,
                $SlideEasing: $Jease$.$OutQuint,
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 3000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        });
    </script>

</head>
<body>

<!-- Header -->
<header class="navbar" style="width: 100%;z-index: 950">
    <div class="container">

        <a class="navbar-brand" href="/start_wp/"><?php bloginfo('name')?></a>
        <!-- Menu Desktop -->
        <div class="menu-desktop">
            <ul class="nav navbar-nav">
                <?php wp_list_pages('title_li='); ?>
                <li class="drop-categories"><a href="#">Categorias <i class="fa fa-caret-down"></i></a>
                    <div class="sub-menu">
                        <span class="caret-up"></span>
                        <?php
                        $args = array(
                            'orderby' => 'name',
                            'parent' => 0
                        );
                        $categories = get_categories( $args );
                        foreach ( $categories as $category ) {
                            echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';
                        }
                        ?>
                    </div>
                </li>
            </ul>
            <div class="drop-search">
                <a href="#" class="btn-search"><img src="/start_wp/wp-content/themes/StartWP/imgs/search.png" alt=""></a>
            </div>
        </div>
        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="header-menu">
                <ul class="nav navbar-nav">
                    <li><a href="/start_wp/blog">Blog</a></li>
                    <li><a href="/start_wp/contato">Contato</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            $args = array(
                                'orderby' => 'name',
                                'parent' => 0
                            );
                            $categories = get_categories( $args );
                            foreach ( $categories as $category ) {
                                echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<?php flush();?> <!-- Acelera carregamento da página -->