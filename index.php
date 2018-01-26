<?php

if ( is_home() ) {
  include_once(TEMPLATEPATH . '/archive.php');
} else if( is_post_type_archive( 'tutorial' ) ) {
	include_once(TEMPLATEPATH . '/archive-tutorial.php');
} else {
  include_once(TEMPLATEPATH . '/inc/404.php');
}