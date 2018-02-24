(function($) {
  document.addEventListener("DOMContentLoaded", function(event) {
    if($('#map').length) {

      var icon = L.icon({
        iconUrl: mapData.iconUrl,
        iconSize: [31, 40],
        iconAnchor: [15, 39],
        popupAnchor: [0, -45]
      });

      var map = L.map('map', {
        scrollWheelZoom: false
      }).setView([-14.235004, -51.92528], 4);

      L.tileLayer('http://{s}.sm.mapstack.stamen.com/($373f57[@p],toner-background[screen])/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      var markers = mapData.markers;
      for (i in markers) {
       var popup = '';
        popup += '<h3>'+markers[i].instance+'</h3>';
        popup += '<p><strong>'+markers[i].agents_count+'</strong> agentes, ';
        popup += '<strong>'+markers[i].events_count+'</strong> eventos, ';
        popup += '<strong>'+markers[i].spaces_count+'</strong> espaços, ';
        popup += '<strong>'+markers[i].projects_count+'</strong> projetos</p>';
        popup += '<p><a href=/author/'+markers[i].instance+'" class="button">Ver perfil</a></p>';
        L.marker([
            markers[i].position.lat,
            markers[i].position.lng
          ],
          {icon: icon}
        ).bindPopup(popup).addTo(map);
      }
    }
  });
})(jQuery);