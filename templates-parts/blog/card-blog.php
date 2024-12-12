<?php

$thmb = get_the_post_thumbnail_url();
$titre = get_field('titre');
$intro = get_field('texte_introduction');

?>

<div class="card-news">
    <div class="block-img">
        <img src="<?php echo $thmb;?>"/>
    </div>

    <div class="txt">
        <?php if($titre): echo $titre;endif;?>
        <?php if($intro):  echo strlen($intro) > 100 ? substr($intro,0,100).'...' : $intro . '...'; endif;?>

        <a href="<?php echo the_permalink( );?>" class="cta-border">Lire</a>
    </div>
</div>
