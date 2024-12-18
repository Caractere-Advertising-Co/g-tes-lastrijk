<?php
/* Template Name: Tarifs */

get_header();

$surtitre       = get_field('surtitre');
$titre          = get_field('titre_page');
$intro          = get_field('introduction');

$bg_header      = get_field('bg_header');

if(!$bg_header):
    $bg_url     = get_template_directory_uri(  ).'/assets/img/bg-default.jpg';
else :
    $bg_header  = get_field('bg_header');
    $bg_url     = $bg_header['url'];
endif;

$imgTr          = get_field('image-transition');
$contentTr      = get_field('content-transition');
$ctaTr          = get_field('cta-transition');

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

<section id="section-2-tit" class="tarifs-custom">
    <div class="container">
        <?php if($intro): echo '<span class="from-bottom">'.$intro.'</span>';endif;?>
    </div>
</section>

<?php get_footer();