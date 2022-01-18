<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="css/leaflet.css"><link rel="stylesheet" href="css/L.Control.Locate.min.css">
        <link rel="stylesheet" href="css/qgis2web.css"><link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/leaflet-control-geocoder.Geocoder.css">
        <link rel="stylesheet" href="css/leaflet-measure.css">
        <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        </style>
        <title></title>
    </head>
    <body>
        <div id="map">
        </div>
        <script src="js/qgis2web_expressions.js"></script>
        <script src="js/leaflet.js"></script><script src="js/L.Control.Locate.min.js"></script>
        <script src="js/leaflet.rotatedMarker.js"></script>
        <script src="js/leaflet.pattern.js"></script>
        <script src="js/leaflet-hash.js"></script>
        <script src="js/Autolinker.min.js"></script>
        <script src="js/rbush.min.js"></script>
        <script src="js/labelgun.min.js"></script>
        <script src="js/labels.js"></script>
        <script src="js/leaflet-control-geocoder.Geocoder.js"></script>
        <script src="js/leaflet-measure.js"></script>
        <script src="data/ADMINISTRASIKECAMATAN_AR_1.php"></script>
        <script src="data/titikhotel_2.php"></script>
        <script>
            var highlightLayer;
        function highlightFeature(e) {
            highlightLayer = e.target;

            if (e.target.feature.geometry.type === 'LineString') {
              highlightLayer.setStyle({
                color: '#ffff00',
              });
            } else {
              highlightLayer.setStyle({
                fillColor: '#ffff00',
                fillOpacity: 1
              });
            }
            highlightLayer.openPopup();
        }    
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:2
        })
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
        L.control.locate({locateOptions: {maxZoom: 19}}).addTo(map);
        var measureControl = new L.Control.Measure({
            position: 'topleft',
            primaryLengthUnit: 'meters',
            secondaryLengthUnit: 'kilometers',
            primaryAreaUnit: 'sqmeters',
            secondaryAreaUnit: 'hectares'
        });
        measureControl.addTo(map);
        document.getElementsByClassName('leaflet-control-measure-toggle')[0]
        .innerHTML = '';
        document.getElementsByClassName('leaflet-control-measure-toggle')[0]
        .className += ' fas fa-ruler';
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
            if (bounds_group.getLayers().length) {
                map.fitBounds(bounds_group.getBounds());
            }
        }
        map.createPane('pane_OpenStreetMap_0');
        map.getPane('pane_OpenStreetMap_0').style.zIndex = 400;
        var layer_OpenStreetMap_0 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            pane: 'pane_OpenStreetMap_0',
            opacity: 1.0,
            attribution: '',
            minZoom: 2,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 19
        });
        layer_OpenStreetMap_0;
        map.addLayer(layer_OpenStreetMap_0);
        function pop_ADMINISTRASIKECAMATAN_AR_1(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? autolinker.link(feature.properties['Kecamatan'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">REMARK</th>\
                        <td>' + (feature.properties['REMARK'] !== null ? autolinker.link(feature.properties['REMARK'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kode_dagri</th>\
                        <td>' + (feature.properties['Kode_dagri'] !== null ? autolinker.link(feature.properties['Kode_dagri'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">WADMKK</th>\
                        <td>' + (feature.properties['WADMKK'] !== null ? autolinker.link(feature.properties['WADMKK'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">WADMPR</th>\
                        <td>' + (feature.properties['WADMPR'] !== null ? autolinker.link(feature.properties['WADMPR'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Jumlah</th>\
                        <td>' + (feature.properties['Jumlah'] !== null ? autolinker.link(feature.properties['Jumlah'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_ADMINISTRASIKECAMATAN_AR_1_0(feature) {
            if (feature.properties['Jumlah'] >= 37.000000 && feature.properties['Jumlah'] <= 182.800000 ) {
                return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_1',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,255,255,1.0)',
                interactive: true,
            }
            }
            if (feature.properties['Jumlah'] >= 182.800000 && feature.properties['Jumlah'] <= 408.400000 ) {
                return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_1',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,191,191,1.0)',
                interactive: true,
            }
            }
            if (feature.properties['Jumlah'] >= 408.400000 && feature.properties['Jumlah'] <= 793.600000 ) {
                return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_1',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,128,128,1.0)',
                interactive: true,
            }
            }
            if (feature.properties['Jumlah'] >= 793.600000 && feature.properties['Jumlah'] <= 1662.400000 ) {
                return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_1',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,64,64,1.0)',
                interactive: true,
            }
            }
            if (feature.properties['Jumlah'] >= 1662.400000 && feature.properties['Jumlah'] <= 2773.000000 ) {
                return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_1',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,0,0,1.0)',
                interactive: true,
            }
            }
        }
        map.createPane('pane_ADMINISTRASIKECAMATAN_AR_1');
        map.getPane('pane_ADMINISTRASIKECAMATAN_AR_1').style.zIndex = 401;
        map.getPane('pane_ADMINISTRASIKECAMATAN_AR_1').style['mix-blend-mode'] = 'normal';
        var layer_ADMINISTRASIKECAMATAN_AR_1 = new L.geoJson(json_ADMINISTRASIKECAMATAN_AR_1, {
            attribution: '',
            interactive: true,
            dataVar: 'json_ADMINISTRASIKECAMATAN_AR_1',
            layerName: 'layer_ADMINISTRASIKECAMATAN_AR_1',
            pane: 'pane_ADMINISTRASIKECAMATAN_AR_1',
            onEachFeature: pop_ADMINISTRASIKECAMATAN_AR_1,
            style: style_ADMINISTRASIKECAMATAN_AR_1_0,
        });
        bounds_group.addLayer(layer_ADMINISTRASIKECAMATAN_AR_1);
        map.addLayer(layer_ADMINISTRASIKECAMATAN_AR_1);
        function pop_titikhotel_2(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">nama</th>\
                        <td>' + (feature.properties['nama'] !== null ? autolinker.link(feature.properties['nama'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">alamat</th>\
                        <td>' + (feature.properties['alamat'] !== null ? autolinker.link(feature.properties['alamat'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }
        //penambahan icon hotel
         var Iconhotel = L.icon({
            iconUrl: 'legend/hotel1.png',
            iconSize: [35,40],
            iconAnrchor: [16, 16],
            popupAnchor: [-6, -16]
         });

        function style_titikhotel_2_0() {
            return {
                pane: 'pane_titikhotel_2',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(190,178,151,1.0)',
                interactive: true,
                icon:Iconhotel
            }
        }
        map.createPane('pane_titikhotel_2');
        map.getPane('pane_titikhotel_2').style.zIndex = 402;
        map.getPane('pane_titikhotel_2').style['mix-blend-mode'] = 'normal';
        var layer_titikhotel_2 = new L.geoJson(json_titikhotel_2, {
            attribution: '',
            interactive: true,
            dataVar: 'json_titikhotel_2',
            layerName: 'layer_titikhotel_2',
            pane: 'pane_titikhotel_2',
            onEachFeature: pop_titikhotel_2,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                //return L.circleMarker(latlng, style_titikhotel_2_0(feature));
                return L.marker(latlng, style_titikhotel_2_0(feature));
            },
        });
        bounds_group.addLayer(layer_titikhotel_2);
        map.addLayer(layer_titikhotel_2);
        var osmGeocoder = new L.Control.Geocoder({
            collapsed: true,
            position: 'topleft',
            text: 'Search',
            title: 'Testing'
        }).addTo(map);
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
        .className += ' fa fa-search';
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
        .title += 'Search for a place';
        var baseMaps = {};
        L.control.layers(baseMaps,{'<img src="legend/hotel1.png" /> titikhotel': layer_titikhotel_2,'ADMINISTRASIKECAMATAN_AR<br /><table><tr><td style="text-align: center;"><img src="legend/ADMINISTRASIKECAMATAN_AR_1_371830.png" /></td><td>37 - 183</td></tr><tr><td style="text-align: center;"><img src="legend/ADMINISTRASIKECAMATAN_AR_1_1834081.png" /></td><td>183 - 408</td></tr><tr><td style="text-align: center;"><img src="legend/ADMINISTRASIKECAMATAN_AR_1_4087942.png" /></td><td>408 - 794</td></tr><tr><td style="text-align: center;"><img src="legend/ADMINISTRASIKECAMATAN_AR_1_79416623.png" /></td><td>794 - 1662</td></tr><tr><td style="text-align: center;"><img src="legend/ADMINISTRASIKECAMATAN_AR_1_166227734.png" /></td><td>1662 - 2773</td></tr></table>': layer_ADMINISTRASIKECAMATAN_AR_1,"OpenStreetMap": layer_OpenStreetMap_0,}).addTo(map);
        setBounds();
        var i = 0;
        layer_ADMINISTRASIKECAMATAN_AR_1.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['Kecamatan'] !== null?String('<div style="color: #000000; font-size: 10pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['Kecamatan']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_ADMINISTRASIKECAMATAN_AR_1'});
            labels.push(layer);
            totalMarkers += 1;
              layer.added = true;
              addLabel(layer, i);
              i++;
        });
        resetLabels([layer_ADMINISTRASIKECAMATAN_AR_1]);
        map.on("zoomend", function(){
            resetLabels([layer_ADMINISTRASIKECAMATAN_AR_1]);
        });
        map.on("layeradd", function(){
            resetLabels([layer_ADMINISTRASIKECAMATAN_AR_1]);
        });
        map.on("layerremove", function(){
            resetLabels([layer_ADMINISTRASIKECAMATAN_AR_1]);
        });
        </script>
    </body>
</html>
