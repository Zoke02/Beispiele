// Menu Animations.
var menuSlideSpeed = 'slow';
var menuMouseoverSpeed = 400;

$(document).ready(function () {
	$('#menu-categories').on('click', function () {
		$('.default-hide-categories').slideToggle(menuSlideSpeed);
	});
	$('#menu-categories').on('click', function () {
		$('.default-hide-user').hide();
	});
});
$(document).ready(function () {
	$('#menu-user').on('click', function () {
		$('.default-hide-user').slideToggle(menuSlideSpeed);
	});
	$('#menu-user').on('click', function () {
		$('.default-hide-categories').hide();
	});
});

$(document).ready(function () {
	$('.default-hide-categories').on('mouseleave', function () {
		$('.default-hide-categories').slideUp(menuMouseoverSpeed);
	});
	$('.default-hide-user').on('mouseleave', function () {
		$('.default-hide-user').slideUp(menuMouseoverSpeed);
	});
});

// More.. and Less.. Animation.
$(document).ready(function () {
	var moreText = 'More Info...';
	var lessText = 'Less Info...';
	$('.btn-slide').click(function () {
		event.preventDefault();
		if ($(this).hasClass('less')) {
			$(this).removeClass('less');
			$(this).html(moreText);
		} else {
			$(this).addClass('less');
			$(this).html(lessText);
		}
		$('html').animate(
			{
				scrollTop: $(this).parent().offset().top - 18,
			},
			600 // Speed
		);

		$(this).prev().slideToggle('slow');

		return false;
	});
});

// Search
var searchCardsSlideSpeed = 500;

$(document).ready(function () {
	$('#search-field').keyup(function () {
		var input = $('#search-field').val().toUpperCase();
		var cards = $('.card');
		cards.each(function () {
			var card = $(this);
			var cardTitle = card.find('.card__title');
			var txtValue = cardTitle.text();
			var cardCategorie = card.find('.card__categorie');
			var txtValueCategorie = cardCategorie.text();
			if (
				txtValue.toUpperCase().indexOf(input) > -1 ||
				txtValueCategorie.toUpperCase().indexOf(input) > -1
			) {
				card.fadeIn(searchCardsSlideSpeed);
			} else {
				card.fadeOut(searchCardsSlideSpeed);
			}
		});
	});
});

// About Me Slide.
$(document).ready(function () {
	if (top.location.pathname === '/A2Z/admin/aboutus.php') {
		$(window).on('load', function () {
			$('html').animate(
				{
					scrollTop: $('.about-me').parent().offset().top + 20,
				},
				300 // Speed
			);
		});
		return false;
	}
});
