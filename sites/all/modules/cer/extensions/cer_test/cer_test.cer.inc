<?php
/**
 * @file
 * cer_test.cer.inc
 */

/**
 * Implements hook_cer_default_presets().
 */
function cer_test_cer_default_presets() {
  $export = array();

  $preset = new CerPreset();
  $preset->disabled = FALSE; /* Edit this to true to make a default preset disabled initially */
  $preset->a = 'node:page:field_author';
  $preset->b = 'user:user:field_my_content';
  $preset->bidirectional = TRUE;
  $preset->weight = -6;
  $export['27274aa687fbbdee4cf32ee43d25e613'] = $preset;

  $preset = new CerPreset();
  $preset->disabled = FALSE; /* Edit this to true to make a default preset disabled initially */
  $preset->a = 'node:article:field_author';
  $preset->b = 'user:user:field_my_content';
  $preset->bidirectional = TRUE;
  $preset->weight = -7;
  $export['2c949d3763368ce5c4485da5c28877af'] = $preset;

  $preset = new CerPreset();
  $preset->disabled = FALSE; /* Edit this to true to make a default preset disabled initially */
  $preset->a = 'node:page:field_tags';
  $preset->b = 'taxonomy_term:tags:field_my_content';
  $preset->bidirectional = TRUE;
  $preset->weight = -9;
  $export['a2b01c099ffb0b9be63a6d03f8b25458'] = $preset;

  $preset = new CerPreset();
  $preset->disabled = FALSE; /* Edit this to true to make a default preset disabled initially */
  $preset->a = 'node:page:field_related_articles';
  $preset->b = 'node:article:field_related_pages';
  $preset->bidirectional = TRUE;
  $preset->weight = -8;
  $export['a5c0fbea67a912b90c50468b9f1f67ba'] = $preset;

  return $export;
}
