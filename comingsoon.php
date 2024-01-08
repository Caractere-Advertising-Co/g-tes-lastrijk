<?php 
 /* Template Name: Coming soon */

 $title = get_field('option','titre');
 $logo = get_field('option','logo');
 $banner = get_field('banner_arriere_plan');
?>

<div>
    <div class="top_window" style="background:url('<?php echo $banner['sizes']['large'];?>') no-repeat;">
    </div>
    <div class="bottom_row">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                </div>
            </div>
        </div>
    </div>
</div>