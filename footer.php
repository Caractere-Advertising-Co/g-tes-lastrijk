<?php 

$cttCol1 = get_field('contenu_colonne_1','options');

$titreCol2 = get_field('titre-colonne-2','options');
$gites = get_field('liens-gîtes','options');
$titreCol22 = get_field('titre-colonne-2-2','options');
$liensCol2 = get_field('liens-gîtes_copier','options');

$cttCol2 = get_field('contenu_colonne_2','options');

$cttCol3 = get_field('contenu_colonne_3','options');


if(!is_front_page()):
    get_template_part( 'templates-parts/section-bannerfullwidth' );
endif;?>

<footer>
    <div class="container">
        <div class="footer-top">
            <div class="col general-infos">
                <?php $logo = get_field('logo_footer','options');?>
                
                <?php if($logo):?>
                    <div class="logo-footer">
                        <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['title'];?>" />
                    </div>
                <?php endif;?>
                
                <?php if($cttCol1): echo $cttCol1; endif;?>

            </div>

            <div class="col col-2">
                <?php if($cttCol2): echo $cttCol2;endif;?>
                <?php 
                    if($gites):
                        echo '<ul>';
                        foreach($gites as $g):?>
                            <li><a href="<?php echo $g->guid;?>"><?php echo $g->post_title;?></a></li>
                        <?php endforeach;
                        echo '</ul>';
                    endif;?>
                            
                <?php if($titreCol22): echo '<h4>'.$titreCol22.'</h4>';endif;?>
                <?php 
                    if($liensCol2):
                        echo '<ul>';
                        foreach($liensCol2 as $l):?>
                            <li><a href="<?php echo $l->guid;?>"><?php echo $l->post_title;?></a></li>
                        <?php endforeach;
                        echo '</ul>';
                    endif;?>
            </div>

            <div class="col rs_footer">
                <?php if($cttCol3): echo $cttCol3;endif;?>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container desktop">
            <a href="">Cookies</a>
            <div>
                <?php 
                    $copyright = get_field('copyright','options');
                    if($copyright): echo $copyright; endif;
                ?>
            </div>
            <a href="">Confidentialité</a>
        </div>

        <div class="container mobile">
            <div class="links">
                <a href="">Cookies</a>
                <a href="">Confidentialité</a>
            </div>

            <div class="copyright">
            <?php 
                    $copyright = get_field('copyright','options');
                    if($copyright): echo $copyright; endif;
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>