<?php
/* Template Name: accueil*/

get_header();?>

<section id="hero-container">
    <div class="swiper swiper-hero">
        <div class="swiper-wrapper">
            <?php if(have_rows('slides')):
                while(have_rows('slides')) : the_row();?>
                    <?php 
                        $bg    = get_sub_field('background_image');
                        $links = get_sub_field('grp_links');     
                    ?>

                    <?php if($bg):?>
                        <div class="swiper-slide">
                            <img src="<?php echo $bg['url'];?>" alt="bg_slider" />
                                <div class="content">
                                    <p class="baseline"><?php echo get_sub_field('sous-titre');?></p>
                                    <?php echo get_sub_field('titre');?>

                                    <?php if($links):?>
                                        <div class="columns">
                                            <?php foreach($links as $lks):?>
                                                <a href="<?php echo $lks['cta']['url'];?>" class="cta"><?php echo $lks['cta']['title'];?></a>
                                            <?php endforeach;?>
                                        </div>
                                    <?php endif;?>
                                </div>
                        </div>
                    <?php endif;
                endwhile;
            endif;?>
        </div>

        <div class="swiper-pagination"></div>
    </div>

    <span class="rotate-reverse cta-hero">
        <?php get_template_part( 'templates-parts/cta-reservation' );?>
    </span>
</section>

<section id="card-gites">
    <div class="container columns">
        <?php 
            if(have_rows('services')):
                while(have_rows('services')): the_row();
                    $bg = get_sub_field('background_service');
                    $nom = get_sub_field('nom_service');
                    $cta = get_sub_field('lien_service');
                ?>

                    <a href="<?php echo $cta['url'];?>">
                        <div class="card" style="background:url('<?php echo $bg['url'];?>');"> 
                            <div class="content from-bottom">
                                <p>Découvrir</p>
                                <h2><?php echo $nom;?></h2>
                            </div>
                        </div>
                    </a>

                <?php endwhile;
            endif;?>
    </div>
</section>

<?php get_template_part( 'templates-parts/section-aubel' );?>   
<?php get_template_part( 'templates-parts/section-two-columns-tit' );?>
<?php get_template_part( 'templates-parts/section-extra' );?>

<section id="intro-actualites">
    <div class="container">
        <?php 
            $surtitre = get_field('surtitre-actus');
            $titre = get_field('titre-actus');
            $intro = get_field('intro-actus');

            if($surtitre): echo '<p class="subtitle">'.$surtitre.'</p>';endif;
            if($titre): echo $titre;endif;
            if($intro): echo $intro;endif;

        ?>
    </div>
</section>

<span class="nomobile"><?php get_template_part( 'templates-parts/separator/tiny-separator' );?></span>

<section id="liste-actualites">
    <div class="container">
        <?php 
        $args = array(
            "post_type" => "post",
            "post_per_page" => 2
        );

        $news = new WP_Query($args);
        $i = 1;

        if($news->have_posts()):
            while($news->have_posts()): $news->the_post();
                get_template_part('templates-parts/blog/card-blog', null, array( 'id' => $i));
                $i++;
            endwhile;
        endif;

        wp_reset_postdata();?>
    </div>
    <div class="container">
        <?php $ctaActus = get_field('cta-actus');

        if($ctaActus): echo '<a href="'.$ctaActus['url'].'" class="cta-border cta-actus">'.$ctaActus['title'].'</a>';endif;
        ?>
    </div>
</section>

<section id="galerie-front" class="galeries-home">
    <?php 
        $galerie = get_field('galerie-gle-separator');
        $ctaGalerie = get_field('cta-gle-separator');
    
    ?>
    <div class="columns">
        <div class="col-g anim-img-1">
            <?php if($galerie):?>
                <img src="<?php echo $galerie[0]['url'];?>" alt="<?php echo $galerie[0]['title'];?>" class="from-bottom "/>
            <?php endif;?>
        </div>

        <div class="col-d anim-img-2">
        <?php if($galerie):?>
                <img src="<?php echo $galerie[1]['url'];?>" alt="<?php echo $galerie[1]['title'];?>" class="from-bottom "/>
            <?php endif;?>
        </div>
    </div>

    <div class="container anim-img-3">
    <?php if($galerie):?>
        <img src="<?php echo $galerie[2]['url'];?>" alt="<?php echo $galerie[2]['title'];?>" class="from-bottom "/>
    <?php endif;?>
    <?php if($ctaGalerie):?><a href="<?php echo $ctaGalerie['url'];?>" class="cta-border"><?php echo $ctaGalerie['title'];?></a><?php endif;?>
    </div>
</section>

<?php 

get_template_part( 'templates-parts/section-bannerfullwidth' );
get_template_part( 'templates-parts/contact' );

get_footer();?>