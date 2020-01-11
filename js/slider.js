$(document).ready(function() {

    let $slide = $('.slide'); // les slides du slider
    let $indexSlide = $slide.length - 1; // le nombre de slides (et leur index)
    let i = 0; // le compteur à 0
    let $activeSlide = $slide.eq(i); // image active : celle qui possède l'index i
    $activeSlide.css('display', 'block'); // on affiche seulement le slide actif

    launchTimeline();

    let $animation;

    $('#slider-next').click(function(event) { // événement clic sur l'image suivante
        nextSlide();
    });

    $('#slider-prev').click(function(event) { // événement clic sur l'image précédente
        previousSlide();
    });

    function nextSlide() {
        i++; // on incrémente l'index

        if (i > $indexSlide) { // si index supérieur au nombre de slide, on revient au début
            i = 0;
        };

        changeSlide();

        clearTimeout($animation); // annule le setTimeout
        slideLoop(); // relance le setTimeout à 0

        $('#timeline').stop(); // arrête l'animation de la barre de progression
        $('#timeline').css('width', 0); // remet le width à 0
        launchTimeline(); // relance la barre de progression
    };

    function previousSlide() {
        i--; // décrémente l'index

        if (i < 0) { // si index inférieur à 0, on passe au dernier slide, si on clique sur l'avant dernier, etc.
            i = $indexSlide;
        };

        changeSlide();

        clearTimeout($animation); // annule le setTimeout
        slideLoop(); // relance le setTimeout à 0

        $('#timeline').stop(); // arrête l'animation de la barre de progression
        $('#timeline').css('width', 0); // remet le width à 0
        launchTimeline(); // relance la barre de progression
    };

    function slideLoop() {
        $animation = setTimeout(function() {

            if (i < $indexSlide) { // si l'index est inférieur au nombre de slides
                i++; // on incrémente (on passe au slide suivant)
            }
            else {
                i = 0; // sinon, on revient au premier slide (dernier slide => premier slide)
            };

            changeSlide();

            slideLoop(); // on relance la fonction pour créer la boucle

            launchTimeline(); // on lance la barre de progression

        }, 5000); // toutes les 5 secondes
    };

    function changeSlide() {
        $activeSlide.fadeOut(1000); // fait disparaître lentement la slide active (remplace $slide.css('display', 'none');)
        $activeSlide = $slide.eq(i); // change l'index
        $activeSlide.fadeIn(1000); // fait apparaître lentement le slide du nouvel index (précédement : $activeSlide.css('display', 'block');)
    }

    function launchTimeline() { // lance la barre de progression
        let percent = $('#timeline').attr('data-percent');
        $('#timeline').animate( {
            width: percent
        },5000, 'linear', function() {
            $('#timeline').css('width', 0); // une fois l'animation complète, on revient à 0
        });
    };

    slideLoop(); // appel une première fois de la fonction
});