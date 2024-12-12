$(document).ready(function () {
    $(".marquee-left").marquee({
      // Set to false if you want to use jQuery animate method
      allowCss3Support: true,
      // CSS3 easing function
      css3easing: "linear",
      // Time to wait before starting the animation
      //delayBeforeStart: 1000,
      // 'left', 'right', 'up' or 'down'
      direction: "left",
      // Should the marquee be duplicated to show an effect of continues flow
      duplicated: true,
      // Duration of the animation
      duration: 8000,
      // Space in pixels between the tickers
      gap: 100,
      // The marquee is visible initially positioned next to the border towards it will be moving
      startVisible: true,
    });
  
    $(".marquee-right").marquee({
      // Set to false if you want to use jQuery animate method
      allowCss3Support: true,
      // CSS3 easing function
      css3easing: "linear",
      // Time to wait before starting the animation
      //delayBeforeStart: 1000,
      // 'left', 'right', 'up' or 'down'
      direction: "right",
      // Should the marquee be duplicated to show an effect of continues flow
      duplicated: true,
      // Duration of the animation
      duration: 12000,
      // Space in pixels between the tickers
      gap: 100,
      // The marquee is visible initially positioned next to the border towards it will be moving
      startVisible: true,
    });
});