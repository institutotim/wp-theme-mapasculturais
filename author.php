<?php $author = get_user_by( 'slug', get_query_var( 'author_name' ) ); ?>

<?php get_header(); ?>
<article>
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <div class="page-header-content has-icon row">
          <div class="row">
            <div class="seven columns">
              <span class="page-icon">
                <span class="pmc-icon-marker"></span>
              </span>
              <p class="over-title subtitle">
                <?php echo esc_html($author->display_name); ?>
              </p>
              <h2><?php echo esc_html($author->user_nicename); ?></h2>
              <div class="page-header-text connect-border connect-left">
                <p>
                  <?php echo get_the_author_meta( 'description', $author->ID ) ?>
                </p>
              </div>
            </div>
            <div class="five columns">
              <div class="author-numbers">
                <div class="row">
                  <div class="six columns">
                    <div class="intro-numbers">
                      <p class="icon pmc-icon-person"></p>
                      <p class="number do-count">
                        <?php echo array_values(get_the_author_meta( 'agents_count', $author->ID ))[0] ?>
                      </p>
                      <p class="label">agentes</p>
                    </div>
                  </div>
                  <div class="six columns">
                    <div class="intro-numbers">
                      <p class="icon pmc-icon-calendar"></p>
                      <p class="number do-count">
                        <?php echo array_values(get_the_author_meta( 'events_count', $author->ID ))[0] ?>
                      </p>
                      <p class="label">eventos</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="six columns">
                    <div class="intro-numbers">
                      <p class="icon pmc-icon-door"></p>
                      <p class="number do-count">
                        <?php echo array_values(get_the_author_meta( 'spaces_count', $author->ID ))[0] ?>
                      </p>
                      <p class="label">espaços</p>
                    </div>
                  </div>
                  <div class="six columns">
                    <div class="intro-numbers">
                      <p class="icon pmc-icon-paper"></p>
                      <p class="number do-count">
                        <?php echo array_values(get_the_author_meta( 'projects_count', $author->ID ))[0] ?>
                      </p>
                      <p class="label">projetos</p>
                    </div>
                  </div>
                </div>
                <p><a class="button block" href="<?php echo get_the_author_meta( 'url', $author->ID ) ?>"><span class="fa fa-star"></span>Acesse a plataforma</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="eight columns">
        <?php get_template_part('parts/network-entry-on-author-page'); ?>
      </div>
      <div class="four columns">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <div class="widget">
            <div class="statistics">
              <h3>Estatísticas</h3>
              <p class="filter">
                <select id="types" >
                  <option value="agents">Agentes culturais</option>
                  <option value="events">Eventos</option>
                  <option value="spaces">Epaços</option>
                  <option value="projects">Projetos</option>
                </select>
                nos últimos 30 dias
              </p>

              <div class="global-chart chart" ></div>
              <!-- <div class="events-chart chart" ></div>
              <div class="projects-chart chart" ></div>
              <div class="spaces-chart chart" ></div> -->
              <p id="agents-result" class="result"><?php echo (array_values(get_the_author_meta( 'agents_count', $author->ID ))[0] - array_values(get_the_author_meta( 'agents_count', $author->ID ))[1]) ?> agentes culturais cadastrados nos últimos 30 dias</p>

              <p id="events-result" class="result"><?php echo (array_values(get_the_author_meta( 'events_count', $author->ID ))[0] - array_values(get_the_author_meta( 'events_count', $author->ID ))[1]) ?> eventos culturais cadastrados nos últimos 30 dias</p>

              <p id="projects-result" class="result"><?php echo (array_values(get_the_author_meta( 'projects_count', $author->ID ))[0] - array_values(get_the_author_meta( 'projects_count', $author->ID ))[1]) ?>  projetos culturais cadastrados nos últimos 30 dias</p>

              <p id="spaces-result" class="result"><?php echo (array_values(get_the_author_meta( 'spaces_count', $author->ID ))[0] - array_values(get_the_author_meta( 'spaces_count', $author->ID ))[1]) ?> espaços culturais cadastrados nos últimos 30 dias</p>

              
            </div>
          </div>
          <div class="widget">
            <div class="team">

              <h3>Equipe</h3>
              <ul>
                <?php if(get_field('team_members', 'user_'.$author->ID)): ?>
                  <?php while(has_sub_field('team_members', 'user_'.$author->ID)): ?>
                    <li class="row">
                      <?php echo get_avatar( get_sub_field('email'), 100 ); ?>
                      <h4><?php the_sub_field('name'); ?></h4>
                      <p><?php the_sub_field('position'); ?></p>
                    </li>
                  <?php endwhile; ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="widget">
            <h3>Contato</h3>
            <ul>
              <?php if (get_the_author_meta( 'public_email', $author->ID )): ?>
              <li>
                <a href="mailto:<?php the_author_meta( 'public_email', $author->ID ) ?>" target="_blank">
                  <span class="fa fa-envelope"></span>
                  <?php the_author_meta( 'public_email', $author->ID ) ?>
                </a>
              </li>
              <?php endif; ?>
              <?php if (get_the_author_meta( 'telegram', $author->ID )): ?>
              <li>
                <a href="https://telegram.me/<?php the_author_meta( 'telegram', $author->ID ) ?>" target="_blank">
                  <span class="fa fa-telegram"></span>
                  Telegram
                </a>
              </li>
              <?php endif; ?>
              <?php if (get_the_author_meta( 'whatsapp', $author->ID )): ?>
              <li>
                <a href="https://api.whatsapp.com/send?phone=<?php the_author_meta( 'whatsapp', $author->ID ) ?>">
                  <span class="fa fa-whatsapp"></span>
                  WhatsApp
                </a>
              </li>
              <?php endif; ?>
              <?php if (get_the_author_meta( 'github', $author->ID )): ?>
              <li>
                <a href="<?php the_author_meta( 'github', $author->ID ) ?>">
                  <span class="fa fa-github"></span>
                  Github
                </a>
              </li>
              <?php endif; ?>
              <?php if (get_the_author_meta( 'facebook', $author->ID )): ?>
              <li>
                <a href="<?php the_author_meta( 'facebook', $author->ID ) ?>">
                  <span class="fa fa-facebook"></span>
                  Facebook
                </a>
              </li>
              <?php endif; ?>
              <?php if (get_the_author_meta( 'twitter', $author->ID )): ?>
              <li>
                <a href="https://twitter.com/<?php the_author_meta( 'twitter', $author->ID ) ?>">
                  <span class="fa fa-twitter"></span>
                  Twitter
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <section>
</article>
<?php get_footer(); ?>
