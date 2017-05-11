<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article id="page-<?php the_ID(); ?>">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <div class="page-header-content no-text">
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="page-excerpt">
      <div class="container">
        <div class="eight columns offset-by-two">
          <p>In tempor lacus nec lorem ornare egestas. Morbi auctor placerat dolor, at bibendum ex tempor luctus. Nulla tellus nibh, ullamcorper non finibus eget, volutpat et sapien. Phasellus ac ipsum vitae orci tempor viverra nec vel sapien.</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="eight columns offset-by-two">
        <?php the_content(); ?>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
