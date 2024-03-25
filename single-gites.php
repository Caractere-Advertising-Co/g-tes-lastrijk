<?php
/*
Template Name: Gites
Template Post Type: gites, gite, gîte, gîtes
*/

get_header();

$surtitre = get_field('surtitre');
$titre = get_field('titre');
$price = get_field('price');

$subtitle = get_field('surtitre-intro');
$titrintro = get_field('titre-intro');
$intro = get_field('introduction');

$cta = get_field('cta');

/* Nos Chambres */

$surtitre_chamres = get_field('surtitre-chambres');
$titre_chambres = get_field('titre-chambres');

/* Séparator */
$imgSep = get_field('image-separator');

$bg_header = get_field('bg_header');

if(!$bg_header):
    $bg_url = get_template_directory_uri(  ).'/assets/img/bg-default.jpg';
else :
    $bg_header = get_field('bg_header');
    $bg_url = $bg_header['url'];
endif;?>

<header id="header" >
    <img src="<?php echo $bg_url;?>" alt="<?php echo $bg_header['title'];?>"/>
    <div class="container">
        <?php if($surtitre): echo '<span class="subtitle">'.$surtitre.'</span>'; endif;?>
        <?php if($titre): echo $titre; endif;?>
        <?php if($price): echo '<span class="cta">ÀPD DE '.$price.'€ LA NUIT';endif;?>
    </div>

    <div class="booking">
        <p>Nos Gites</p>
        <p>Check-in</p>
        <p>Check-out</p>
        <p>Personne(s)</p>
        <p class="gold">Check-now</p>
    </div>
</header>

<section id="simple-page">
    <div class="container">
        <h2><?php if($subtitle) : echo '<span class="subtitle">'.$subtitle.'</span>';endif;?></h2>
        <?php if($titrintro) : echo $titrintro;endif;?>
        
        <div class="intro from-bottom"><?php if($intro) : echo $intro;endif;?></div>

        <div class="content-toggle">
            <?php if(have_rows('informations_gites')):
                    while(have_rows('informations_gites')): the_row();?>
                        <div class="title-toggle">
                            <?php echo get_sub_field('titre');?>
                        </div>

                        <div class="content-toggle">
                            <?php echo get_sub_field('explication');?>
                        </div>
                    <?php endwhile;
                endif;
            ?>
        </div>
    </div>
</section>

<section id="nos-chambres">
    <div class="container">
    </div>
</section>

<?php if($imgSep):?>
    <section id="photo-separator">
        <img src="<?php echo $imgSep['url'];?>" alt="<?php echo $imgSep['title'];?>"/>
    </section>
<?php endif;?>

<?php get_template_part( 'templates-parts/section-extra' );?>
<?php get_template_part( 'templates-parts/section-citation' );?>
<?php get_template_part( 'templates-parts/section-cta-contact' );?>
<?php get_template_part( 'templates-parts/section-bannerfullwidth' );?>



<?php get_footer();