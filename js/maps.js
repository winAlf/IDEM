$(document).ready(function() {

  var map = L.map('mapa').setView([19.3715244, -99.1994755], 16);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a>'
  }).addTo(map);

  L.marker([19.3715244, -99.1994755]).addTo(map)
  .bindPopup('<img src="img/logoCh.png" alt=""><br><p>Estamos para servirte</p><a class="btnMaps" href="https://maps.google.com/?q=19.3715244, -99.1994755" target="_blank">Abrir en MAPS</a>')
  .openPopup();

});//DOCUMENT.READY
