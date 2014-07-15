<?php

class CerPresetFeaturesController extends EntityDefaultFeaturesController {

  /**
   * Overridden.
   */
  public function export($data, &$export, $module = '') {
    $pipe = parent::export($data, $export, $module);

    foreach (entity_load_multiple_by_name($this->type, $data) as $preset) {
      $pipe = array_merge_recursive($pipe, $preset->wrapper->cer_left->chain->value()->export());
      $pipe = array_merge_recursive($pipe, $preset->wrapper->cer_right->chain->value()->export());
    }

    return $pipe;
  }

}
