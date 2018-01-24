<?php

class PMC_Tutorials {

  function __construct() {
    add_action('init', array($this, 'register_post_type'));
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
      'rewrite'            => array( 'slug' => 'tutorials' ),
      'capabilities'       => $capabilities,
      'map_meta_cap'       => true,
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'related_version', 'thumbnail', 'revisions' )
    );

    register_post_type( 'tutorial', $args );

    $labels = array(
      'name'              => esc_html__( 'Categories', 'pmc' ),
      'singular_name'     => esc_html__( 'Category', 'pmc' ),
      'search_items'      => esc_html__( 'Search Categories', 'pmc' ),
      'all_items'         => esc_html__( 'All Categories', 'pmc' ),
      'parent_item'       => esc_html__( 'Parent Category', 'pmc' ),
      'parent_item_colon' => esc_html__( 'Parent Category:', 'pmc' ),
      'edit_item'         => esc_html__( 'Edit Category', 'pmc' ),
      'update_item'       => esc_html__( 'Update Category', 'pmc' ),
      'add_new_item'      => esc_html__( 'Add New Category', 'pmc' ),
      'new_item_name'     => esc_html__( 'New Category Name', 'pmc' ),
      'menu_name'         => esc_html__( 'Categories', 'pmc' ),
    );

    register_taxonomy( 'category_tutorial', array( 'tutorial' ), array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
      )
    );

  }

  function tutorial_add_meta_box() {
    add_meta_box('tutorial-meta-box', 
      __('More Info\'s', 'pmc'), 
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
          setlocale(LC_ALL, "en_US.utf8");
        foreach ($meta['html']['options'] as $option) {
          $content = iconv("utf-8", "ascii//TRANSLIT", $option['content']);
          ?>
            <option value="<?php echo $option['value'] ?>" <?php echo esc_html(get_post_meta($object->ID, $meta['slug'] , true), 1) === $option['value'] ? 'selected' : ''; ?> ><?php echo ucwords(strtolower($content)) ?></option>
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
      'label' => 'Group Target', 
      'slug'=>'tutorial_group_target' ,
      'info' => __('No target group was informed', 'pmc') , 
      'html' => array (
        'tag'=> 'select', 
        'options' => array(
          array('content' => __('for agent\'s', 'pmc'), 'value' => '2'),
          array('content' => __('for manager\'s'), 'value' => '1')
        )
      )
    );

    $metas[] = array ( 
      'label' => 'Difficulty', 
      'slug'=>'tutorial_difficulty' ,
      'info' => __('No difficulty was informed', 'pmc') , 
      'html' => array (
        'tag'=> 'input',
        'type' => 'text' 
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
              add_post_meta($post_id, $meta['slug'].'_label', __('for agent\'s', 'pmc') , true);
            }
            else {
              add_post_meta($post_id, $meta['slug'].'_label', __('for manager\'s') , true);
            }
          }
        }

        elseif ($meta_striped != get_post_meta($post_id, $meta['slug'], true)){
          update_post_meta($post_id, $meta['slug'], $meta_striped);
          if ($meta['slug'] == 'tutorial_group_target'){
            if ($meta_striped == '2') {
              update_post_meta($post_id, $meta['slug'].'_label', __('for agent\'s', 'pmc'));
            }
            else {
              update_post_meta($post_id, $meta['slug'].'_label', __('for manager\'s'));
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
        }
      }
    }
  }


}

$pmc_tutorials = new PMC_Tutorials();
