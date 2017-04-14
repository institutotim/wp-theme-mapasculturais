(function($) {
  $(document).ready(function() {
    if($('#map').length) {
      var map = L.map('map', {
        scrollWheelZoom: false
      }).setView([-14.235004, -51.92528], 4);
      L.tileLayer('http://{s}.sm.mapstack.stamen.com/($2b3140[@p],toner-background[screen])/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);
      var popup = '';
      popup += '<p><strong>Secretaria de Cultura de São Paulo</strong></p>';
      popup += '<p><strong>321</strong> agentes, <strong>123</strong> eventos, <strong>40</strong> projetos</p>';
      L.marker([-23.5475, -46.63611]).bindPopup(popup).addTo(map);
    }
  });
})(jQuery);
