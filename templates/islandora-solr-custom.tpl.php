<?php

/**
 * @file islandora-solr-custom.tpl.php
 * Islandora solr search results template
 *
 * Variables available:
 * - $variables: all array elements of $variables can be used as a variable. e.g. $base_url equals $variables['base_url']
 * - $base_url: The base url of the current website. eg: http://example.com .
 * - $user: The user object.
 *
 * - $style: the style of the display ('div' or 'table'). Set in admin page by default. Overridden by the query value: ?display=foo
 * - $results: the array containing the solr search results
 * - $table_rendered: If the display style is set to 'table', this will contain the rendered table.
 *    For theme overriding, see: theme_islandora_solr_custom_table()
 * - $switch_rendered: The rendered switch to toggle between display styles
 *    For theme overriding, see: theme_islandora_solr_custom_switch()
 *
 */
?>

<?php print $switch_rendered; ?>

<?php if ($style == 'div'): ?>
<!-- 
  Basic layout:
  ol
    li (100%, some padding, border, alternating even/odd)
      div for thumbnail (fixed-width, vertically blocking, set minimum height with padding)
        img (thumbnail)
      div for rest (variable-width, height)
        foreach field (title (PAGE!?), creator):
        div (full width, fixed height?, borders)
        
  Total Field List:
    Title ~ mods_title_ms (: mods_subtitle_ms)
    Creator ~ mods_name_creator_ms
    Source Collection ~ mods_host_title_ms
    Type of Resource ~ mods_resource_type_ms
    Date ~ mods_dateOther_s
-->
<ol class="islandora_solr_results" start="<?php print $record_start; ?>">
  <?php if ($results == ''): print '<p>' . t('Your search yielded no results') . '</p>'; ?>
  <?php else: ?>
  <?php $z = 0; ?>
  <?php $zebra = 'even'; ?>
  <?php foreach ($results as $id => $result): ?>

    <?php
      // if no page thumbnail exists, use the parent (book cover) one
      $item_title = $result['mods_title_ms']['value'];
      $link_url = $base_url.'/fedora/repository/'.$result['PID']['value'];
      $creator_value = ( empty( $result['mods_name_creator_ms']['value']) ? false : $result['mods_name_creator_ms']['value'] );
      $form = ( empty( $result['mods_physical_description_form_material_ms']['value']) ? false : $result['mods_physical_description_form_material_ms']['value'] );
      $phys_note = ( empty( $result['mods_physical_description_note_ms']['value']) ? false : $result['mods_physical_description_note_ms']['value'] );
      $source_collection_value = ( empty( $result['mods_host_title_ms']['value']) ? false : $result['mods_host_title_ms']['value'] );
      $type_value = ( empty( $result['mods_resource_type_ms']['value']) ? false : $result['mods_resource_type_ms']['value'] );
      $tn_url = $base_url."/fedora/repository/".$result['PID']['value']."/TN";
      $handle = @fopen($tn_url,'r');
      $thumbnail = '';
      if ($handle !== false) {
        // gravy
        $thumbnail = '<img src="'.$tn_url.'" title="' . $result['mods_title_ms']['value'] . '" alt="' . $result['mods_title_ms']['value'] . '" />';
        fclose($handle);             
      } else {
        // look for, use, parent TN
        $thumbnail = '<img src="'.$base_url.'/'.drupal_get_path('theme','williams').'/images/not_available.png" alt="no image available" title="no image available"/>';
      }
    ?>

    <?php $zebra = (($z % 2) ? 'odd' : 'even' ); ?>
    <?php $first = (($z == 0) ? ' first' : '' ); ?>
    <?php $last = (($z >= count($results)-1) ? ' last' : '' ); ?>
    <?php $z++;?>
    <li class="islandora_solr_result <?php print $zebra.$first.$last ?>">

      <div class="solr-left">
        <a href="<?php print $link_url; ?>">
          <?php print $thumbnail; ?>
        </a>
      </div>

      <div class="solr-right">

        <div class="solr-field <?php print $result['mods_title_ms']['class']; ?>">
          <!--div class="label"><label><?php print t($result['mods_title_ms']['label']); ?></label></div-->
          <div class="value">
            <a href="<?php print $link_url; ?>" title="<?php print $item_title; ?>">
              <?php print $item_title; ?>
            </a>
          </div>
        </div>

        <?php if($creator_value): ?>
        <div class="solr-field <?php print $result['mods_name_creator_ms']['class']; ?>">
          <div class="value"><label>
          <?php print t($result['mods_name_creator_ms']['label']); ?>
          </label>
          <?php print $creator_value; ?></div>
        </div>
        <?php endif; ?>

        <?php if($form): ?>
        <div class="solr-field <?php print $result['mods_physical_description_form_material_ms']['class']; ?>">
          <div class="value"><label>
          <?php print t($result['mods_physical_description_form_material_ms']['label']); ?>
          </label>
          <?php print $form; ?></div>
        </div>
        <?php endif; ?>

        <?php if($type_value): ?>
        <div class="solr-field <?php print $result['mods_resource_type_ms']['class']; ?>">
          <div class="value"><label>
          <?php print t($result['mods_resource_type_ms']['label']); ?>
          </label>
          <?php print $type_value; ?></div>
        </div>
        <?php endif; ?>

        <?php if($phys_note): ?>
        <div class="solr-field <?php print $result['mods_physical_description_note_ms']['class']; ?>">
          <div class="value"><label>
          <?php print t($result['mods_physical_description_note_ms']['label']); ?>
          </label>
          <?php print $phys_note; ?></div>
        </div>
        <?php endif; ?>

      </div>
      <div class="solr-clear"></div>
    </li>
    <?php endforeach; ?>
  <?php endif; ?>
</ol>

<?php elseif ($style == 'table'): ?>

<?php print $table_rendered; ?>

<?php endif;
