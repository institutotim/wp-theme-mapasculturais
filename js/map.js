(function($) {
  document.addEventListener("DOMContentLoaded", function(event) {
    if ($("#map").length) {
      var icon = L.icon({
        iconUrl: mapData.iconUrl,
        iconSize: [31, 40],
        iconAnchor: [15, 39],
        popupAnchor: [0, -45]
      });

      var map = L.map("map", {
        scrollWheelZoom: false,
        maxZoom: 10
      }).setView([-14.235004, -51.92528], 4);

      var markerLayer = L.featureGroup();

      map.addLayer(markerLayer);

      L.tileLayer(
        "http://{s}.sm.mapstack.stamen.com/($373f57[@p],toner-background[screen])/{z}/{x}/{y}.png",
        {
          attribution:
            '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }
      ).addTo(map);

      var markers = mapData.markers;
      for (i in markers) {
        var agents_count;

        if (markers[i].agents_count) {
          agents_count = markers[i].agents_count;
        } else {
          agents_count = 0;
        }

        var events_count;

        if (markers[i].events_count) {
          events_count = markers[i].events_count;
        } else {
          events_count = 0;
        }

        var spaces_count;

        if (markers[i].spaces_count) {
          spaces_count = markers[i].spaces_count;
        } else {
          spaces_count = 0;
        }

        var projects_count;

        if (markers[i].projects_count) {
          projects_count = markers[i].projects_count;
        } else {
          projects_count = 0;
        }

        var popup = "";
        popup += "<h3>" + markers[i].instance + "</h3>";
        popup += "<p><strong>" + agents_count + "</strong> agentes, ";
        popup += "<strong>" + events_count + "</strong> eventos, ";
        popup += "<strong>" + spaces_count + "</strong> espaços, ";
        popup += "<strong>" + projects_count + "</strong> projetos</p>";
        popup +=
          "<p><a href=/author/" +
          markers[i].instance +
          ' class="button">Ver perfil</a></p>';
        if (markers[i].position && markers[i].position.lat) {
          L.marker([markers[i].position.lat, markers[i].position.lng], {
            icon: icon
          })
            .bindPopup(popup)
            .addTo(markerLayer);
        }
      }
      map.fitBounds(markerLayer.getBounds());
    }
  });
})(jQuery);
