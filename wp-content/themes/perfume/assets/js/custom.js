/**
*  @author    Daniel Domzalski
*  @copyright 2015-2017 Daniel Domzalski. All Rights Reserved.
*/

/* ------Przeładowanie strony ----------- */
$(window).load(function() {$(".dd-loading-background").fadeOut("slow");})
/* ----------- End Przeładowanie strony ----------- */

/* slider dla nowych produktów*/
	
	var slidernew = $("#new-carousel");
	slidernew.owlCarousel({
		autoPlay:true,
		items : 5, // ilość wyświetlanych produktów na jednej stronie
		itemsDesktop : [1199,3], 
		itemsDesktopSmall : [991,2], 
		itemsTablet: [769,2], 
		itemsMobile : [479,1]  
	});

// Ustawienie zdarzeń nawigacji (strzałek)
	$(".slider_new_next").click(function(){
		slidernew.trigger('owl.next');
	})
	$(".slider_new_prev").click(function(){
		slidernew.trigger('owl.prev');
	});
	
	/* --------- Smartblog ------- */

	var smartblog = $("#smartblog-carousel");
      smartblog.owlCarousel({	
		 autoPlay:true,
     	 items :3, 
     	 itemsDesktop : [1200,3], 
     	 itemsDesktopSmall : [991,2], 
     	 itemsTablet: [767,2], 
     	 itemsMobile : [480,1] 
      });
	  
	   // Ustawienie zdarzeń nawigacji (strzałek)
      $(".smartblog_next").click(function(){
        smartblog.trigger('owl.next');
      })

      $(".smartblog_prev").click(function(){
        smartblog.trigger('owl.prev');
      })
/* ----------- Koniec Smartblog ----------- */	

/* slider dla Manufacture */
	 var manufactureslider = $("#manufacture-slider");
         manufactureslider.owlCarousel({
     	 items : 7, // ilość wyświetlanych produktów na jednej stronie
// przyjmuje false (brak automatycznego przewijania) lub liczbę milisekund, pomiędzy przewijaniem,
		 stopOnHover: true, // zatrzymanie elementu po najechaniu kursorem,
		 scrollPerPage : true,
     	 itemsDesktop : [1199,6], 
     	 itemsDesktopSmall : [991,4],
     	 itemsTablet: [769,3], 
     	 itemsMobile : [479,2] 
      });
	  
// Ustawienie zdarzeń nawigacji (strzałek)
      $(".manufacture_next").click(function(){
        manufactureslider.trigger('owl.next');})
		
      $(".manufacture_prev").click(function(){
        manufactureslider.trigger('owl.prev');});


/* slider Produktów */		
	var sliderzdjecia = $("#carousel_imageproduct");
	sliderzdjecia.owlCarousel({
		items: 1, // ilość wyświetlanych produktów na jednej stronie
		itemsDesktop : [1199,1], 
		itemsDesktopSmall : [991,1], 
		itemsTablet: [769,1], 
		itemsMobile : [479,1] 
	});
// Ustawienie zdarzeń nawigacji (strzałek)
	$(".zdjecia_next").click(function(){
		sliderzdjecia.trigger('owl.next');
	})
	$(".zdjecia_prev").click(function(){
		sliderzdjecia.trigger('owl.prev');
	});	

	var sliderzdjecia_min = $("#min_carousel_imageproduct");
	sliderzdjecia_min.owlCarousel({
		items: 5, // ilość wyświetlanych produktów na jednej stronie
		itemsDesktop : [1199,3], 
		itemsDesktopSmall : [991,2], 
		itemsTablet: [769,2], 
		itemsMobile : [479,1] 
	});
// Ustawienie zdarzeń nawigacji (strzałek)
	$(".min_zdjecia_next").click(function(){
		sliderzdjecia_min.trigger('owl.next');
	})
	$(".min_zdjecia_prev").click(function(){
		sliderzdjecia_min.trigger('owl.prev');
	});			
		
		
/* slider dla produktów popularnych */
	
	var sliderfeature = $("#feature-carousel");
	sliderfeature.owlCarousel({
		items : 5, // iprzyjmuje liczbę elementów wyświetlanych w jednym czasie na ekranie (elementy są automatycznie skalowane),
// przyjmuje false (brak automatycznego przewijania) lub liczbę milisekund, pomiędzy przewijaniem,
		stopOnHover: true, // zatrzymanie elementu po najechaniu kursorem,
		scrollPerPage : true,
		itemsDesktop : [1199,3], 
		itemsDesktopSmall : [991,3], 
		itemsTablet: [769,2], 
		itemsMobile : [479,1] 
	});
	
	$(".sliderfeature_next").click(function(){
		sliderfeature.trigger('owl.next');
	})
	$(".sliderfeature_prev").click(function(){
		sliderfeature.trigger('owl.prev');
	});

/* slider dla produktów bestseller*/
	
	var sliderbestseller = $("#bestseller-carousel");
	sliderbestseller.owlCarousel({
		items : 5, // ilość wyświetlanych produktów na jednej stronie
 // przyjmuje false (brak automatycznego przewijania) lub liczbę milisekund, pomiędzy przewijaniem,
		stopOnHover: true, // zatrzymanie elementu po najechaniu kursorem,
	    scrollPerPage : true,
		itemsDesktop : [1199,3], 
		itemsDesktopSmall : [991,3], 
		itemsTablet: [769,2], 
		itemsMobile : [479,1]  
	});

// Ustawienie zdarzeń nawigacji (strzałek)
	$(".slider_bestseller_next").click(function(){
		sliderbestseller.trigger('owl.next');
	})
	$(".slider_bestseller_prev").click(function(){
		sliderbestseller.trigger('owl.prev');
	});
	

/* slider dla produktów w produktach tej samej kategorii*/
	
	var sliderproductscategory = $("#productscategory-carousel");
	sliderproductscategory.owlCarousel({
		items : 5, // ilość wyświetlanych produktów na jednej stronie
 // przyjmuje false (brak automatycznego przewijania) lub liczbę milisekund, pomiędzy przewijaniem,
		stopOnHover: true, // zatrzymanie elementu po najechaniu kursorem,
	    scrollPerPage : true,
		itemsDesktop : [1199,3], 
		itemsDesktopSmall : [991,3], 
		itemsTablet: [769,2], 
		itemsMobile : [479,1] 
	});

// Ustawienie zdarzeń nawigacji (strzałek)
	$(".slider_productscategory_next").click(function(){
		sliderproductscategory.trigger('owl.next');
	})
	$(".slider_productscategory_prev").click(function(){
		sliderproductscategory.trigger('owl.prev');
	});
	
/* slider dla miniatur produktow w szybkim podgladzie*/

function thumbnailCarousel(sliderId){
	var thumbnail = $(sliderId);
      thumbnail.owlCarousel({
     	 items : 4,	 
     	 itemsDesktop : [1199,3], 
     	 itemsDesktopSmall : [991,3], 
     	 itemsTablet: [850,2], 
     	 itemsMobile : [320,1] 
      });

      $(".slider_thumb_next").click(function(){
        thumbnail.trigger('owl.next');
      })
      $(".slider_thumb_prev").click(function(){
        thumbnail.trigger('owl.prev');
      });
}



/* slider dla miniatur produktow na karcie produktu*/
	var thumbnailcarousel = $("#thumbnailCarousel");
	thumbnailcarousel.owlCarousel({
		items : 4, 
		itemsDesktop : [1199,4], 
		itemsDesktopSmall : [991,2], 
		itemsTablet: [760,3], 
		itemsMobile : [400,2] 
	});

// Ustawienie zdarzeń nawigacji (strzałek)
	$(".slider_thumb_next").click(function(){
		thumbnailcarousel.trigger('owl.next');
	})
	$(".slider_thumb_prev").click(function(){
		thumbnailcarousel.trigger('owl.prev');
	});
	
/* slider dla produktów kupionych również*/
	
	var slidercrosseling = $("#crosseling-carousel");
	slidercrosseling.owlCarousel({
		items : 5, // ilość wyświetlanych produktów na jednej stronie
 // przyjmuje false (brak automatycznego przewijania) lub liczbę milisekund, pomiędzy przewijaniem,
		stopOnHover: true, // zatrzymanie elementu po najechaniu kursorem,
		scrollPerPage : true,
		itemsDesktop : [1199,3], 
		itemsDesktopSmall : [991,3], 
		itemsTablet: [769,2], 
		itemsMobile : [479,1] 
	});

// Ustawienie zdarzeń nawigacji (strzałek)
	$(".slidercrosseling_next").click(function(){
		slidercrosseling.trigger('owl.next');
	})
	$(".slidercrosseling_prev").click(function(){
		slidercrosseling.trigger('owl.prev');
	});
	
/* slider dla produktów powiązanych*/
	
	var slideraccessory = $("#accessory-carousel");
	slideraccessory.owlCarousel({
		items : 5, // ilość wyświetlanych produktów na jednej stronie
// przyjmuje false (brak automatycznego przewijania) lub liczbę milisekund, pomiędzy przewijaniem,
		stopOnHover: true, // zatrzymanie elementu po najechaniu kursorem,
	    scrollPerPage : true,
		itemsDesktop : [1199,3], 
		itemsDesktopSmall : [991,3], 
		itemsTablet: [769,2], 
		itemsMobile : [400,1] 
	});

// Ustawienie zdarzeń nawigacji (strzałek)
	$(".slideraccessory_next").click(function(){
		slideraccessory.trigger('owl.next');
	})
	$(".slideraccessory_prev").click(function(){
		slideraccessory.trigger('owl.prev');
	});		


	// Add/Remove acttive class on menu active in responsive  
	$('#menu-icon').on('click', function() {
		$(this).toggleClass('active');
	});
	
	$('input[name="email"], #search_widget input[type="text"]').focus(function(){
		$(this).data('placeholder',$(this).attr('placeholder')).attr('placeholder','');
	}).blur(function(){
		$(this).attr('placeholder',$(this).data('placeholder'));
	});
	
	
	$('.search_button').click(function(event){			
		$(this).toggleClass('active');		
		event.stopPropagation();		
		$('.search_toggle').toggle();		
		$( ".search-widget form input[type=text]" ).focus();
	
	});
	
	$(".search_toggle").on("click", function (event) {
		event.stopPropagation();	
	});
		
/* Lista Siatka / Produktów */	  
$(document).ready(function(){
	bindGrid();
});

function bindGrid()
{
	var view = $.totalStorage("display");
	if (view && view != 'grid')
		display(view);
	else
		$('.display').find('li#grid').addClass('selected');
	$(document).on('click', '#grid', function(e){
		e.preventDefault();
		display('grid');
	});
	$(document).on('click', '#list', function(e){
		e.preventDefault();
		display('list');		
	});	
}

function bindGrid()
{
	var view = $.totalStorage("display");
	if (view && view != 'grid')
		display(view);
	else
		$('.display').find('li#grid').addClass('selected');
	$(document).on('click', '#grid', function(e){
		e.preventDefault();
		display('grid');
	});
	$(document).on('click', '#list', function(e){
		e.preventDefault();
		display('list');		
	});	
}

function display(view)
{
	if (view == 'list')
	{
		$('#products ul.product_list').removeClass('grid').addClass('list');
		$('#products .product_list > li').removeClass('col-xs-12 col-sm-6 col-md-6 col-lg-3').addClass('col-xs-12');
		$('#products .product_list > li').each(function(index, element) {
			
				var html = '';
				html = '<div class="product-miniature js-product-miniature" data-id-product="'+ $(element).find('.product-miniature').data('id-product') +'" data-id-product-attribute="'+ $(element).find('.product-miniature').data('id-product-attribute') +'" itemscope itemtype="http://schema.org/Product">';
				html += '<div class="thumbnail-container col-md-2-5">' + $(element).find('.thumbnail-container').html() + '</div>';
				html += '<div class="product-description center-block col-xs-4 col-xs-7 col-md-7-5">';
				html += '<h3 class="h3 product-title" itemprop="name">'+ $(element).find('h3').html() + '</h3>';
				
				var price = $(element).find('.product-price-and-shipping').html();
				if (price != null) 
				{html += '<div class="product-price-and-shipping">'+ price + '</div>';}
				html += '<div class="product-detail">'+ $(element).find('.product-detail').html() + '</div>';

				var colorList = $(element).find('.highlighted-informations').html();
				if (colorList != null) 
				{html += '<div class="highlighted-informations">'+ colorList +'</div>';}			
		html += '</div>';
		$(element).html(html);
		});
		$('.display').find('li#list').addClass('selected');
		$('.display').find('li#grid').removeAttr('class');
		$.totalStorage('display', 'list');
	}
	else
	{
		$('#products ul.product_list').removeClass('list').addClass('grid');
		$('#products .product_list > li').addClass('col-xs-12').addClass('col-sm-6 col-md-6 col-lg-3');
		$('#products .product_list > li').each(function(index, element) {
		
		var html = '';
		html += '<article class="product-miniature js-product-miniature" data-id-product="'+ $(element).find('.product-miniature').data('id-product') +'" data-id-product-attribute="'+ $(element).find('.product-miniature').data('id-product-attribute') +'" itemscope itemtype="http://schema.org/Product">';
			html += '<div class="thumbnail-container">' + $(element).find('.thumbnail-container').html() +'</div>';
			
				html += '<div class="product-description">';
				html += '<h3 class="h3 product-title" itemprop="name">'+ $(element).find('h3').html() +'</h3>';
				var price = $(element).find('.product-price-and-shipping').html();
				if (price != null) 
				{html += '<div class="product-price-and-shipping">'+ price + '</div>';}

				html += '<div class="product-detail">'+ $(element).find('.product-detail').html() + '</div>';		
				html += '</div>';
				
				var colorList = $(element).find('.highlighted-informations').html();
				if (colorList != null) 
				{html += '<div class="highlighted-informations">'+ colorList +'</div>';}

		html += '</article>';
		$(element).html(html);
		});
		$('.display').find('li#grid').addClass('selected');
		$('.display').find('li#list').removeAttr('class');
		$.totalStorage('display', 'grid');
	}
}
/* Koniec Lista / Siatka Produktów */	  

/* Wyszukiwarka */	  

$(document).ready(function () {
    var $searchWidget = $('#search_widget');
    var $searchBox    = $searchWidget.find('input[type=text]');
    var searchURL     = $searchWidget.attr('data-search-controller-url');

    $.widget('prestashop.psBlockSearchAutocomplete', $.ui.autocomplete, {
        _renderItem: function (ul, product) {
            return $("<li>")
                .append($("<a>")
                    .append($("<span>").html(product.category_name).addClass("category"))
                    .append($("<span>").html(' > ').addClass("separator"))
                    .append($("<span>").html(product.name).addClass("product"))
                ).appendTo(ul)
            ;
        }
    });

    $searchBox.psBlockSearchAutocomplete({
        source: function (query, response) {
            $.get(searchURL, {
                s: query.term,
                resultsPerPage: 10
            }, null, 'json')
            .then(function (resp) {
                response(resp.products);
            })
            .fail(response);
        },
        select: function (event, ui) {
            var url = ui.item.url;
            window.location.href = url;
        },
    });
});


// Funkcja animacji przycisku powrotu do góry strony
 $(function(){
    var stt_is_shown = false;
    $(window).scroll(function(){
       var win_height = 300; // odliczenie pikseli od góry pojawienia się przycisku
       var scroll_top = $(document).scrollTop(); 
       if (scroll_top > win_height && !stt_is_shown) {
          stt_is_shown = true;
          $("#do_gory").fadeIn();
       } else if (scroll_top < win_height && stt_is_shown) {
          stt_is_shown = false;
          $("#do_gory").fadeOut();
       }
   });
   $("#do_gory").click(function(e){
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, 1500); // czas animacji 1500 ms
    });
 });
 // Koniec animacji przycisku powrotu do góry strony 
 
  // Funkcja przesunięcia głównego menu do góry i zniknięcia menu standardowo ustawionego (musi być dodana klasa fixed_menu w global.css) 
		$(window).scroll(function() {    
			$(".belka").removeClass("fixed_menu");

			var scroll = $(window).scrollTop();
			if (scroll > 50) {
				$(".belka").addClass("fixed_menu");
				$(".belka").addClass("fixed_menuani");
			}
		});
		
		  // Funkcja przesunięcia głównego menu do góry i zniknięcia menu standardowo ustawionego (musi być dodana klasa fixed_menu w global.css) 
		$(window).scroll(function() {    

			var scroll = $(window).scrollTop();

			if (scroll > 50) {
				$(".belka").addClass("fixed_menu_animation");
			}
			
			if (scroll < 50) {
			$(".belka").removeClass("fixed_menu_animation");}
		});
	  
