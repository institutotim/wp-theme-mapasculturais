(function($) {

  $(document).ready(function() {
    var data = {
      'dev_count': 0,
      'commit_count': 0,
      'commits_per_week': 0
    };
    var url = 'https://api.github.com/repos/hacklabr/mapasculturais/stats/commit_activity';
    $.get(url, function(res) {
      console.log(res);
      res.forEach(function(contributor) {
        data.commit_count += contributor.total;
      });
      console.log(data);
    })
  });

})(jQuery);
