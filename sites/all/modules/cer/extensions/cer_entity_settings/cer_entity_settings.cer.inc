<?php

/**
 * Implements hook_cer_preset_create().
 */
function cer_entity_settings_cer_preset_create(CerPreset $preset) {
  _cer_entity_settings_create_instance($preset->left->end());
  _cer_entity_settings_create_instance($preset->right->end());
}

/**
 * Implements hook_cer_preset_delete().
 */
function cer_entity_settings_cer_preset_delete(CerPreset $preset) {
  _cer_entity_settings_delete_instance($preset->left->end());
  _cer_entity_settings_delete_instance($preset->right->end());
}


/**
 * Implements hook_cer_entity_insert().
 */
function cer_entity_settings_cer_entity_insert(array &$presets, EntityDrupalWrapper $entity) {
  _cer_entity_settings_process($presets, $entity);
}

/**
 * Implements hook_cer_entity_update().
 */
function cer_entity_settings_cer_entity_update(array &$presets, EntityDrupalWrapper $entity) {
  $raw = $entity->value();

  // If $raw->original exists, we can be pretty certain that this hook is not
  // being invoked during a bulk update. Otherwise, we'll try to load any
  // stored settings for this entity; if settings exist, we modify the preset
  // list, and if they don't, we're done.
  if (isset($raw->original)) {
    _cer_entity_settings_process($presets, $entity);
  }
  else {
    $raw->cer = db_select('cer_entity_settings', 'ces')
      ->fields('ces', array(
        'pid',
      ))
      ->condition('entity_type', $entity->type())
      ->condition('entity_id', $entity->getIdentifier())
      ->condition('status', 1)
      ->execute()
      ->fetchCol();
      
    if ($raw->cer) {
      $entity->set($raw);
      _cer_entity_settings_process($presets, $entity);
    }
  }
}

function _cer_entity_settings_process(array &$presets, EntityDrupalWrapper $entity) {
  $raw = $entity->value();

  if (isset($raw->cer)) {
    foreach (array_keys($presets) as $id) {
      if (! in_array($id, $raw->cer)) {
        unset($presets[$id]);
      }
    }
  }
}
