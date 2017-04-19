<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article id="page-<?php the_ID(); ?>">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="page-header-content no-text">
      <div class="container">
        <div class="twelve columns">
          <p class="over-title category">
            <a href="#" class="area">Tutoriais</a>
            <span class="fa fa-chevron-right"></span>
            <a href="#" class="cat">Categoria #1</a>
          </p>
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="twelve columns">
        <div id="meta">
          <p class="target-group">
            <span class="fa fa-gear"></span>
            para gestores
          </p>
          <p class="complex">
            <span class="fa fa-certificate"></span>
            <span class="label">Complexidade:</span>
            Média
          </p>
          <p class="valid">
            <span class="fa fa-check-circle"></span>
            Válido para todas as versões da plataforma
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis euismod lectus a cursus dictum. Nulla at metus id elit volutpat ornare ut quis nisl. Sed pellentesque leo in massa ornare, eu tincidunt nibh cursus. Nulla vestibulum, enim in vulputate imperdiet, felis arcu dignissim ipsum, at laoreet urna lectus at metus. Phasellus vitae massa ac ligula placerat sagittis. Ut lobortis purus in neque vestibulum, quis tincidunt ipsum posuere. Etiam vel pellentesque justo. Aliquam semper id purus eu cursus.</p>

        <p>Aenean sed semper tortor. Morbi convallis vehicula lectus sed laoreet. Nam scelerisque erat ut metus imperdiet, sed ullamcorper diam dictum. Nam eget interdum odio, ut sodales nisl. Quisque sapien neque, aliquam nec lectus ac, feugiat gravida nisi. Curabitur bibendum ultrices varius. Proin a ante venenatis quam mollis vulputate et ut arcu. In aliquam enim purus, sed tempor ante euismod vel. Suspendisse porttitor sem sit amet mauris semper, nec convallis lorem dapibus.</p>

        <p>Ut leo velit, scelerisque convallis laoreet ac, efficitur ac nibh. Fusce lectus velit, imperdiet ut erat vel, venenatis dictum nibh. Nulla nec tristique est, quis posuere risus. Aliquam facilisis dignissim arcu. Donec in dui congue, rhoncus elit sed, euismod orci. Morbi semper, neque vel laoreet sodales, arcu felis commodo mi, sed auctor velit enim condimentum erat. Aenean eros est, ultricies eu urna sit amet, ullamcorper dignissim quam. Nunc tincidunt fermentum ex, ut tincidunt quam laoreet a. Fusce et ligula sed ligula pharetra scelerisque. Quisque luctus tellus in ultrices dignissim. Curabitur varius arcu urna, eget volutpat massa iaculis eu. Aenean eu convallis leo.</p>

        <p>Quisque tempus, massa in pulvinar aliquet, est tellus scelerisque lorem, vel lobortis felis elit at justo. Nullam id arcu sed purus scelerisque aliquam in et purus. Nam et consequat lacus. Fusce dapibus, sem id efficitur consequat, sem nulla vulputate velit, eget mattis nibh elit vitae dolor. Nulla facilisi. Nullam et consectetur est. Nam mollis, elit eu scelerisque elementum, nibh lectus mattis dui, aliquet iaculis erat lacus at elit.</p>

        <p>Nulla facilisi. Nullam nulla diam, pharetra in sem id, gravida bibendum ex. Morbi leo elit, ornare tempor facilisis vitae, mollis vel elit. Fusce consequat et mi sit amet sollicitudin. Sed tincidunt luctus nisl id dictum. Fusce elit ligula, rhoncus eget felis sed, pellentesque egestas erat. Nulla at erat quis orci eleifend commodo. Vestibulum a odio neque. Nullam sit amet risus sit amet magna accumsan feugiat. Vestibulum ut consequat augue, vel tempor lacus. Ut sit amet dolor in lorem elementum congue. Phasellus non dui ac nibh elementum rutrum eget et orci.</p>

      </div>
      <div class="four columns">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <div class="widget">
            <h2>Navegar pelos tutoriais</h2>
            <nav class="target-group-nav">
              <a>
                <span class="fa fa-gear"></span>
                gestor
              </a>
              <a>
                <span class="fa fa-user"></span>
                agente cultural
              </a>
            </nav>
            <ul>
              <li>
                <a href="#">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #1
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #2
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #3
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #4
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #4
                </a>
              </li>
            </ul>
          </div>
          <div class="widget">
            <div class="newsletter-form">
              <h2>
                <span class="fa fa-envelope"></span>
                Newsletter
              </h2>
              <input type="email" placeholder="Preencha seu email" />
              <input type="submit" value="Cadastrar" />
            </div>
          </div>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>
