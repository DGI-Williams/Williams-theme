<?php
/* theme and preprocess functions */

/**
 * Implements hook_preprocess().
 */
function williams_preprocess_page(&$vars) {

  // include top navigation
  $vars['top_nav'] = _williams_top_nav();

  // include footer info
  $vars['footer_info'] = _williams_info();

  // modify front page
  if ($vars['is_front']) {
  
    //drupal_set_title('Maya Motul de San Jose');
  
    // set title
    $vars['title'] = 'Maya Motul de San Jose';
    // set content
    $vars['content'] = _williams_content_front();
  }
}



/**
 * Top navigation
 */
function _williams_top_nav() {
  
  // set variables
  global $user;
  $items = array();
  
  // manage repository link
  if (in_array('authenticated user', $user->roles)) {
    $items[] = l(t('Manage collection'), 'fedora/repository');
  }

  // login/logout

  if ($user->uid == 0) {
    $items[] = l(t('Log in'), 'user');
  }
  else {
    $items[] = l(t('Log out'), 'logout');
  }

  return theme('item_list', $items, NULL, 'ul', $attributes = array('class' => 'top-nav'));
}



/**
 * footer info message
 */
function _williams_info() {

  $output = '';
  $output .= '<div class="footer-info">';
  $output .= '<h2>' . t('Maya Motul de San Jose') . '</h2>';
  $output .= l(t('http://motul-archeology.williams.edu'), 'http://motul-archeology.williams.edu');
  $output .= '<br />';
  $output .= l(t('Rights and reproductions'), '<front>');
  $output .= '<br />';
  $output .= l(t('example@williams.edu'), 'mailto:example@williams.edu', array('absolute' => TRUE, 'attributes' => array('class' => 'contact-link')));
  $output .= '</div>';
  
  return $output;
}


/**
 * Front page content
 */
function _williams_content_front() {
  // get node content
  $node = node_load(2);
  $content = $node->body;
  
  // get random image
  $random_image = _williams_random_image();
  
  // get view
  $view_name = 'slideshow';
  $display_id = 'block_1';
  $view = views_embed_view($view_name, $display_id);
  
  // output
  $output = '';

  // right
  $output .= '<div class="front-right">';
  $output .= $random_image;
  $output .= '</div>';
  // left
  $output .= '<div class="front-left">';
  $output .= $content;
  $output .= '</div>';
  // bottom
  $output .= '<div class="front-bottom">';
  $output .= $view;
  $output .= '</div>';

  return $output;
}


function _williams_random_image() {
  // get global
  global $base_path;
  global $base_url;

  // set variable
  // find images
  $directory = drupal_get_path('theme', 'williams') . '/images/front';
  $mask = '.png';
  $files = file_scan_directory($directory, $mask);
  
  $file_paths = array();
  foreach ($files as $value) {
    $file_paths[] = $value->filename;
  }
  
  
  $rand_key = array_rand($file_paths, 1);
  $file = $file_paths[$rand_key];
  
  // create image, title and links
  $img = '<img src="' . $base_url . '/' . $file . '" />';
 
  return $img;
}






