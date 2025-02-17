<?php

add_filter('woocommerce_resize_images', static function() {
    return false;
});

// Menu 
register_nav_menus( array(
    'megamenu' => 'Mega Menu',
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
	'secondary' => 'Menu secondaire'
) );

add_theme_support( 'post-thumbnails' );

//SVG Files
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4 );
  
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
  
function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
  add_filter( 'upload_mimes', 'cc_mime_types' );
  add_action( 'admin_head', 'fix_svg' );


  add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function enqueue_custom_scripts() {
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/src/js/loadmore.js', array('jquery'), '', true);

    // Localisation du script AJAX
    wp_localize_script('custom-scripts', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

/*********************************
 Custom Post Type ---- Gîtes
**********************************/

function add_custom_post_gîtes() {

	$labels = array(
		'name'                  => _x( 'Gîte.s', 'Post Type General Name', 'custom_post_type' ),
		'singular_name'         => _x( 'Gîte', 'Post Type Singular Name', 'custom_post_type' ),
		'menu_name'             => __( 'Gîtes', 'custom_post_type' ),
		'name_admin_bar'        => __( 'Gîte', 'custom_post_type' ),
		'archives'              => __( 'Archives', 'custom_post_type' ),
		'attributes'            => __( 'Item Attributes', 'custom_post_type' ),
		'all_items'             => __( 'Toute.s', 'custom_post_type' ),
		'add_new_item'          => __( 'Ajouter un nouveau gîte', 'custom_post_type' ),
		'add_new'               => __( 'Ajouter gîte', 'custom_post_type' ),
		'new_item'              => __( 'Nouveau', 'custom_post_type' ),
		'edit_item'             => __( 'Modifier', 'custom_post_type' ),
		'update_item'           => __( 'Mettre à jour', 'custom_post_type' ),
		'view_item'             => __( 'Voir', 'custom_post_type' ),
		'view_items'            => __( 'Voir', 'custom_post_type' ),
		'search_items'          => __( 'Recherche', 'custom_post_type' ),
		'not_found'             => __( 'Non trouvé', 'custom_post_type' ),
		'not_found_in_trash'    => __( 'Non trouvé', 'custom_post_type' ),
		'featured_image'        => __( 'Miniature', 'custom_post_type' ),
		'set_featured_image'    => __( 'Définir la miniature', 'custom_post_type' ),
		'remove_featured_image' => __( 'Retirer la miniature', 'custom_post_type' ),
		'use_featured_image'    => __( 'Utiliser comme miniature', 'custom_post_type' ),
		'insert_into_item'      => __( 'Insérer', 'custom_post_type' ),
		'uploaded_to_this_item' => __( 'Uploader', 'custom_post_type' ),
		'items_list'            => __( 'List', 'custom_post_type' ),
		'items_list_navigation' => __( 'Items list navigation', 'custom_post_type' ),
		'filter_items_list'     => __( 'Filtrer', 'custom_post_type' ),
	);
	$args = array(
		'label'                 => __( 'Gîtes', 'custom_post_type' ),
		'description'           => __( 'Gîtes de La Strijk', 'custom_post_type' ),
		'labels'                => $labels,
		'taxonomies'            => array( 'gîtes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'menu_icon'             => 'dashicons-feedback',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'supports'				=> array('title', 'revisions', 'author', 'thumbnail'),
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'		=> 'post',
	);
	register_post_type( 'gites', $args );
}
add_action( 'init', 'add_custom_post_gîtes', 0 );

function add_custom_post_chambres(){
	$labels = array(
		'name'                  => _x( 'Chambre.s', 'Post Type General Name', 'custom_post_type' ),
		'singular_name'         => _x( 'Chambre', 'Post Type Singular Name', 'custom_post_type' ),
		'menu_name'             => __( 'Chambres', 'custom_post_type' ),
		'name_admin_bar'        => __( 'Chambres', 'custom_post_type' ),
		'archives'              => __( 'Archives', 'custom_post_type' ),
		'attributes'            => __( 'Item Attributes', 'custom_post_type' ),
		'all_items'             => __( 'Toute.s', 'custom_post_type' ),
		'add_new_item'          => __( 'Ajouter une nouvelle chambre', 'custom_post_type' ),
		'add_new'               => __( 'Ajouter chambre', 'custom_post_type' ),
		'new_item'              => __( 'Nouveau', 'custom_post_type' ),
		'edit_item'             => __( 'Modifier', 'custom_post_type' ),
		'update_item'           => __( 'Mettre à jour', 'custom_post_type' ),
		'view_item'             => __( 'Voir', 'custom_post_type' ),
		'view_items'            => __( 'Voir', 'custom_post_type' ),
		'search_items'          => __( 'Recherche', 'custom_post_type' ),
		'not_found'             => __( 'Non trouvé', 'custom_post_type' ),
		'not_found_in_trash'    => __( 'Non trouvé', 'custom_post_type' ),
		'featured_image'        => __( 'Miniature', 'custom_post_type' ),
		'set_featured_image'    => __( 'Définir la miniature', 'custom_post_type' ),
		'remove_featured_image' => __( 'Retirer la miniature', 'custom_post_type' ),
		'use_featured_image'    => __( 'Utiliser comme miniature', 'custom_post_type' ),
		'insert_into_item'      => __( 'Insérer', 'custom_post_type' ),
		'uploaded_to_this_item' => __( 'Uploader', 'custom_post_type' ),
		'items_list'            => __( 'List', 'custom_post_type' ),
		'items_list_navigation' => __( 'Items list navigation', 'custom_post_type' ),
		'filter_items_list'     => __( 'Filtrer', 'custom_post_type' ),
	);
	$args = array(
		'label'                 => __( 'Chambres', 'custom_post_type' ),
		'description'           => __( 'Galerie chambrek', 'custom_post_type' ),
		'labels'                => $labels,
		'taxonomies'            => array( 'chambre' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'menu_icon'             => 'dashicons-feedback',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'supports'				=> array('title', 'revisions', 'author', 'thumbnail'),
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'		=> 'post',
	);
	register_post_type( 'chambres', $args );
}
add_action( 'init', 'add_custom_post_chambres', 0 );


/* Récup infos popup */

function content_popup(){
	$ajaxposts = new WP_Query([
		'post_type' => 'chambres',
		'p' => intval($_POST['id']),
	]);
  
	if ($ajaxposts->have_posts()) {
		while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$post_data = array(
				'title' => get_field('nom_chambre'),
				'thumbnails' => get_the_post_thumbnail_url(),
				'galerie' => get_field('galerie-chambre'),
			);
  
			ob_start();
			?>
			
			<div class="popup-content">
			  <div class="col-slider">
			  <div class="close">X</div>
  
				<?php if($post_data['galerie']) : ?>
				  <div class="swiper swiper-reference">
					<div class="swiper-wrapper">
					  <?php foreach($post_data['galerie'] as $img) :?>
						<div class="swiper-slide" style="background:url('<?php echo $img['url'];?>');background-size:contain!important;background-position: center center;">
						</div>
					  <?php endforeach;?>
					</div>
  
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>  
				  </div>
					
				<?php else :?>
				  <div class="full-size" style="background:url('<?php echo $post_data['thumbnails'];?>');">
				  </div>
				<?php endif;?>
			  </div>
			</div>
  
			<?php
			$response['template_content'] = ob_get_clean(); // Récupère le contenu du template après l'inclusion
		endwhile;
	} else {
		$response['template_content'] = ''; // Aucun post trouvé, réponse vide
	}
  
	wp_reset_postdata(); // Réinitialise les données du post
  
	echo json_encode($response);
	exit;
  }

  
  add_action('wp_ajax_content_popup', 'content_popup');
  add_action('wp_ajax_nopriv_content_popup', 'content_popup');