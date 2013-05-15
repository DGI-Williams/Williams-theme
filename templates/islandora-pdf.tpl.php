<?php

/**
 * @file
 * This is the template file for the pdf object
 *
 * @TODO: Add documentation about this file and the available variables
 */
?>

<div class="islandora-pdf-object islandora">
  <div class="islandora-pdf-content-wrapper clearfix">
    <?php if (isset($islandora_content)): ?>
      <div class="islandora-pdf-content">
        <?php print $islandora_content; ?>
      </div>
      <?php print $islandora_download_link; ?>
    <?php endif; ?>
  <div class="islandora-pdf-sidebar">
    <?php if (isset($mods_abstract)): ?>
      <h2>Description</h2>
      <p><?php print $mods_abstract; ?></p>
    <?php endif; ?>
    <?php if($parent_collections): ?>
      <div>
        <h2><?php print t('In collections'); ?></h2>
        <ul>
          <?php foreach ($parent_collections as $collection): ?>
            <li><?php print l($collection->label, "islandora/object/{$collection->id}"); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
  </div>
  <fieldset class="collapsible collapsed islandora-pdf-metadata">
  <legend><span class="fieldset-legend"><?php print t('Extended details'); ?></span></legend>
    <div class="fieldset-wrapper">
      <div id="williams-metadata-wrapper">
        <?php print $metadata_table ?>
      </div>
    </div>
  </fieldset>
</div>
