$(document).ready(function() {

    let $slide = $('.slide'); // slides
    let $indexSlide = $slide.length - 1; // number of slides
    let i = 0; // iterator
    let $activeSlide = $slide.eq(i); // active slide has index i
    $activeSlide.css('display', 'block'); // display only active slide

    launchTimeline();

    let $animation;

    $('#slider-next').click(function(event) {
        nextSlide();
    });

    $('#slider-prev').click(function(event) {
        previousSlide();
    });

    function nextSlide() {
        i++; 

        if (i > $indexSlide) { // if index > number of slide, we return to the start
            i = 0;
        };

        changeSlide();

        clearTimeout($animation); // cancel setTimeout
        slideLoop(); // restart setTimeout

        $('#timeline').stop();
        $('#timeline').css('width', 0);
        launchTimeline(); // restart progress bar
    };

    function previousSlide() {
        i--;

        if (i < 0) { // we return to the last slide
            i = $indexSlide;
        };

        changeSlide();

        clearTimeout($animation); 
        slideLoop();

        $('#timeline').stop(); 
        $('#timeline').css('width', 0);
        launchTimeline();
    };

    function slideLoop() {
        $animation = setTimeout(function() {

            if (i < $indexSlide) { 
                i++;
            }
            else {
                i = 0;
            };

            changeSlide();

            slideLoop(); // restart loop

            launchTimeline(); // restart progress bar

        }, 5000); // every 5 seconds
    };

    function changeSlide() {
        $activeSlide.fadeOut(1000); // make slowly disappear the active slide
        $activeSlide = $slide.eq(i); // change index
        $activeSlide.fadeIn(1000); // make slowly appear the slide with new index
    }

    function launchTimeline() { // launch progress bar
        let percent = $('#timeline').attr('data-percent');
        $('#timeline').animate( {
            width: percent
        },5000, 'linear', function() {
            $('#timeline').css('width', 0); // once the animation complete, we return to 0
        });
    };

    slideLoop(); // first call
});