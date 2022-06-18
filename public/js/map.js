mapboxgl.accessToken = 'pk.eyJ1Ijoic214LWgiLCJhIjoiY2wyYnIzb2hhMDcxczNnbnUwM2JybWEycCJ9.maLN6epu6rxhLZHa7RmRdA';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/smx-h/cl2br8rza000d14mj8wj1wwn7',
    center: [19.944544, 50.049683],
    zoom: 13
});

const places = [
        {
                coordinates: [19.944544, 50.049683],
                title: 'Mapbox',
                description: 'Washington, D.C.'
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
    console.log(places)
    placeMarkers(places);
});

// add markers to map
function placeMarkers(places) {
    for (const feature of places) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el)
            .setLngLat(feature.coordinates)
            .setPopup(
                new mapboxgl.Popup({ offset: 25 }) // add popups
                    .setHTML(
                        `<h3>${feature.title}</h3><p>${feature.description}</p>`
                    )
            )
            .addTo(map);
    }
}

const geocoder = new MapboxGeocoder({
    // Initialize the geocoder
    accessToken: mapboxgl.accessToken, // Set the access token
    mapboxgl: mapboxgl, // Set the mapbox-gl instance
    marker: false, // Do not use the default marker style
    container: 'search_here',
});

map.addControl(geocoder,"top-left");
