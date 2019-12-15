
//Show hidden elements on button click
function showElements(container) {

    // console.log( container.querySelectorAll('.hide').length );

    container.querySelectorAll('.hide').forEach(function(el) {
        el.classList.remove('hide');
        event.preventDefault();
    });

}

function bindSeeMoreButtons() {
    function bindClick() {
        return function() {
            showElements( this.parentNode.parentNode );
        };
    }

    var buttons = document.getElementsByClassName('button see-more');
    for ( var i = 0; i < buttons.length; i++ ) {
        buttons[i].addEventListener("click", bindClick(i));
    }
}
bindSeeMoreButtons();


//Simple carousell/slider
var slideIndex = 0;
function prevNext(slider, rel) {
    var slides = slider.getElementsByClassName('slide');

    for ( var i = 0; i < slides.length; i++ ) {
        slides[i].classList.add('hide');
    }

    if ( rel === 'prev' ) {
        if ( slideIndex <= 0 ) {
            slideIndex = slides.length - 1;
        } else {
            slideIndex -= 1;
        }

    } else if (rel === 'next' ) {
        if ( slideIndex >= slides.length - 1 ) {
            slideIndex = 0;
        } else {
            slideIndex += 1;
        }
    }

    //console.log(slideIndex);
    slides[slideIndex].classList.remove('hide');
    event.preventDefault();

}

function startSlider(slider) {

    slider = document.getElementById(slider);

    function bindClick() {
        return function() {
            prevNext( slider, this.attributes.rel.value );
        };
    }

    if ( typeof(slider) !== 'undefined' && slider !== null ) {

        var buttonsArray = slider.getElementsByClassName('prev-next')[0].getElementsByTagName('A');
        for ( var i = 0; i < buttonsArray.length; i++ ) {
            buttonsArray[i].addEventListener("click", bindClick(i));
        }
    }
}

startSlider('events');
startSlider('testimonials');
startSlider('our-history');
