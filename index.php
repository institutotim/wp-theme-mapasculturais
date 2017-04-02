<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section id="content">
  <div class="container">
    <div class="nine columns">
      <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum ut ligula in accumsan.</h2>
    </div>
    <div class="row">
      <div class="six columns">
        <p>Proin egestas ante sapien, et venenatis felis luctus a. In interdum facilisis augue quis tempor. Mauris luctus lobortis diam, quis aliquet velit sollicitudin quis. Mauris mattis elit ac justo commodo pulvinar. Quisque porta libero massa, ultrices imperdiet nunc tempor ac. Quisque accumsan lectus ac orci interdum, id pretium nulla tempus. Vestibulum lorem velit, ultricies et faucibus et, lacinia non felis. Duis congue nec odio ut bibendum. Nunc rutrum, velit non feugiat accumsan, nisl arcu fringilla nulla, in porta justo felis ac purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio non neque auctor, eget ornare nunc hendrerit. Integer sit amet fermentum urna. Aliquam auctor magna tristique pretium tincidunt. Phasellus dictum nunc purus, eget varius urna varius sit amet.</p>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
