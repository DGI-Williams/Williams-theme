<?php

/**
 * @file
 * This is the template file for the object page for basic image
 *
 * @TODO: add documentation about file and available variables
 */
?>

<div class="islandora-basic-image-object islandora">
  <div class="islandora-basic-image-content-wrapper clearfix">
    <?php if (isset($islandora_content)): ?>
      <div class="islandora-basic-image-content">
        <?php print $islandora_content; ?>
      </div>
    <?php endif; ?>
  <div class="islandora-basic-image-sidebar">
    <?php if (isset($mods_abstract)): ?>
      <h2>Description</h2>
      <p><?php print $mods_abstract; ?></p>
    <?php endif; ?>
    <?php if ($parent_collections): ?>
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
  <fieldset class="collapsible collapsed islandora-basic-image-metadata">
  <legend><span class="fieldset-legend"><?php print t('Details'); ?></span></legend>
    <div class="fieldset-wrapper">
      <div id="williams-metadata-wrapper">
        <?php print $metadata_table ?>
      </div>
    </div>
  </fieldset>
</div>
