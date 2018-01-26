<?php get_header(); ?>
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <div class="page-header-content no-text has-icon row">
          <h2><i class="fa fa-meh-o"></i><?php _e('404 Error ', 'pmc'); ?></h2>
          <p class="page-description"><?php _e( 'This is somewhat embarrassing, isn’t it?', 'pmc' ); ?></p>
        </div>
      </div>
    </div>
  </header>
	<div class="container">
		<div class="eight columns" role="main">
			<div class="page-wrapper">
				<div class="page-content">
					<h3><?php _e( '"Oops, I screwed up and you discovered my fatal flaw. 
							Well, we\'re not all perfect, but we try.  Can you try this
							again or maybe visit our <a 
							title="Our Site" href="/">Home 
							Page</a> to start fresh.  We\'ll do better next time."', 'pmc' ); ?>
														
					</h3>
				  <section id="big-search">
				    <form method="get" id="searchform" action="<?php echo get_post_type_archive_link( 'tutorial' ); ?>">
				      <div class="container">
				        <div class="twelve columns">
				          <div class="big-search-container">
				            <label for="big_search_input">
				              <span class="fa fa-search"></span>
				              <input value="<?php the_search_query(); ?>" name="s" id="big_search_input" type="text" placeholder="Busque por tutoriais..." />
				            </label>
				          </div>
				        </div>
				      </div>
				    </form>
				  </section>
				</div>
			</div>

		</div>
	</div>

<?php get_footer(); ?>