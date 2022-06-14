mapboxgl.accessToken = 'pk.eyJ1Ijoic214LWgiLCJhIjoiY2wyYnIzb2hhMDcxczNnbnUwM2JybWEycCJ9.maLN6epu6rxhLZHa7RmRdA';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v10',
    center: [19.944544, 50.049683],
    zoom: 12
});

const places = {
    features: [
        {
            type: 'Feature',
            geometry: {
                type: 'Point',
                coordinates: [-77.032, 38.913]
            },
            properties: {
                title: 'Mapbox',
                description: 'Washington, D.C.'
            }
        }
    ]
};


// add markers to map
for (const feature of places) {
    // create a HTML element for each feature
    const el = document.createElement('div');
    el.className = 'marker';

    // make a marker for each feature and add to the map
    new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map);
}