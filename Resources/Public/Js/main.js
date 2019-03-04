

/************************ ready; go ***************************/

$( document ).ready( function () {
    //console.log('hello from main.js -- doc ready');
    var map = null;

    initClipboard();

    if ( $( ".sortable" ).length ) {
       // initTablesorter();
    }

    if ( $( "#map-canvas" ).length ) {
        map = initLeaflet();
        if ( $( ".zip-item" ).length ) {
            map = placeMarkers( map );
        }
    }



} );

/**
 * Init clipboard js lib
 * @returns void
 */
var initClipboard = function () {
    new ClipboardJS( '.tx-ool-zip .btn' );

    $( '.toggler' ).on( 'click', function () { // arm all .toggler
        $( '' + $( this ).attr( 'data-target' ) ).toggleClass( 'away' );
    } );

};


var initTablesorter = function () {
    $( ".sortable" ).each( function () {
        var sortBy = $( this ).attr( 'data-sortBy' ) ? $( this ).attr( 'data-sortBy' ) : 0;
        var sortDesc = $( this ).attr( 'data-sortDesc' ) ? $( this ).attr( 'data-sortDesc' ) : 0;

        $( ".sortable" ).tablesorter(
            {
                //theme: 'dark',
                sortList: [ [ sortBy, sortDesc ] ]
            }
        );
    } );
};



var initLeaflet = function () {
    var lat = Number( $( '.activeLat' ).val() );
    var long = Number( $( '.activeLong' ).val() );
    var dist = Number( $( '.activeDist' ).val() );
    var center = [ lat, long ];

    // default tuto
    var layerSource = "https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoib29sLWZhcmkiLCJhIjoiY2pzbTl2dWo3MDZnYTN5cXZrOWx3anNleiJ9.10cwSUFpxOo0jgnxVVHoXg";


    var mapboxAttribution = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
    var grayscale = L.tileLayer( layerSource, { id: 'mapbox.light', attribution: mapboxAttribution } );
    var streets = L.tileLayer( layerSource, { id: 'mapbox.streets', attribution: mapboxAttribution } );

    var map = L.map( 'map-canvas', {
        center: center,
        zoom: 10
    } );

    //).setView(center, 10);


    //var layerSource = "https://https://www.openstreetmap.org/#map=14/46.8247/-71.2502&layers=T";

    L.tileLayer( layerSource, {
        attribution: mapboxAttribution,
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1Ijoib29sLWZhcmkiLCJhIjoiY2pzbTl2dWo3MDZnYTN5cXZrOWx3anNleiJ9.10cwSUFpxOo0jgnxVVHoXg'
    } ).addTo( map );

    var baseMaps = {
        "Grayscale": grayscale,
        "Streets": streets
    };

    var circle = L.circle( center, {
        color: 'red',
        fillColor: 'orange',
        fillOpacity: 0.5,
        radius: dist * 1000
    } ).addTo( map );

//  https://leafletjs.com/examples/layers-control/
//    var overlayMaps = {
//        "Cities": cities
//    };

    L.control.layers( baseMaps/*, overlayMaps*/ ).addTo( map );

    //console.log(lat + ' ' + long);

// TEST -- a faire dans une autre ext    
//mapboxgl.accessToken = 'pk.eyJ1Ijoib29sLWZhcmkiLCJhIjoiY2pzbTl1bmIzMnJpZzQ0cWdvZTVrZnpmMCJ9.V0xVPC7bBuyAhzkAPsas4Q';
//const map = new mapboxgl.Map({
//container: 'map-canvas',
//style: 'mapbox://styles/ool-fari/cjso56ka216du1fmlhmtmpwwj',
//center: [long, lat],
//zoom: 6.7
//});
//    
    var marker = L.marker( center ).addTo( map );

    return map;
};


var placeMarkers = function ( map ) {

    $( '.zip-item' ).each( function () {
        var lat = $( this ).attr( 'data-latitude' );
        var lng = $( this ).attr( 'data-longitude' );


        var myIcon = L.icon( {
            iconUrl: 'http://localhost/typo3conf/ext/ool_site/Resources/Public/Css/images/marker-icon.png',
            iconSize: [ 24, 40 ],
            className: 'cMarker'
        } );

        //L.marker( [lat,lng], {icon: myIcon} ).addTo(map);
        L.marker( [ lat, lng ] ).addTo( map );

        return map;
    } );

};