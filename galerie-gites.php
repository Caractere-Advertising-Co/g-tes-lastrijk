<?php 
/* Template Name: Galerie Gites */

get_header();

$surtitre = get_field('surtitre');
$titre = get_field('titre');

$bg_header = get_field('bg_header');
$galerie = get_field('galerie');

if(!$bg_header):
    $bg_header= get_template_directory_uri(  ).'/assets/images/bg-default.jpg';
else :
    $bg_header = get_field('bg_header');
    $bg_url = $bg_header['url'];
endif;

?>

<header id="header-simple-page" >
    <img src="<?php echo $bg_url;?>" alt="<?php echo $bg_header['title'];?>"/>

    <div class="container">
        <div class="content">
            <span class="subtitle"><?php if($surtitre): echo $surtitre;endif;?></span>
            <?php if($titre): echo $titre; endif;?>
        </div>
    </div>
</header>

<div id="galerie-gites">
    <div class="galerie-grid">
        <?php
        if($galerie):
            foreach($galerie as $g):?>
                    <a data-fslightbox href="<?php echo $g['url'];?>">
                        <img src="<?php echo $g['url'];?>" alt="<?php echo $g['title'];?>" />
                    </a>
                <?php 
            endforeach;
        endif;
        ;?>
    </div>

    <div class="container">
        <a href="#!" class="cta-border more">Plus de photos</a>
    </div>
</div>

<?php get_footer();
