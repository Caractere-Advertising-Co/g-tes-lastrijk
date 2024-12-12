<?php 
    $intro        = get_field('introduction');
    $galerieIntro = get_field('galerie-introduction');
    $ctaIntro     = get_field('cta_introduction');
    $img          = get_field('image-flottante');
?>

<section id="section-introduction">
    <div class="clip">
        <div class="container columns">
            <div class="col-g">
                <?php if($img): echo '<div class="block-img"><img src="'.$img['url'].'" alt="'.$img['title'].'"/></div>'; endif;?>
                <?php if($galerieIntro):?>
                    <div class="swiper swiper-resp">
                        <div class="swiper-wrapper">
                            <?php foreach($galerieIntro as $g):?>
                                <div class="swiper-slide img-content">
                                    <img src="<?php echo $g['url'];?>" alt="<?php echo $g['name'];?>" />
                                </div>
                            <?php endforeach;?>
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-d">
                <?php if($intro): echo '<span class="from-bottom">' . $intro . '</span>'; endif;?>
                <?php if($ctaIntro):?><a href="<?php echo $ctaIntro['url'];?>" class="cta from-bottom"><?php echo $ctaIntro['title'];?></a><?php endif;?>
            </div>
        </div>
    </div>

    <?php get_template_part( 'templates-parts/separator/separator-svg');?>
</section>
    