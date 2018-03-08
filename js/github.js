(function($) {
  document.addEventListener("DOMContentLoaded", function(event) {

    // initial hide all subttitles

    $('#spaces-result').hide()
    $('#projects-result').hide()
    $('#events-result').hide()

    var type = $("#types option:selected").val();

    $('#types').change(function(){
      //hide and show subtitle
      $('#'+type+'-result').hide();
      var aux = $("#types option:selected").val();
      $('#'+aux+'-result').show();
      type = aux;

      // load data

      $chart = $('.global-chart').highcharts();

      var data = []

      data = {
        'commit_count': 0,
        'chart_data': []
      };

      for(date in instanceData[type]){
        data.chart_data.push([
          new Date(date).toISOString(),
          instanceData[type][date]
        ]);
      }

      data.commit_count = data.chart_data[0][1];

      data.chart_data.reverse();


      $chart.series[0].setData(data.chart_data);

      if (type === 'spaces'){
        type_pt = 'espaços';
      }
      else if (type === 'projects'){
        type_pt = 'projetos';
      }
      else if (type === 'agents') {
        type_pt = 'agentes';
      }
      else if (type === 'events'){
        type_pt = 'eventos';
      }


      $chart.tooltip.formatter = function() {
        var label = '<span class="label"><b>Atividade recente</b></span><br/>';
        return '<span class="gh-tooltip">' + label + '<span class="date">' + moment(this.key).format('L') + '</span> - <span class="total">' + this.y + ' '+type_pt+'</span></span>';
      };

    });





    if (typeof instanceData === 'undefined'){

      var data = {
        'commit_count': 0,
        'chart_data': []
      };

      ghData.forEach(function(week) {
        data.commit_count += week.total;
        data.chart_data.push([
          new Date(week.week*1000).toISOString(),
          week.total
        ])
      });

      $chart = $('.gh-chart');

      if($chart.length) {
        $chart.highcharts({
          chart: {
            type: 'spline',
            backgroundColor: 'transparent',
            height: 150,
            spacingBottom: 0,
            spacingTop: 0,
            spacingLeft: 0,
            spacingRight: 0,
          },
          renderTo: 'gh-chart',
          title: false,
          subtitle: false,
          tooltip: {
            enabled: true,
            followPointer: true,
            backgroundColor: 'transparent',
            formatter: function() {
              var label = '<span class="label"><b>Atividade recente</b></span><br/>';
              return '<span class="gh-tooltip">' + label + '<span class="date">' + moment(this.key).format('L') + '</span> - <span class="total">' + this.y + ' commits</span></span>';
            },
            borderRadius: 0,
            shadow: false,
            style: {
              color: '#fff'
            }
          },
          legend: {
            enabled: false
          },
          credits: {
            enabled: false
          },
          xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
              month: '%e. %b',
              year: '%b'
            },
            title: 'Date',
            tickInterval: 7 * 24 * 3600 * 1000, // 1 week
            tickWidth: 0,
            visible: false
          },
          yAxis: {
            min: 0,
            title: 'Commits',
            visible: false
          },
          series: [{
            lineWidth: 10,
            marker: {
              enabled: false
            },
            name: 'Commits',
            color: '#e94b80',
            data: data.chart_data
          }]
        });
      }

    } else {
      var data = []

      data = {
        'commit_count': 0,
        'chart_data': []
      };

      for(date in instanceData['agents']){
        data.chart_data.push([
          new Date(date).toISOString(),
          instanceData['agents'][date]
        ]);
      }

      data.commit_count = data.chart_data[0][1];

      data.chart_data.reverse();

      $chart = $('.global-chart');

      if($chart.length) {
        $chart.highcharts({
          chart: {
            type: 'spline',
            backgroundColor: 'transparent',
            height: 150,
            spacingBottom: 0,
            spacingTop: 0,
            spacingLeft: 0,
            spacingRight: 0,
          },
          renderTo: 'global-chart',
          title: false,
          subtitle: false,
          tooltip: {
            enabled: true,
            followPointer: true,
            backgroundColor: 'transparent',
            formatter: function() {
              var label = '<span class="label"><b>Atividade recente</b></span><br/>';
              return '<span class="gh-tooltip">' + label + '<span class="date">' + moment(this.key).format('L') + '</span> - <span class="total">' + this.y + ' '+type+'</span></span>';
            },
            borderRadius: 0,
            shadow: false,
            style: {
              color: '#000'
            }
          },
          legend: {
            enabled: false
          },
          credits: {
            enabled: false
          },
          xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
              month: '%e. %b',
              year: '%b'
            },
            title: 'Date',
            tickInterval: 7 * 24 * 3600 * 1000, // 1 week
            tickWidth: 0,
            visible: false
          },
          yAxis: {
            min: 0,
            title: 'Commits',
            visible: false
          },
          series: [{
            lineWidth: 10,
            marker: {
              enabled: false
            },
            name: 'Commits',
            color: '#e94b80',
            data: data.chart_data
          }]
        });

      }

    }
  });
})(jQuery);
