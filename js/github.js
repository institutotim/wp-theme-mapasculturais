(function($) {
  document.addEventListener("DOMContentLoaded", function(event) {

    $('.spaces-chart').hide()
    $('.projects-chart').hide()
    $('.events-chart').hide()

    $('#spaces-result').hide()
    $('#projects-result').hide()
    $('#events-result').hide()

    $('#types').change(function(){

      $('.spaces-chart').hide()
      $('.agents-chart').hide()
      $('.projects-chart').hide()
      $('.events-chart').hide()

      $('#spaces-result').hide()
      $('#agents-result').hide()
      $('#projects-result').hide()
      $('#events-result').hide()

      $("."+$("#types option:selected").val()+'-chart').show();
      $("#"+$("#types option:selected").val()+'-result').show();
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
      for(type in instanceData){

        data[type] = {
          'commit_count': 0,
          'chart_data': []
        };

        for(date in instanceData[type]){
          data[type].chart_data.push([
            new Date(date).toISOString(),
            instanceData[type][date]
          ]);
        }

        data[type].commit_count = data[type].chart_data[0][1];


         data[type].chart_data.reverse();

        console.log(data[type]);
        console.log('.'+type+'-chart');
        $chart = $('.'+type+'-chart');

        var name = type+'-chart';

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
            renderTo: name,
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
              data: data[type].chart_data
            }]
          });
        }
      }
    }
  });
})(jQuery);
