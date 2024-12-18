<?php
/* Template Name: Simple-content */

get_header();

$bg_header      = get_field('bg_header');

if(!$bg_header):
    $bg_url     = get_template_directory_uri(  ).'/assets/img/bg-default.jpg';
else :
    $bg_header  = get_field('bg_header');
    $bg_url     = $bg_header['url'];
endif; ?>

<header id="header-simple-page" >
    <img src="<?php echo $bg_url;?>" alt="<?php echo $bg_header['title'];?>"/>

    <div class="container">
        <div class="content"><h1><?php the_title();?></h1></div>
    </div>
</header>

<section id="simple-content">
    <div class="container"><?php the_content();?></div>
</section>

<?php get_footer();