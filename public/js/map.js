mapboxgl.accessToken = 'pk.eyJ1Ijoic214LWgiLCJhIjoiY2wyYnIzb2hhMDcxczNnbnUwM2JybWEycCJ9.maLN6epu6rxhLZHa7RmRdA';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v10',
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


// add markers to map
for (const feature of places) {
    // create a HTML element for each feature
    const el = document.createElement('div');
    el.className = 'marker';

    // make a marker for each feature and add to the map
    new mapboxgl.Marker(el)
        .setLngLat(feature  .coordinates)
        .setPopup(
            new mapboxgl.Popup({ offset: 25 }) // add popups
                .setHTML(
                    `<h3>${feature.title}</h3><p>${feature.description}</p>`
                )
        )
        .addTo(map);
}

