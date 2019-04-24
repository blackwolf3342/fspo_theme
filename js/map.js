
function map_leafret(set = false) {


    var map = L.map('map').setView([48.75112, 30.22984], 15);

    if(set == true) {
        map.remove();
    }

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([48.74934, 30.22372]).addTo(map)
    .bindPopup('Уманський державний університет ім. Павла Тичини<br> Корпус №1');

    L.marker([48.75294, 30.23279]).addTo(map)
    .bindPopup('Уманський державний університет ім. Павла Тичини<br> Корпус №3')
    .openPopup();
}

$(window).on('resize' ,(function() {

    var a = $('#basement-right').height();
    $('#map').height(a - 2);

    map_leafret(true);
    
    map_leafret();

}));
        

$(document).ready(function () {
    var video_height = $('#basement-right').height();   
    $('#map').height(video_height - 2);
    map_leafret();
});