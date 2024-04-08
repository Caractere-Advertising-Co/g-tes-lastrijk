<?php
/* Template Name: accueil*/

get_header();?>

<section id="hero-container">
    <div class="swiper swiper-hero">
        <div class="swiper-wrapper">
            <?php if(have_rows('slides')):
                while(have_rows('slides')) : the_row();?>
                    <?php $bg = get_sub_field('background_image');?>
                    <?php $cta = get_sub_field('liens');?>

                    <?php if($bg):?>
                        <div class="swiper-slide">
                            <img src="<?php echo $bg['url'];?>" alt="bg_slider" />
                                <div class="content">
                                    <p class="baseline"><?php echo get_sub_field('sous-titre');?></p>
                                    <?php echo get_sub_field('titre');?>
                                    <?php if($cta):?><a href="<?php echo $cta['url'];?>" class="cta-border"><?php echo $cta['title'];?></a><?php endif;?>
                                </div>
                        </div>
                    <?php endif;
                endwhile;
            endif;?>
        </div>

        <div class="swiper-pagination"></div>
    </div>

    <div class="booking">
        <form class="research-bar" action="<?php echo get_bloginfo('url').'/booking';?>" method="POST">
            <div class="research-bar__item">
                <select class="research-bar__item--input gites" name="gites">
                    <option value="la-chapelle">La Chapelle</option>
                    <option value="la-passerelle">La Passerelle</option>
                </select>
            </div>
            <div class="research-bar__item">
                <input class="research-bar__item--input date" type="text" name="check-in" id="check-in" placeholder="Date d'arrivée" />
            </div>
            <div class="research-bar__item">
                <input class="research-bar__item--input date" type="text" name="check-out" id="check-out" placeholder="Date de départ" />
            </div>
            <div class="research-bar__item">
                <input class="research-bar__item--input people" type="text" name="people" id="people" placeholder="Personnes" />
            </div>  
            <div class="research-bar__item button">
                <input type="submit" id="rechercher" value="Rechercher" />
            </div>
        </form>

        
        <div>
        <?php if($_POST):
                $checkin = $_POST['check-in'];
                $checkout = $_POST['check-out'];
                $persons = $_POST['people'];

                $checkin = date("Y-m-d", strtotime($checkin));
                $checkout = date("Y-m-d", strtotime($checkout));
            endif;?>
        </div>
    </div>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script>
    jQuery(document).ready(function($){
        $("#check-in, #check-out").datepicker({ dateFormat: 'dd/mm/yy' });
    });
    </script>
    
    <span class="rotate-reverse cta-hero">
        <?php get_template_part( 'templates-parts/cta-reservation' );?>
    </span>
</section>

<?php if(!$_POST): ?>
<section id="card-gites">
    <div class="container columns nomobile">
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

    <div class="container nodesktop">
        <div class="swiper swiper-card">
            <div class="swiper-wrapper">
                <?php 
                    if(have_rows('services')):
                        while(have_rows('services')): the_row();
                            $bg = get_sub_field('background_service');
                            $nom = get_sub_field('nom_service');
                            $cta = get_sub_field('lien_service');
                        ?>

                            <div class="swiper-slide card" style="background:url('<?php echo $bg['url'];?>');"> 
                                <div class="content from-bottom">
                                    <p>Découvrir</p>
                                    <h2><?php echo $nom;?></h2>
                                </div>
                            </div>

                        <?php endwhile;
                endif;?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'templates-parts/separator/tiny-separator' );?>
<?php get_template_part( 'templates-parts/section-aubel' );?>   
<?php get_template_part( 'templates-parts/section-citation' );?>
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
<?php get_template_part( 'templates-parts/separator/tiny-separator' );?>

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
        $cta = get_field('cta-gle-separator');
    
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
        <a href="" class="cta-border">En images</a>
    </div>
</section>

<?php get_template_part( 'templates-parts/section-bannerfullwidth' );?>
<?php get_template_part( 'templates-parts/contact' );?>

<?php endif;?>

<?php get_footer();?>