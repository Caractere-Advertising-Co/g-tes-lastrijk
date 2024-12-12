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