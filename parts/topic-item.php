<article class="delibera-topic">
  <h4><?php the_title(); ?></h4>
  <div class="topic-meta">
    <span class="topic-vote">
      <span class="up">
        <span class="fa fa-thumbs-up"></span>
        <?php echo get_post_meta($post->ID, 'delibera_numero_curtir', true); ?>
      </span>
      <span class="down">
        <span class="fa fa-thumbs-down"></span>
        <?php echo get_post_meta($post->ID, 'delibera_numero_discordar', true); ?>
      </span>
    </span>
    <span class="topic-comment">
      <a href="#">
        <span class="fa fa-comment"></span>
        Comente
      </a>
    </span>
  </div>
</article>
