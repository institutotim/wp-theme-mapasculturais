<?php
/*
 * Template name: Partners
 */
?>
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
      <div class="twelve columns">
        <div class="page-header-content row">
          <h2><?php the_title(); ?></h2>
          <div class="row">
            <div class="eight columns offset-by-two">
              <div class="page-header-text">
                <p>Mapas Culturais foi criado pelo <a href="http://institutotim.org.br" rel="external" target="_blank">Instituto TIM</a> em parceria com a Secretaria de Cultura do Município de São Paulo, a primeira a adotar a plataforma, em 2014. Atualmente, a solução está em operação no Ministério da Cultura, em estados e municípios de todas as regiões do Brasil e até no exterior. Em 2015, Mapas Culturais passou a ser a plataforma oficial do Sistema Nacional de Informações e Indicadores Culturais (SNIIC), sendo o sistema oficial para mapeamento colaborativo e gestão da cultura do Ministério da Cultura.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="twelve columns">
        <div class="partner-list">
          <?php
          $items = array(
            array(
              array( 'file' => 'g20.png', "name" => "Instituto TIM", "url" => "https://institutotim.org.br/"),
              array( 'file' => 'g190.png', "name" => "Prefeitura de São Paulo - Secretaria de Cultura", "url" => "http://www.prefeitura.sp.gov.br/cidade/secretarias/cultura/"),
              array( 'file' => 'g46.png', "name" => "Ministério da Cultura", "url" => "http://www.cultura.gov.br/")
            ),
            array(
              array( 'file' => 'g132.png', "name" => "Instituto Brasileiro de Museus - IBRAM", "url" => "http://www.museus.gov.br/"),
              array( 'file' => 'g158.png', "name" => "Sistema Nacional de Bibliotecas", "url" => "http://snbp.culturadigital.br/"),
              array( 'file' => 'g174.png', "name" => "Cultura Viva", "url" => "http://culturaviva.gov.br/"),
              array( 'file' => 'g312.png', "name" => "Associação dos municipios do Nordeste de Santa Catarina - AMUNESC", "url" => "http://www.amunesc.org.br/"),
              array( 'file' => 'g62.png', "name" => "Universidade Federal de Goiás", "url" => "https://www.ufg.br/"),
              array( 'file' => 'g90.png', "name" => "Hacklab", "url" => "https://hacklab.com.br/"),
              array( 'file' => 'g116.png', "name" => "Instituto Mutirão", "url" => "http://mutirao.org.br/")
            ),
            array(
              array( 'file' => 'g338.png', "name" => "Fundação Cultural Cassiano Ricardo", "url" => "http://www.fccr.org.br/"),
              array( 'file' => 'g364.png', "name" => "Fundação Cultura de João Pessoa", "url" => "http://www.joaopessoa.pb.gov.br/category/noticias/funjope/"),
              array( 'file' => 'g432.png', "name" => "Prefeitura de Belo Horizonte", "url" => "http://portalpbh.pbh.gov.br"),
              array( 'file' => 'g458.png', "name" => "Prefeitura de Sobral", "url" => "http://secjel.sobral.ce.gov.br/"),
              array( 'file' => 'g474.png', "name" => "Prefeitura de Ubatuba - FUNDART", "url" => "https://fundart.com.br/"),
              array( 'file' => 'g526.png', "name" => "Prefeitura de Santo André", "url" => "http://www2.santoandre.sp.gov.br/"),
              array( 'file' => 'g500.png', "name" => "Prefeitura de Blumenal", "url" => "http://www.blumenau.sc.gov.br/")
            ),
            array(
              array( 'file' => 'g216.png', "name" => "Governo do Estado do Ceará - Secreataria de Cultura", "url" => "http://www.secult.ce.gov.br"),
              array( 'file' => 'g238.png', "name" => "Governo do Estado de São Paulo - Secreataria de Cultura", "url" => "http://www.cultura.sp.gov.br/"),
              array( 'file' => 'g264.png', "name" => "Governo de Brasilia", "url" => "http://www.cultura.df.gov.br/"),
              array( 'file' => 'g280.png', "name" => "Governo do Estado do Espirito Santo - Secreataria de Cultura", "url" => "https://secult.es.gov.br/"),
              array( 'file' => 'g296.png', "name" => "Governo de Mato Grosso", "url" => "http://www.cultura.mt.gov.br/"),
              array( 'file' => 'g416.png', "name" => "Governo da Paraiba", "url" => "http://paraiba.pb.gov.br/cultura/"),
              array( 'file' => 'g390.png', "name" => "Governo de Pernambuco", "url" => "http://www.cultura.pe.gov.br/"),
              array( 'file' => 'g552.png', "name" => "Governo do estado do Rio Grande do Sul - Secreataria de Cultura", "url" => "http://sedactel.rs.gov.br/inicial"),
              array( 'file' => 'g4723.png', "name" => "Governo do Tocantins - Secretaria de Cultura", "url" => "http://seden.to.gov.br/desenvolvimento-da-cultura/"),
            )
          );
          foreach($items as $row) :
            ?>
            <div class="partner-row">
              <?php
              foreach($row as $item) :
                ?>
                <div class="partner-item">
                  <a target="_blank" href="<?php echo $item['url']; ?>">
                    <img alt="<?php echo $item['name']; ?>" src="<?php echo get_template_directory_uri(); ?>/img/partners/<?php echo $item['file']; ?>" />
                  </a>
                </div>
                <?php
              endforeach;
              ?>
            </div>
            <?php
          endforeach;
          ?>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
