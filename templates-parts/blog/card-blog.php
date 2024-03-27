<?php 

$thmb = get_the_post_thumbnail_url();
$titre = get_field('titre');
$intro = get_field('texte_introduction');

$i = null;

if($args['id']):
    $i = $args['id'];
endif;

?>

<?php if($i % 2):?>
    <div class="card-news -left container columns">
        <div class="col-g">
            <?php if($titre): echo $titre;endif;?>
            <?php if($intro): echo $intro;endif;?>
            <a href="<?php echo the_permalink( );?>" class="cta-border"><?php the_title();?></a>
        </div>

        <div class="col-d">
            <img src="<?php echo $thmb;?>"/>

        </div>
    </div>
<?php else : ?>
    <div class="card-news -right container columns">
        <div class="col-g">
            <img src="<?php echo $thmb;?>"/>

        </div>
        <div class="col-d">
            <?php if($titre): echo $titre;endif;?>
            <?php if($intro): echo $intro;endif;?>
            <a href="<?php echo the_permalink( );?>" class="cta-border"><?php the_title();?></a>
        </div>
    </div>  
<?php endif;?>