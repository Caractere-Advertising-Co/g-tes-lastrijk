<?php 
/* Template Name: Booking */

get_header();

if($_POST):
    $checkin = $_POST['check-in'];
    $checkout = $_POST['check-out'];
    $persons = $_POST['people'];

    $checkin = date("d-m-Y", strtotime($checkin));
    $checkout = date("d-m-Y", strtotime($checkout));
endif;

$surtitre = get_field('surtitre');
$titre = get_field('titre');

$bg_header = get_field('bg_header');

if(!$bg_header):
    $bg_url = get_template_directory_uri(  ).'/assets/images/bg-default.jpg';
else :
    $bg_header = get_field('bg_header');
    $bg_url = $bg_header['url'];
endif;
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


<section id="booking-search">
    <div class="container">
        <?php echo do_shortcode( '[vikbooking category_id="" view="vikbooking" lang="*"]' );?>
    </div>
</section>

<?php get_footer();?>