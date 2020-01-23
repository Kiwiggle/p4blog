let map = new Map(63.201618, -149.350806, 'mapid', 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', 'public/js/latLonJSON.php');

function seeMap() {
    console.log("ok");
    let div = document.getElementById('index_header');
    div.style.left = "-100%";
}