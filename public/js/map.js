mapboxgl.accessToken = 'pk.eyJ1Ijoic214LWgiLCJhIjoiY2wyYnIzb2hhMDcxczNnbnUwM2JybWEycCJ9.maLN6epu6rxhLZHa7RmRdA';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/smx-h/cl2br8rza000d14mj8wj1wwn7',
    center: [19.944544, 50.049683],
    zoom: 13
});

const places = [
        {

        }
];


fetch("/places", {
    method: "GET"
}).then(function (response) {
    return response.json();
}).then(function(places) {
    places.map(place => {
        place.coordinates = JSON.parse(place.coordinates).point
    });
    placeMarkers(places);
});

// add markers to map
function placeMarkers(places) {
    for (const feature of places) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';
        feature.details = JSON.parse(feature.details);
        var tick = "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";
        var cross = "<i class=\"fa fa-xmark\"></i>\n";
        var info_box = "<ul>";

        for (var key in feature.details) {
            if (feature.details.hasOwnProperty(key)) {
                if(feature.details[key]=="on"){
                    info_box += "<li>" +  tick + key + "</li>";
                }
                if(feature.details[key]=="off"){
                    info_box += "<li>" + cross + key + "</li>";
                }
            }
        }

        info_box += "</ul>";

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el)
            .setLngLat(feature.coordinates)
            .setPopup(
                new mapboxgl.Popup({ offset: 25 }) // add popups
                    .setHTML(
                        `<h3>${feature.description}</h3>
                            <p>${feature.street} ${feature.house_number} ${feature.city}</p>
                           <p>
                             ${info_box}
                            </p>`
                    )
            )
            .addTo(map);
    }
}


const geocoder = new MapboxGeocoder({
    // Initialize the geocoder
    accessToken: mapboxgl.accessToken, // Set the access token
    mapboxgl: mapboxgl, // Set the mapbox-gl instance
    marker: {

    },
    container: 'search_here',
});

geocoder.on('result', function(e) {
    document.getElementById('hidden-coordinates').value = e.result.center;
})

map.addControl(geocoder,"top-left");
