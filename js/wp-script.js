/*
Author: @jorgalga 
Description: JS file to manage the WP actions one the DOM is ready
*/
//Disabling Console.log
//console.log = function() {};

//jQuery(document).ready(function($) {
$( document ).ready(function() {
    console.log("DOM ready");
    var ajaxurl = window.location.origin + "/wp-admin/admin-ajax.php";
    
    
    //Menu cross animation
    $('.navbar-toggle').click(function(){
        console.log("clic!!");
		$(this).find("#nav-icon3").toggleClass('open');
        $(window).trigger('resize.px.parallax');
	});
    $('#myNavbar').on('hidden.bs.collapse', function () {
        $(window).trigger('resize.px.parallax');
    });
     $('#myNavbar').on('shown.bs.collapse', function () {
        $(window).trigger('resize.px.parallax');
    });
    
    $('#carousel-example-1').hammer().on('swipeleft', function () {
         $(this).carousel('next');
    });
    $('#carousel-example-1').hammer().on('swiperight', function () {
        $(this).carousel('prev');
    });

    
    
    
    //Ajax actions
    $('#load-next-posts').on('click', function(){
		// la variable ajaxurl debe estar definida y apuntar a wp-admin/admin-ajax.php
		// en la data enviada con la petición, el parámetro "action" debe coincidir con la detección de la acción en PHP
		$.get( ajaxurl, {
			action: 'get_next_posts',
			offset: 2
		}, function(data){
			
            console.log(data);
            
		}, 'json');
	});


     $(".button-collapse").sideNav();

    
});


function initMap() {
      console.log("gmaps");

      // Specify features and elements to define styles.
      var styleArray = [
        {
          featureType: "all",
          stylers: [
             { hue: "#c70039" },
             /*{ saturation: -100 },*/
             { lightness: -50 } 
          ]
        },
          
        {
          featureType: "road.arterial",
          elementType: "geometry",
          stylers: [
                  { hue: "#ccc" },
          ]
        },{
          featureType: "poi.business",
          elementType: "labels",
          stylers: [
            { visibility: "off" }
          ]
        }
      ];

      // Create a map object and specify the DOM element for display.
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 41.399595, lng:2.198780},
        scrollwheel: false,
        // Apply the map style array to the map.
        styles: styleArray,
        zoom: 18,
        mapTypeId: google.maps.MapTypeId.SATELLITE,
		  disableDefaultUI: true
      });
    }
