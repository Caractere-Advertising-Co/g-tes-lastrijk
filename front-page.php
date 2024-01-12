<?php 
 /* gites \ gite_description \ galerie_gites \ banner_arriere_plan */ 

 $title = get_field('titre_informations_reservations','option');
 $telephone = get_field('telephone','option');
 $email = get_field('email','option');
 $adresse = get_field('adresse','option');

 $logo = get_field('logo','option');
 $banner = get_field('banner_arriere_plan');

 $galerie = get_field('galerie_gites');
 $gites = get_field('gites');
?>

<?php get_header();?>

<div>
    <div class="top_window">
        <img src="<?php echo $banner['sizes']['large'];?>" alt="<?php echo $banner['name'];?>"/>
    </div>
    <div class="bottom_row container">
        <div class="swiper-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php $slider = get_field('galerie_gites');?>

                    <?php foreach($slider as $slide) :?>
                        <div class="swiper-slide">
                            <img src="<?php echo $slide['sizes']['large']; ?>" alt="<?php echo $slide['name']; ?>"/>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="content">
            <img src="<?php echo $logo['sizes']['large'];?>" height="100"/>
            <ul class="liste_gites">
            <?php if(have_rows('gites')) :
                while(have_rows('gites')) : the_row(); ?>
                    <li><?php echo get_sub_field('gite_description');?></li>
                <?php endwhile;
            endif ;?>
            </ul>

            <div class="contact">
                <h2><?php echo $title;?></h2>
                <ul>
                    <li><?php echo $telephone;?></li>
                    <li><a href="<?php echo $email;?>"><?php echo $email;?></a></li>
                </ul>
                <span class="adresse"><?php echo $adresse;?></span>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>