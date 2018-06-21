<?php

class PMC_Tutorials {

  function __construct() {
    add_action('init', array($this, 'register_post_type'));
    add_action('pre_get_posts', array($this, 'pre_get_posts'));
    add_action('admin_menu', array($this, 'tutorial_add_meta_box'));
    add_action('save_post', array($this, 'save_tutorial_meta_box'), 10, 2);
  }

  function register_post_type() {
    $labels = array(
      'name'               => _x( 'Tutorials', 'post type general name', 'pmc' ),
      'singular_name'      => _x( 'Tutorial', 'post type singular name', 'pmc' ),
      'menu_name'          => _x( 'Tutorials', 'admin menu', 'pmc' ),
      'name_admin_bar'     => _x( 'Tutorials', 'add new on admin bar', 'pmc' ),
      'add_new'            => _x( 'Add new tutorial', 'tutorial', 'pmc' ),
      'add_new_item'       => __( 'Add new tutorial', 'pmc' ),
      'new_item'           => __( 'New tutorial', 'pmc' ),
      'edit_item'          => __( 'Edit tutorial', 'pmc' ),
      'view_item'          => __( 'View tutorial', 'pmc' ),
      'all_items'          => __( 'All tutorials', 'pmc' ),
      'search_items'       => __( 'Search tutorial\'s posts', 'pmc' ),
      'not_found'          => __( 'No tutorials found.', 'pmc' ),
      'not_found_in_trash' => __( 'No tutorials found in trash.', 'pmc' )
    );

    $capabilities = array(
      'edit_published_posts'    => 'edit_published_tutorials',
      'publish_posts'           => 'publish_tutorials',
      'delete_published_posts'  => 'delete_published_tutorials',
      'edit_posts'              => 'edit_tutorials',
      'delete_posts'            => 'delete_tutorials'
  );

    $args = array(
      'labels'             => $labels,
      'description'        => __( 'Tutorials Posts', 'pmc' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'tutoriais' ),
      'capabilities'       => $capabilities,
      'map_meta_cap'       => true,
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'related_version', 'thumbnail', 'revisions' )
    );

    register_post_type( 'tutorial', $args );

    $labels = array(
      'name'              => __( 'Categories', 'pmc' ),
      'singular_name'     => __( 'Category', 'pmc' ),
      'search_items'      => __( 'Search Categories', 'pmc' ),
      'all_items'         => __( 'All categories', 'pmc' ),
      'parent_item'       => __( 'Parent category', 'pmc' ),
      'parent_item_colon' => __( 'Parent category:', 'pmc' ),
      'edit_item'         => __( 'Edit category', 'pmc' ),
      'update_item'       => __( 'Update category', 'pmc' ),
      'add_new_item'      => __( 'Add new category', 'pmc' ),
      'new_item_name'     => __( 'New category name', 'pmc' ),
      'menu_name'         => __( 'Categories', 'pmc' ),
    );

    register_taxonomy( 'tutorial_category', array( 'tutorial' ), array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
      )
    );

  }

  function pre_get_posts($query) {
    $target_group = ( get_query_var('target_group') ) ? get_query_var('target_group') : '';
    if($target_group) {
      $query->set("meta_key", "tutorial_group_target");
      $query->set("meta_value", esc_html($target_group));
    }
  }

  function tutorial_add_meta_box() {
    add_meta_box('tutorial-meta-box',
      __('Additional info', 'pmc'),
      array($this, 'display_tutorial_meta_box'),
      'tutorial',
      'normal',
      'high'
    );
  }

  function display_tutorial_meta_box($object, $box){
    $metas = $this->tutorial_get_metas();

    foreach($metas as $meta) { ?>
      <?php

    if ($meta['html']['tag'] == 'select')
      {
        ?>
          <p>
          <label for="<?php echo $meta['slug'] ?>"><?php echo $meta['label'] ?>:</label>
          <br>
          <select name="<?php echo $meta['slug'] ?>">
          <?php
            foreach ($meta['html']['options'] as $option) {
            $content = $option['content'];
          ?>
            <option value="<?php echo $option['value'] ?>"
              <?php echo esc_html(get_post_meta($object->ID, $meta['slug'] , true), 1) === $option['value'] ? 'selected' : ''; ?> >
              <?php echo ucwords($content) ?>
            </option>
            <?php
        }
        ?>
          </select>
          </p>
          <?php

      }
      else if ( $meta['html']['tag'] == 'input' ) { ?>
        <p>
          <label for="<?php echo $meta['slug'] ?>"><?php echo $meta['label'] ?></label>
          <br>
         <input type="<?php echo $meta['html']['type'] ?>" name="<?php echo $meta['slug'] ?>"
           id="<?php echo $meta['slug'] ?>" style="width:50%"
           value="<?php echo get_post_meta($object->ID, $meta['slug'] , true); ?>">
          </p>
      <?php
      }
    }

  }

  function tutorial_get_metas(){
    $metas = [];
    $metas[] = array (
      'label' => __('Group Target', 'pmc'),
      'slug'=>'tutorial_group_target' ,
      'info' => __('No target group was informed', 'pmc') ,
      'html' => array (
        'tag'=> 'select',
        'options' => array(
          array('content' => __('agents', 'pmc'), 'value' => '2'),
          array('content' => __('maintainers', 'pmc'), 'value' => '1')
        )
      )
    );

    $metas[] = array (
      'label' => __('Difficulty','pmc'),
      'slug'=> 'tutorial_difficulty' ,
      'info' => __('No difficulty was informed', 'pmc') ,
      'html' => array (
        'tag'=> 'select',
        'options' => array(
          array('content' => __('easy', 'pmc'), 'value' => '1'),
          array('content' => __('medium', 'pmc'), 'value' => '2'),
          array('content' => __('advanced', 'pmc'), 'value' => '3')
        )
      )
    );

    return $metas;
  }

  function save_tutorial_meta_box($post_id, $post) {
    if (!current_user_can('edit_post', $post_id))
      return;

    $metas = $this->tutorial_get_metas();

    foreach ( $metas as $meta) {
      if (isset($_POST[$meta['slug']])) {
        $meta_striped = stripslashes($_POST[$meta['slug']]);

        if ($meta_striped && '' == get_post_meta($post_id, $meta['slug'], true)){
          add_post_meta($post_id, $meta['slug'], $meta_striped, true);
          if ($meta['slug'] == 'tutorial_group_target'){
            if ($meta_striped == '2') {
              add_post_meta($post_id, $meta['slug'].'_label', __('agents', 'pmc') , true);
            }
            else {
              add_post_meta($post_id, $meta['slug'].'_label', __('maintainers', 'pmc') , true);
            }
          }

          if ($meta['slug'] == 'tutorial_difficulty'){
            if ($meta_striped == '1') {
              update_post_meta($post_id, $meta['slug'].'_label', __('easy', 'pmc'));
            }
            else if ($meta_striped == '2'){
              update_post_meta($post_id, $meta['slug'].'_label', __('medium', 'pmc'));
            }
            else if ($meta_striped == '3'){
              update_post_meta($post_id, $meta['slug'].'_label', __('advanced', 'pmc'));
            }
          }
        }

        elseif ($meta_striped != get_post_meta($post_id, $meta['slug'], true)){
          update_post_meta($post_id, $meta['slug'], $meta_striped);
          if ($meta['slug'] == 'tutorial_group_target'){
            if ($meta_striped == '2') {
              update_post_meta($post_id, $meta['slug'].'_label', __('agents', 'pmc'));
            }
            else {
              update_post_meta($post_id, $meta['slug'].'_label', __('maintainers', 'pmc'));
            }
          }
          if ($meta['slug'] == 'tutorial_difficulty'){
            if ($meta_striped == '1') {
              update_post_meta($post_id, $meta['slug'].'_label', __('easy', 'pmc'));
            }
            else if ($meta_striped == '2'){
              update_post_meta($post_id, $meta['slug'].'_label', __('medium', 'pmc'));
            }
            else if ($meta_striped == '3'){
              update_post_meta($post_id, $meta['slug'].'_label', __('advanced', 'pmc'));
            }
          }
        }

        elseif ('' == $meta_striped && get_post_meta($post_id, $meta['slug'], true)){
          delete_post_meta($post_id, $meta['slug'], get_post_meta($post_id, $meta['slug'], true));
          if ($meta['slug'] == 'tutorial_group_target'){
            if ($meta_striped == '2') {
              delete_post_meta($post_id, $meta['slug'].'_label', __('The content don\'t have group target', 'pmc'));
            }
            else {
              delete_post_meta($post_id, $meta['slug'].'_label', __('The content don\'t have group target', 'pmc'));
            }
          }

          if ($meta['slug'] == 'tutorial_difficulty'){
            if ($meta_striped == '1') {
              update_post_meta($post_id, $meta['slug'].'_label', __('The content don\'t have difficulty', 'pmc'));
            }
            else if ($meta_striped == '2'){
              update_post_meta($post_id, $meta['slug'].'_label', __('The content don\'t have difficulty', 'pmc'));
            }
            else if ($meta_striped == '3'){
              update_post_meta($post_id, $meta['slug'].'_label', __('The content don\'t have difficulty', 'pmc'));
            }
          }
        }
      }
    }
  }


}

$pmc_tutorials = new PMC_Tutorials();
