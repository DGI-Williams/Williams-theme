<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * A QUICK OVERVIEW OF DRUPAL THEMING
 *
 *   The default HTML for all of Drupal's markup is specified by its modules.
 *   For example, the comment.module provides the default HTML markup and CSS
 *   styling that is wrapped around each comment. Fortunately, each piece of
 *   markup can optionally be overridden by the theme.
 *
 *   Drupal deals with each chunk of content using a "theme hook". The raw
 *   content is placed in PHP variables and passed through the theme hook, which
 *   can either be a template file (which you should already be familiary with)
 *   or a theme function. For example, the "comment" theme hook is implemented
 *   with a comment.tpl.php template file, but the "breadcrumb" theme hooks is
 *   implemented with a theme_breadcrumb() theme function. Regardless if the
 *   theme hook uses a template file or theme function, the template or function
 *   does the same kind of work; it takes the PHP variables passed to it and
 *   wraps the raw content with the desired HTML markup.
 *
 *   Most theme hooks are implemented with template files. Theme hooks that use
 *   theme functions do so for performance reasons - theme_field() is faster
 *   than a field.tpl.php - or for legacy reasons - theme_breadcrumb() has "been
 *   that way forever."
 *
 *   The variables used by theme functions or template files come from a handful
 *   of sources:
 *   - the contents of other theme hooks that have already been rendered into
 *     HTML. For example, the HTML from theme_breadcrumb() is put into the
 *     $breadcrumb variable of the page.tpl.php template file.
 *   - raw data provided directly by a module (often pulled from a database)
 *   - a "render element" provided directly by a module. A render element is a
 *     nested PHP array which contains both content and meta data with hints on
 *     how the content should be rendered. If a variable in a template file is a
 *     render element, it needs to be rendered with the render() function and
 *     then printed using:
 *       <?php print render($variable); ?>
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. With this file you can do three things:
 *   - Modify any theme hooks variables or add your own variables, using
 *     preprocess or process functions.
 *   - Override any theme function. That is, replace a module's default theme
 *     function with one you write.
 *   - Call hook_*_alter() functions which allow you to alter various parts of
 *     Drupal's internals, including the render elements in forms. The most
 *     useful of which include hook_form_alter(), hook_form_FORM_ID_alter(),
 *     and hook_page_alter(). See api.drupal.org for more information about
 *     _alter functions.
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   If a theme hook uses a theme function, Drupal will use the default theme
 *   function unless your theme overrides it. To override a theme function, you
 *   have to first find the theme function that generates the output. (The
 *   api.drupal.org website is a good place to find which file contains which
 *   function.) Then you can copy the original function in its entirety and
 *   paste it in this template.php file, changing the prefix from theme_ to
 *   williams7_. For example:
 *
 *     original, found in modules/field/field.module: theme_field()
 *     theme override, found in template.php: williams7_field()
 *
 *   where williams7 is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_field() function.
 *
 *   Note that base themes can also override theme functions. And those
 *   overrides will be used by sub-themes unless the sub-theme chooses to
 *   override again.
 *
 *   Zen core only overrides one theme function. If you wish to override it, you
 *   should first look at how Zen core implements this function:
 *     theme_breadcrumbs()      in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called theme hook suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node--forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and theme hook suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440 and http://drupal.org/node/1089656
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function williams7_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  williams7_preprocess_html($variables, $hook);
  williams7_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function williams7_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function williams7_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function williams7_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // williams7_preprocess_node_page() or williams7_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function williams7_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function williams7_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function williams7_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

/**
 * Implements hook_preprocess().
 */
function williams7_preprocess_islandora_large_image(&$variables) {
  william7_mods_display($variables['islandora_object']);
  if($mods = william7_mods_display($variables['islandora_object'])) {
    $variables['dc_array'] = $mods;
  }
}

function william7_mods_display($object) {
  $mods_metadata = array();
  if($object['MODS']) {
    $mods = new SimpleXMLElement($object['MODS']->content);

    $mods_info = array(
      array("label" => "Title", "path" => "mods:titleInfo/mods:title/text()"),
      array("label" => "Site", "path" => "mods:subject/mods:hierarchicalGeographic/text()"),
      array("label" => "Operation", "path" => "mods:note[@type='operation']/text()"),
      array("label" => "Suboperation", "path" => "mods:note[@type='subop']/text()"),
      array("label" => "Unit", "path" => "mods:note[@type='unit']/text()"),
      array("label" => "Level", "path" => "mods:note[@type='level']/text()"),
      array("label" => "Lot", "path" => "mods:note[@type='lot']/text()"),
      array("label" => "Citation", "path" => "mods:note[@type='citation']/text()"),
      array("label" => "Subject/Keywords", "path" => "mods:subject[not(mods:*)]/text()"),
      array("label" => "Creator", "path" => "mods:name/mods:namePart[../mods:role/mods:roleTerm/text()='creator']"),
      array("label" => "Contributor", "path" => "mods:name/mods:namePart[../mods:role/mods:roleTerm/text()='contributor']"),
      array("label" => "Source", "path" => "mods:name/mods:namePart[../mods:role/mods:roleTerm/text()='photographer']"),
      array("label" => "Department", "path" => "mods:name/mods:namePart[../mods:role/mods:roleTerm/text()='department']"),
      array("label" => "Language", "path" => "mods:language/mods:languageTerm/text()"),
      array("label" => "Slide", "path" => "mods:identifier[@type='slide']/text()"),
      array("label" => "Batch", "path" => "mods:identifier[@type='batch']/text()"),
      array("label" => "Catalog", "path" => "mods:identifier[@type='catalog']/text()"),
      array("label" => "Analysis", "path" => "mods:identifier[@type='analysis']/text()"),
      array("label" => "INAA", "path" => "mods:identifier[@type='INAA']/text()"),
      array("label" => "Petrography", "path" => "mods:identifier[@type='petrography']/text()"),
      array("label" => "Vessel", "path" => "mods:identifier[@type='vessel']/text()"),
      array("label" => "Rights", "path" => "mods:accessCondition/text()"),
      array("label" => "Type of Resource", "path" => "mods:typeOfResource/text()"),
      array("label" => "Date Created", "path" => "mods:dateCreated/text()"),
      array("label" => "Time", "path" => "mods:subject/mods:temporal/text()"),
      array("label" => "Geographic", "path" => "mods:subject/mods:geographic/text()"),
      array("label" => "Unit", "path" => "mods:subject[@displayLabel='']/mods:topic/text()"),
      array("label" => "Architectural Feature", "path" => "mods:subject[@displayLabel='architectural feature']/mods:topic/text()"),
      array("label" => "Type of Discovery", "path" => "mods:subject[@displayLabel='discovery']/mods:topic/text()"),
      array("label" => "Cultural Keywords", "path" => "mods:subject[@displayLabel='culture keywords']/mods:topic/text()"),
      array("label" => "Soil Type", "path" => "mods:subject[@displayLabel='environmental keywords']/mods:topic/text()"),
      array("label" => "Note", "path" => "mods:note[not(@type)]/text()"),
      array("label" => "Description", "path" => "mods:abstract/text()"),
      array("label" => "Physical Description", "path" => "mods:physicalDescription/mods:note/text()"),
      array("label" => "Ceramic Type", "path" => "mods:physicalDescription/mods:form[@type='material']/text()"),
      array("label" => "Physical Location", "path" => "mods:location/mods:physicalLocation/text()"),
      array("label" => "Url", "path" => "mods:location/mods:url/text()"),
      array("label" => "Suboperation Description", "path" => "mods:subject/mods:topic"),
      array("label" => "Coordinates", "path" => "mods:subject/mods:cartographics/mods:coordinates"),
      array("label" => "Date Captured", "path" => "mods:originInfo/mods:dateCaptured"),
      array("label" => "Publisher", "path" => "mods:originInfo/mods:publisher"),
      array("label" => "Place of Publication", "path" => "mods:originInfo/mods:place/mods:placeTerm"),
      array("label" => "Date Published", "path" => "mods:originInfo/mods:dateIssued"),
    );

    foreach($mods_info as $info) {
      $path = $info['path'];
      $value = $mods->xpath("/mods:mods/$path");
      if(count($value) >= 1) {
        $value = (string)$value[0];
        if($value) {
          $mods_metadata[] = array(
            'label' => $info['label'],
            'value' => trim((string) $value),
          );
        }
      }
    }
    if(count($mods_metadata) == 0) {
      $mods_metadata = FALSE;
    }
  }
  else {
    $mods_metadata = FALSE;
  }
  return $mods_metadata;
}