(function($) {

  $(document).ready(function() {
    var data = {
      'commit_count': 0,
      'chart_data': []
    };
    var url = 'https://api.github.com/repos/hacklabr/mapasculturais/stats/commit_activity';
    var res = ghData;
    // $.get(url, function(res) {
      console.log(res);
      res.forEach(function(week) {
        data.commit_count += week.total;
        data.chart_data.push([
          new Date(week.week*1000).toISOString(),
          week.total
        ])
      });
      console.log(data);
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
    // });
  });

})(jQuery);
