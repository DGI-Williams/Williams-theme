<?php
/* theme and preprocess functions */

/**
 * Implements hook_preprocess().
 */
function williams_preprocess_page(&$vars) {

  $vars['footer_info'] = _williams_info();

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