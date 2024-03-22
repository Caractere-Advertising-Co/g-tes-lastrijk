<?php 
    $color_bg = get_field('arriere_plan-color');
    $img = get_field('image_about','options');
    $intro = get_field('introduction','options');
    $titre = get_field('titre-about-jps','options');
    $btn = get_field('lien_about','options');
?>

<section id="section-introduction">
    <div class="container columns">
        <div class="col-g">
            <?php if($titre): echo '<span class="from-bottom">' . $titre . '</span>'; endif;?>
            <?php if($img):?>
                <div class="img-content from-bottom">
                    <img src="<?php echo $img['url'];?>" alt="<?php echo $img['name'];?>" />
                </div>
            <?php endif;?>
        </div>
        <div class="col-d">
            <?php if($intro): echo '<span class="from-bottom">' . $intro . '</span>'; endif;?>
            <?php if($btn):?><a href="<?php echo $btn['url'];?>" class="cta-border from-bottom"><?php echo $btn['title'];?></a><?php endif;?>
        </div>
    </div>
</section>
    