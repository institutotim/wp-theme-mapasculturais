(function($) {
  $(document).ready(function() {
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
      L.tileLayer('http://{s}.sm.mapstack.stamen.com/($2b3140[@p],toner-background[screen])/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);
      var popup = '';
      popup += '<h3>Secretaria de Cultura de São Paulo</h3>';
      popup += '<p><strong>321</strong> agentes, ';
      popup += '<strong>123</strong> eventos, ';
      popup += '<strong>40</strong> espaços, ';
      popup += '<strong>40</strong> projetos</p>';
      popup += '<p><a href="#" class="button">Ver perfil</a></p>';
      L.marker([-23.5475, -46.63611], {icon: icon}).bindPopup(popup).addTo(map);
    }
  });
})(jQuery);
