// MENU
// Define our viewportWidth variable
var viewportWidth;

// Set/update the viewportWidth value
var setViewportWidth = function () {
	viewportWidth = window.innerWidth || document.documentElement.clientWidth;
};

var openMenu = function(menu, button) {
    if (viewportWidth < 1025) {
        menu.classList.toggle('open');
        button.classList.toggle('open');
        // event.preventDefault();
    }
};
function setMenu() {
    var menu = document.getElementById('main-nav');
    var button = menu.querySelector('a.menu');
    var item = menu.querySelector('li.menu-item');

    function bindClick() {
        return function() {
            setViewportWidth();
            openMenu( menu, button );
        };
    }

    button.addEventListener('click', bindClick());
    item.addEventListener('click', bindClick());
}

setViewportWidth();
setMenu();

//Sidebar Menu
/*if (viewportWidth > 1420) {
    var sbMenuToggle = document.querySelector("#sbMenuToggle");
    var sbMenu = document.querySelector("#sbMenu");

    sbMenuToggle.addEventListener("click", function(){
        sbMenuToggle.classList.toggle("open");
        sbMenu.classList.toggle("open");
    });
}*/

// On resize events, recalculate and log
window.addEventListener('resize', function () {
	setViewportWidth();
}, false);

// SEE MORE
// Show hidden elements on button click
function showElements(button, container) {

    // console.log();

    var buttonText = button.innerHTML;

    var elements = container.querySelectorAll('.block');

    if ( button.classList.contains('active') ) {

        elements.forEach(function(el) {

            if ( !el.classList.contains('show') ) {
                el.classList.add('hide');
            }

        });

        button.innerHTML = buttonText.replace('less', 'more');

    } else {

        elements.forEach(function(el) {
            el.classList.remove('hide');
        });

        button.innerHTML = buttonText.replace('more', 'less');

    }

    button.classList.toggle('active');
    event.preventDefault();

}

function bindSeeMoreButtons() {
    function bindClick() {
        return function() {
            showElements(this, this.parentNode.parentNode );
        };
    }

    var buttons = document.getElementsByClassName('button see-more');
    for ( var i = 0; i < buttons.length; i++ ) {
        buttons[i].addEventListener('click', bindClick(i));
    }
}
bindSeeMoreButtons();


// SIMPLE SLIDER
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
            buttonsArray[i].addEventListener('click', bindClick(i));
        }
    }
}

// startSlider('events');
startSlider('testimonials');
startSlider('our-history-phases');

// DROPDOWN BLOCKS
function openDropDown( block ) {
    // console.log(block);
    if ( block.classList.contains('active') ) {
        block.classList.remove('active');
    } else {
        block.classList.add('active');
    }

}

function startDropdown(dropdown) {

    dropdown = document.getElementById(dropdown);

    function bindClick() {
        return function() {
            openDropDown( this.closest('.block') );
        };
    }

    if ( typeof(dropdown) !== 'undefined' && dropdown !== null ) {

        var buttonsArray = dropdown.getElementsByClassName('block-header');
        for ( var i = 0; i < buttonsArray.length; i++ ) {
            buttonsArray[i].addEventListener('click', bindClick(i));
        }
    }
}

startDropdown('faq');

// SEARCH TABS
var searchOrFilter = function(){};
var bindSofTabs = function(){};

if ( document.body.classList.contains('page-template-page-our-work-search') ) { // Load only on specific page

	// Show hidden blocks on tab click
	searchOrFilter = function(tab) {

	    var sof = document.getElementById('searchOrFilter');
		var sofBlocks = sof.querySelectorAll('section');

		sofBlocks[0].classList.remove('active');
		sofBlocks[1].classList.remove('active');

		if ( tab.classList.contains('search') ) {
			sofBlocks[0].classList.add('active');
		}
		if ( tab.classList.contains('filter') ) {
			sofBlocks[1].classList.add('active');
		}

	};

	bindSofTabs = function() {
		var sofTabs = document.getElementById('searchOrFilterTabs');
		var tabs = sofTabs.querySelectorAll('.button');
		var close = document.getElementById('closeSearchOrFilter');

	    function bindClick() {
	        return function() {
	            searchOrFilter(this);
	        };
	    }

	    for ( var i = 0; i < tabs.length; i++ ) {
	        tabs[i].addEventListener('click', bindClick(i));
	    }
		close.addEventListener('click', bindClick());
	};

	bindSofTabs();

}
