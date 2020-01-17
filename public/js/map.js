class Map {
    constructor(latitude, longitude, mapId, tileUrl, JSONfile) {
        this.lat = latitude;
        this.lon = longitude;
        this.mapId = mapId;
        this.tileUrl = tileUrl;
        this.maCarte = null;
        this.data = JSONfile;
        this.latlngs = [];
        
        window.onload = function() {
            this.initMap();
        }.bind(this);
    }

    initMap() {
        // Insère la carte dans #mapid
        this.maCarte = L.map(this.mapId);
        this.maCarte.setView([this.lat, this.lon], 6);
        L.tileLayer(this.tileUrl, {
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 2,
            maxZoom: 20
        }).addTo(this.maCarte);
        this.addMarkers();
    };

    addMarkers() { 
        // Récupère la liste des stations et ajoute les marqueurs à la carte
        let that = this;
        let maCarte = this.maCarte;
        // Création d'une icône
        let chapters = ajaxGet(this.data, function(reponse) {
            chapters = JSON.parse(reponse);
            for (let i = 0; i < chapters.length; i++) { // Création d'une icône
                 let icon;
                 that.latlngs.push([chapters[i].latitude, chapters[i].longitude]);
                 console.log(that.latlngs);
                 icon = new L.Icon({
                     iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-black.png', //Verte par défaut
                     shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                     iconSize: [25, 41],
                     iconAnchor: [12, 41],
                     shadowSize: [41, 41],
                     popupAnchor: [15, 150]
                 });
                 let marker = L.marker([chapters[i].latitude, chapters[i].longitude], {icon: icon});
                 marker.addEventListener('click', function(){
                    document.location.href = 'index.php?action=post&id=' + chapters[i].id;
                });
                marker.addTo(that.maCarte).bindTooltip(chapters[i].title, {permanent:true, direction: 'top'});
        }
        that.addLines();
    }); 
}

    addLines() {
        var polyline = L.polyline(this.latlngs, {color: 'black', weight: 1, opacity: 0.5, dashArray: '4, 8', lineJoin: 'round'}).addTo(this.maCarte);
    }
}




