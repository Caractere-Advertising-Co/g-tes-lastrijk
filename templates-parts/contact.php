<section id="contact">
    <div class="container from-bottom">
        <?php 
            $subtitle = get_field('sub_contact','options');
            $title = get_field('titre-contact','options');
            $texte = get_field('texte-contact','options');
            $form = get_field('shortcode_form','options');
        ?>
        <?php if($subtitle):?><p class="subtitle"><?php echo $subtitle;?></p><?php endif;?>
        <?php if($title):?> <h2><?php echo $title;?></h2><?php endif;?>

        <?php get_template_part( 'templates-parts/separator/horizontal-line' );?>

        <?php if($texte): echo $texte;endif;?>

        <?php if(is_page( 627 )):?>
            <section id="widget-contact">
                <div class="container columns">
                    <?php if(have_rows('widget-contact')):
                        while(have_rows('widget-contact')): the_row();
                            $icone = get_sub_field('icone');
                            $libelle = get_sub_field('libelle');
                            $lien = get_sub_field('lien');

                            if($icone):?>
                                <div class="content-icons columns">
                                    <span class="block-img"><img src="<?php echo $icone['url'];?>" alt="<?php echo $icone['title'];?>"/></span>
                                    <div class="txt-icons">
                                        <p class="subtitle"><?php echo $libelle;?></p>
                                        <?php if($lien):?><a href="<?php echo $lien['url'];?>"><?php echo $lien['title'];?></a><?php endif;?>
                                    </div>
                                </div>
                            <?php endif;
                        endwhile;
                    endif;?>
                </div>
            </section>
        <?php endif;?>

        <?php if($form): echo do_shortcode( $form ); endif;?>
    </div>
</section>