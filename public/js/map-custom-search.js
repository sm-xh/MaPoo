$(document).ready(function() {
    $('.mapboxgl-ctrl-geocoder .mapboxgl-ctrl').hide();
    $('#autocomplete-placeholder').css('display', 'inline');
});


$(".mapboxgl-ctrl-geocoder").appendTo("#autocomplete-placeholder");


var elements = $("body").find("[aria-label='Search']");
console.log(elements);
$(elements).attr('name', 'location-from-search');