<!-- COMO VOLVER AL HOME A TRAVES DE UN LINK -->

<a href='<?php echo home_url(); ?>' class=''>
    <img src='<?php echo get_template_directory_uri(); ?>/---/----.svg' alt="" title="" class="">
</a>


<!-- Loop básico -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!-- contenido para el loop -->
<?php endwhile; ?>
<?php endif; ?>


<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_content(); ?>
</article>
<?php endwhile; ?>
<?php endif; ?>



<div class="mis-noticias">
    <ul>
        <?php
        $my_query = new WP_Query('category_name=my-category&posts_per_page=number-post');
        while ($my_query->have_posts()) : $my_query->the_post();
            ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
</div>

<?php
    $the_query = new WP_Query($args);
        while ($the_query->have_posts()) : $the_query->the_post();
    // el loop...
    endwhile;
    // Reseteamos
    wp_reset_query();
    wp_reset_postdata();

//=========================================================================================
//con paginado:

// Obtenemos todos los posts con 10 en cada p�gina
$args = array(
    'post_type'         => 'post',
    'posts_per_page'    => 10,
    'paged'             => get_query_var('paged')
);
$nuestra_query = new WP_Query($args);
if ($nuestra_query->have_posts()) {
    while ($nuestra_query->have_posts()) {
        // Mostramos lo que queramos de cada post
    }
}
if (function_exists('wp_pagenavi')) {
    wp_pagenavi(array('query' => $nuestra_query));
}
wp_reset_postdata();


pre_get_posts()

function hmuda_modificar_main_query($query){
    //Primero asegurar que es la consulta principal y que es la home
     if(is_home() && $query->is_main_que ry( ){
        //Hacer la modificaci�n que sea
        $query->set('posts_per_page', '4');
        $query->set('cat', '-7');
    }
}
add_action('pre_get_posts', 'hmuda_modificar_main_query');

//=======================================================================================================

WP_Query()

<!-- Definir los par�metros de la consulta a la base de datos -_>
$args = array(
    'posts_per_page' => 3,
    'cat'  =>  8
    'offset' => 1
);
$loop_a lternativo =  new WP_Query($args
    if($loop_al ternativo->have_posts( )
        while($loop_alternativo->have_posts()): $loop_alternativo->the_post();
            //Ya estamos en el bucle alternativo
            the_title();
        endwhile;
    endif;
wp_reset_postdata();


get_posts()
//Definir los par�metros de la consulta a la base de datos
$ar gs = array
    'posts_per_page' => 3,
    'cat'  => 8,
    'offset' => 1
);
global $post;
$myposts = get_posts($args);
foreach($myposts as $po st )
    //Ya estamos en el bucle alternativo
    setup_postdata($post);
    the_title();
endforeach;
wp_reset_postdata();

<!-- te entrega el nombre de la categor ia -->
<h2><a href="<?php echo get_category_link(ej.3); ?>" title="ir a <?php the_title_attribute(); ?>">****<?php echo get_cat_name(3);?>****</a></h2>
//--------------------------------------------- --------------------------------
//Versi�n 2:
<!-- Puede usarse tambien el siguiente -->
<h2><a href="<?php echo get_category_link(ej.3); ?>" title="ir a<?php the_title_attribute(); ?>">****<?php the_title(); ?>****</a></h2>
<h2><a href="<?php the_permalink(); ?>" title="ir a<?php the_title_attribute(); ?>">****<?php the_title(); ?>****</a></h2>
//-----------------------------------------------------------------------------
//Versi�n 3:
<!-- Puede usarse tambien el siguiente -->
<?php the_title('<h3>', '</h3>'); ?>
<?php the_title_attribute('before=<h3>&after=</h3>'); ?>
//-----------------------------------------------------------------------------
//Version 4:
<!-- Puede usarse tambien el siguiente -->
< ?php the_title('<h1 class="entry-title"><a href="' . get_permalink() . '"title="' . the_title_attribute('echo=0') . '" rel="bookmark">','</a></h1>'); ?>
//-----------------------------------------------------------------------------

//=======================================================================================================
Mostrar las categorias: <?php the_category($separator, $parents, $post_id); ?>

<p>Categoria: <?php the_category(''); ?></p>

con comas o algun c�digo ascii

<p>Categoria: <?php the_category(', '); ?></p>
<p>Categoria: <?php the_category(' &gt; '); ?></p>
<p>Categoria: <?php the_category(' &bull; '); ?></p>

//=======================================================================================================
//COMO MOSTRAR LOS METAS: <?php the_meta(); ?>
//-----------------------------------------------------------------------------
<p>Meta information for this post:</p>
<?php the_meta(); ?>
//-----------------------------------------------------------------------------
<ul class='post-meta'>
    <li><span class='post-meta-key'>your_key:</span> your_value</li>
</ul>
//-----------------------------------------------------------------------------



//=======================================================================================================

//COMO MOSTRAR LOS TAGS: <?php the_tags($before, $sep, $after); ?>
//-----------------------------------------------------------------------------
<p><?php the_tags(); ?></p>
//----------------------------------- ------------------------------------------
 
por c omas:
<?php the_tags('Tags: ', ', ', '<b r />'); ?>
 <?php the_tags('Social tagging: ',' > '); ?>
<?php the_tags('Tagged with: ',' � ','<br />'); ?>
<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
//-----------------------------------------------------------------------------





//=======================================================================================================
//WordPress: NUMERO TOTAL DE POST DE UNA CATEGORIA
//insertar la funci�n dentro del archivo functions.php de vuestro theme:
//-----------------------------------------------------------------------------
function numero_total_post($idcat) {
global $wpdb;
$query = "SELECT count FROM $wpdb->term_taxonomy WHERE term_id = $idcat";
$numero = $wpdb->get_col($query);
echo $numero[0];
}
//-----------------------------------------------------------------------------
//Usar de la siguiente forma:
//-----------------------------------------------------------------------------
<p>Esta categor�a tiene un total de: <?php echo numero_total_post(23); ?> entradas.</p>
//-----------------------------------------------------------------------------


//=======================================================================================================
//INFORMACION PARA LOS SINGLES:
//-----------------------------------------------------------------------------
<div class="metabox">
    <span class="time meta">Publicado el <?php the_time('j') ?> de <?php the_time('F, Y') ?> | </span><span class="author meta">Por <?php the_author_posts_link(); ?> | </span>
    <span class="comments meta"><?php comments_popup_link('Sin Comentarios', '1 Comentario', '% Comentarios'); ?> | </span><span class="category meta">En la categor&iacute;a <?php the_category(' '); ?> | </span>
    <span class="tags meta">Con las siguientes etiquetas <?php the_tags(); ?></span>
</div>
//-----------------------------------------------------------------------------
<p>Escrito por: <?php the_author(); ?></p>
//-----------------------------------------------------------------------------
<p>Publicado el <?php the_time('j') ?> de <?php the_time('F, Y') ?></p>
//-----------------------------------------------------------------------------
<span class="comments meta"><?php comments_popup_link('Sin Comentarios', '1 Comentario', '% Comentarios'); ?> | </span>


//=======================================================================================================


//MOSTRAR  FECHA EN ESPA�OL
//-----------------------------------------------------------------------------
<?php the_time('d \d\e\ F \d\e\ Y');?>
//-----------------------------------------------------------------------------



//PARA ENVOLVER EL POST CON UN CLASS O ID PERSONALIZADO
//=======================================================================================================

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    //-----------------------------------------------------------------------------
    <a class="leermas" href="<?php the_permalink(); ?>">Leer m�s &rarr;</a>


    //PAGINACION NUMERICA:
    //===========    ============================================================================================
    AGREGAR EN function.php

    <?php
function paginado()
    {
        global $wp_query, $wp_rewrite;
        $wp_query->query_vars['paged' ] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1

        $pagination = array(
            'base' => @add_query_arg('page','%#%'),
            'format' => '',
            'total' => $wp_query->max_num_pages,
            'current' => $current,
            's how_all' => true
            'type' => 'list',
            'next_text' => '&raquo;',
            'prev_text' => '&laquo;'
        );

        if($wp_rewrite->using_permalinks())
            $paginatio n['base'] = user_trailingslashit trailingslashit remove_query_arg 's', get_pagenum_link    ) . 'page/%#%/', 'paged )

        if(!empty($wp_query->query_vars['s']))
            $pagination['add_args'] = array('s' => get_query_var('s'));

        echo paginate_links($pagination);
    }
    ?>
    //-----------------------------------------------------------------------------
    //CODIGO A UTILIZAR EN EL TEMPLATE: <?php paginado(); ?>
    //=======================================================================================================





    //SIDEBAR DINAMICOS PARA WIDGET
    //=======================================================================================================

    /*Copiar en el archivo function.php
    1.- name: El nombre del Sidebar, por defecto es �Sidebar�.
    2.- id: El id del sidebar (ej: sidebar-derecha), por defecto es el ID numerico auto-generado.
    3.- description: Texto de descripcion del sidebar a registrar, se muestra en la pagina de Widgets, por defecto esta vacio
    4.- class: Clase CSS a asignar a los widgets de este Sidebar.
    5.- before_widget: C�digo HTML que ira antes de cada widget, por defecto es <li>
        6.- after_widget: C�digo HTML que ira despu�s de cada widget, por defecto es </li>
    7.- before_title: C�digo HTML que ira antes del t�tulo del Widget    , por defecto es <h2>
        8.- after_title: C�digo HTML que ira despu�s del t�tulo del Widget, por defecto es </h2>*/

    <?php
register_sidebar(
        array(
            'name' => 'Zona de Anuncios',
            'id' => 'ad-zone',
            'description' => 'Aqu� ir�n los anuncios del sitio',
            'before_widget' => '<div class="widget ad">',
            'after_widget'  => '</div>',
            'before_title' => '<strong class="adtitle">',
            'after_title' => '</strong>'
        )
    );
    ?>
    //-----------------------------------------------------------------------------
    //CODIGO A UTILIZAR EN EL TEMPLATE: <?php dynamic_sidebar('ad-zone'); ?>
    //=======================================================================================================


    //LOOP para ordenar los post por ABC
    //====================================================================== ======================== =========
    <?php 

    //Conttrolas si ya estamos paginando
    $paged = (get_query_var('paged'))? get_query_var('paged'): 1;

    //Argumentos para filtrar los posts
    $args = array(
        'paged' => $paged,
        'cat' => 20, // Whatever the category ID is for your aerial category
        'posts_per_page' => 100,
        'orderby' => 'title', // date - comment_count - meta_value_num - 
        'order' => 'ASC' // DESC o ASC          

    );
    //Y creamos el nuevo query

    $my_socio = new WP_Query($args);
    ?>



    <?php
            //loop para mostrar los post

    if ($my_socio->have_posts()) : while ($my_socio->have_posts()) : $my_socio->the_post(); ?>


    //=======================================================================================================
    // FORMAS DE LLAMAR UN THUMBNAILS:
    //==================== ===================================================================================


    <?php if (has_post_thumbnail($post->ID)): ?>
    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-banner-page'); ?>
    <div class="portada-thumbnail" style="width: 1400px;height:300px;background-image: url('<?php  echo $image[0]; ?>')">


        <?php $t humb = wp_get_attachment_image_src get_post_thumbnail_id($post->ID), 'thumb-testi moni' );?>
        <img src="<?php echo $thumb['0'];?>" width="" height="" class="img-circle">

        <?php 
        $id = $post->ID;
        if(!has_post_thumbnail($id)) {
            // the current page has no feature image
            // so we'll see if a) it has a pare nt and b) the parent has a featured imag
            $ancestors = get_ancestors($post->ID, 'page');
            $parent_id = $ancestors[0];
            if(has_post_thumbnail($parent_id)) {
                // we'll use the parent's featured image
                $id = $parent_id;
            }
        }
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
        ?><img src="<?php echo $thumb['0']; ?>" width="230" height="230" class="img-circle">
        <div class='guideHeader' style='background-image: url(<?php echo $thumb['0']; ?>);'></div>


        <?php $image_id = get_post_thumbnail_id(); // attachment ID
        $image_attributes = wp_get_attachment_image_src($image_id, 'full');
        ?>
        <img src="<?php echo $image_attributes[0]; ?>" width="230" height="230" class="img-circle">



        //=======================================================================================================
        // PRUEBA COMO BACKGROUND:
        //===== ==================================================================================================
        <?php 
        $id = $post->ID;
        if(!has_post_thumbnail($id)) {
            // the current page has no feature image
            // so we'll see if a) it has a parent and b) th e parent has a featured imag
            $ancestors = get_ancestors($post->ID, 'thumb-testimonio');
            $parent_id = $ancestors[0];
            if(has_post_thumbnail($parent_id)) {
                // we'll use the parent's featured image
                $id = $parent_id;
            }
        }
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
        ?><div class='thumbnailTestimonio' style='background-image: url(<?php echo $thumb['0']; ?>);'></div>

        //=======================================================================================================
        // PRUEBA COMO ETIQUETA IMG:
        //=============================================================================== ========================
        <?php $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id,'Mi THUMBNAIL PERSONALIZADO', true);
        ?>
        <img src="<?php echo $thumb_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="mi clase personalizada" width="n" height="n">

        //=======================================================================================================
        // PRUEBA COMO BACKGROUND SIMPLE:
        //================================================================ =======================================
        <?php $thumb = wp_get_attachment_image_src(get_p ost_thumbnail_id($post->ID), 'full );?>
        <div id="post" class"your-class" style="background-image: url('<?php echo $thumb['0'];?>')">

            //=======================================================================================================
            // VINCULAR CSS EN FUNCTION.PHP
                        //===================================================================================================== = =
            <?php
wp_enqueue_style('styleTheme', get_stylesheet_uri());
            wp_register_style('boostrap', get_template_directory_uri().' / library/bootstrap/bootstrap.min.css'
            wp_enqueue_style('boostrap');

            wp_register_style('limpiar_css', get_template _ directory_uri().'/css/normalize.css'
            wp_enqueue_style('limpiar_css');

            wp_register_style('fancybox', get_template_directory_uri(). ' /library/fancyBox/jquery.fancybox.css'
            wp_enqueue_style('fancybox');

            wp_register_style('newstyle', get_template_directory_uri().'/css/style-2.css');
            wp_enqueue_style('newstyle');
            }
            add_action('wp_enqueue_scripts', 'add
            _ty
                        _styles_theme' );
?>
            <?
                        <?php 
add_action('wp_enqueue_scripts' 'miplu
            add_action('wp_enqueue_scripts' 'miplugin_google_fonts');
function miplugin_google_fonts( ){
                wp_enqueue_script('google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans');
            }

            function wpb_add_google_fonts()
            {
                wp_enqueue_style('wpb-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,700,300', false);
            }
            add_action('wp_enqueue_scripts', 'wpb_add_google_fonts');
            ?>
            <?php  //======================================================================================================= 
            //    VINCULAR JS EN FUNCTION.PHP
               ========  ?>

            <?ph
                    <?php 
    add_action("wp_enqueue_scripts", "incr
            action("wp_enqueue_scripts", "incrus tar_estilos", 1 1);
        function incrustar_estilos(){
                // nos aseguramos que no estamos en el area de administracion
                if(!is_admin()){

                    // registramos nuestro script con el nombre "mi-script" y decimos que es dependiente de jQuery para que wordpress se asegure de incluir jQuery antes de este archivo
                    // en adicion a las dependencias podemos indicar que este aarchivo debe ser insertado en el footer del sitio, en el lugar donde se encuente la funcion wp_footer
                    //wp_register_script('mi-script', get_bloginfo('template _directory'). '/js/custom.js', array('jquery'), '1', true )
                    wp_register_script('mi-script', get_bloginfo('te mplate_directory'). '/js/custom.js', array(), '1', tru )
                    wp_register_script('mi-script-2', get_bloginfo('template_directory'). '/library/boo tstrap/bootstrap.min.js', array('mi-script'), '1', tru )
                    wp_register_script('mi-script-3', get_bloginfo('template_directory'). '/library/fancyBox/jq uery.fancybox.pack.js', array('mi-script-2'), '1', tru )
                    wp_register_script('mi-script-4', get_bloginfo('template_directory'). '/js/fancy-custom.js', array('mi-script-3'), '1', true);
                    wp_enqueue_script('mi-script');
                    wp_enqueue_script('mi- script-2')
                    wp_enqueue_script('mi-script-3');
                    wp_enqueue_script('mi-script-4');
                }
            }
            ?>
            <?php //======================================================================================================= 
            // COMO LLAMAR EL NOMBRE DE UNA CATEGORIA
            ?>

            <h1>&#151 <?php $category = get_the_category();
                        echo $category[0]->cat_name; ?> &#151</h1>



            <?php  //======================================================================================================= 
            // MODIFICAR Y CREAR THUMNAILS DEL SI     
            ?>
            <?php
add_theme_support('post-thumbnails');
            add_image_size('thumb-news-home', 350, 150, true);
            add_image_size('thumb-news-blog', 280, 180, true);
            add_image_size('large', 700, 600);           // Tama�o grande (defecto 640px x 640px max)
            add_image_size('full', 700, 600);            // Tama�o real (tama�o original de la imagen subida)
            the_post_thumbnail('thumbnail');       // Thumbnail (defecto 150px x 150px max)
            the_post_thumbnail('medium');          // Tama�o medio (defecto 300px x 300px max)

            ?>
            //=======================================================================================================
            // MODIFICAR Y CREAR THUMNAILS DEL SISTEMA
            //=======================================================================================================
            //LOGOTIPO INICIO
            <?php
 //* Cambia el logotipo de la p�gina inicio de sesi�n de WordPress (usar imagen de 80x80px)
            function mi_logo_personalizado()
            { ?>
            <style type="text/css">
                body.login div#login h1 a {
                    background-image: url(<?php echo get_stylesheet_directory_uri();
                                            ?>/images/my-imagen.png);
                    background-size: 1
        00%;
                    width: 100px;
                    height: 100px;
                }
            </style>
             <?php 
        add_action('login_enqueue_scripts', 'mi_logo_personalizado');

        //SOPORTE WOOCOMERCE

        add_action('after_setup_theme','woocommerce_support');
        function woocommerce_support()
        {
            add_theme_support('woocommerce');
        }


        ?>

            //============================================================================================================
            // LOOP FINAL PARA UN THEME
             //================= ==========================================================================================

            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            //Thumnai l code opcional
            <?php $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src($thumb_id,'Mi_thumbnail_perzonalizado_desde_Function', true); ?>
            <img src="<?php echo $thumb_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="mi_clase_personalizada" width="---" height="---">

            <h2><?php the_title(); ?></h2>
            <span class="byline">Publicado el <?php the_time('d F Y'); ?> | en <?php the_category(', '); ?> | por <?php the_author(); ?> </span>
            <div class="sumary">
                <?php the_content(); ?>
            </div>
            <?php endwhile;
    else: ?>
            <div class="msj-error">
                <h2>404</h2>
                <h3>Algo sali� mal</h3>
                <p>Oops! Lo sentimos este contenido ya no exite</p>
                <a href="#" class="btn red" title="---" alt="---">Regresa al inicio</a>
            </div><!-- mensaje de error -->
            <?php endif; ?>

            //============================================================================================================
            // CREAR UN TEMPLATE PARA LOS PAGE.PHP
            //===========================================================================================================

            <?php  /* Template name: blog */ ?>

            //============================================================================================================
            // CAMBIAR UN HEADER EN EL THEME
            //===========================================================================================================

            <?php get_header('landing'); ?>
            //El nombre langin hace referencia al nombre del archivo header-landing.php



            //============================================================================================================
            // COMO LLAMAR UN ARCHIVO PHP AL THEME
            //=============== =============================================================================================

            <?php include(TEMPLATEPATH. '/nombre-archivo.php'); ?>


            //============================================================================================================
            // VARIOS SCRIPT
            //============================================================================================================

            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permalink a <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            <span><?php the_time('F jS, Y') ?> | en <?php the_author_posts_link() ?></span>
            <p class="postmetadata">Pubblicato in <?php the_category(', '); ?></p>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div id="post-<?php the_ID(); ?>" <?php post_class('class-name'); ?>>

                    <body <?php body_class(); ?>>
                            
 
                           <bod y class="page  page - id - 2 page-parent page-template-default logged-in">
                               <? p hp
< style type="text/css"
                                .page {
                                    /* styles for all posts within the page class */}
                                .page-id-2 {
                                /* styles for only page ID number 2 */ }
                            .logged-in {
                                /* styles for all pageviews when the user is logged in */}
                                </style>
                            ?>
                            //####################################################################################
                            // LOOP CON ORDEN
                            //####################################################################################
                            <?php $the_query = new WP_query('cat=20&posts_per_page=70&orderby=title&order=asc'); ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                            <a class="---" id="---" href="#" title="ir a <?php the_title_attribute(); ?>" alt="---">
                                <?php if (has
                   
                                                                     
                                                                                                                                                                                  _post_thumbnail() ) { the_post_thumbnail('name-thumb'); }       
                        else { ?>
                                <img class= "---" id="---" src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default-socios2.png" alt="---" title="---" /> <?php } ?>
                            </a>

                            <?php endwhile;
                        wp_reset_query(); ?>



                            <?php // Switch default core markup for search form, comment form, and comments to output valid HTML5.
                            add_theme_support('html5', array(
                                'search-form',
                                'comment-form',
                                'comment-list',
                                'gallery',
                                'caption',
                            ));

                            // Enable support for Post Formats.
                            add_theme_support('post-formats', array(
                                'aside',
                                'image',
                                'video',
                                'audio',
                                'quote',
                                'link',
                            ));

                            ?>

                            <?php  // pegar en functions.php �ra eliminar la version del wordrpess
                            remove_action('wp_head', 'wp_generator');
                            ?>
                            <?php  // para actualizacion automaticas del wordpress

                            //Toda s  las a c tua lizaciones del  n�cleo desact
                            de fine 'WP_AUTO_UPDATE_CORE', fals )
                            //Todas  las actualizac iones del n�cle o activa
                            defin e( 'WP _AUT O_UPDATE_CORE', ru
                            //S�lo actualizaciones menores del n�cleo activadas
                            define('WP_AUTO_U PDATE_CORE', ' mino' 
                            ?>

                               <?p hp //Protege el archi vo de c onfigura ci�n de Word
                            <Files wp-co n fig.p 
                                order allow,deny
                            deny from all
                                </Files>
                                //Protege la carpeta de archivos subidos
                                <Files ~".*\..*">
                                Order Allow,Deny
                            Deny from all
                                </Files>
                                <FilesMatch "\.(jpg|jpeg|jpe|gif|png|bmp|tif|tiff|doc|pdf|rtf|xls|numbers|odt|pages|key|zip|rar)$">
                                Order Deny,Allow
                            Allow from all
                                </FilesMatch>

                                //Protege el archivo .htaccess
                                <files .htaccess>
                                order allow,deny
                            deny from all
                                </files>

                            ?>