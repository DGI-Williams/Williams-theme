<?php
/* theme and preprocess functions */

/**
 * Implements hook_preprocess().
 */
function williams_preprocess_page(&$vars) {

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
  $pids = array('motul:635', 'motul:553', 'motul:417', 'motul:428');

  // select a random PID
  $rand_key = array_rand($pids, 1);
  $pid = $pids[$rand_key];

  // SPARQL query
  $query='PREFIX fedora_model: <info:fedora/fedora-system:def/model#>
SELECT $label 
FROM <#ri>
WHERE {
{
<info:fedora/' . $pid . '> fedora_model:label $label
}
}';

  $limit = -1;
  $offset = 0 ;
  $type = 'sparql';
  // get fedora url
  $query_url = variable_get('fedora_repository_url', 'http://localhost:8080/fedora/risearch');
  //run query
  $query_url .= "?type=tuples&flush=TRUE&format=Sparql" . (($limit > 0)?("&limit=$limit"):"") . "&offset=$offset&lang=$type&query=" . urlencode($query);
  // include file where do_curl is defined
  module_load_include('inc', 'fedora_repository', 'api/fedora_utils');
  // do curl and populate variable with the returned xml string
  $query_return_string = do_curl($query_url);

  if ($query_return_string) {
    // create object from string
    $query_return_dom = DOMDocument::loadXML($query_return_string);
    // create xpath object from xml object
    $xpath_dom = new DOMXPath($query_return_dom);
    // register namespace
    $xpath_dom->registerNamespace('sw', 'http://www.w3.org/2001/sw/DataAccess/rf1/result');
    // use namespace for the xpath
    $xpath = '//sw:label';
    // create object with the results
    $entries = $xpath_dom->query($xpath);

    // alternatively, if you just want to use the first returned item, use: 
    $label = $entries->item(0)->nodeValue;
  }

  // create image, title and links
  $img = '<img src="' . $base_url . '/fedora/repository/' . $pid . '/TN/TN" />';
  $output = l($img, 'fedora/repository/' . $pid, array('html' => TRUE, 'attributes' => array('title' => $label)));
  $output .= '<br />';
  $output .= l($label, 'fedora/repository/' . $pid, array('attributes' => array('title' => $label)));
  
  return $output;

}






