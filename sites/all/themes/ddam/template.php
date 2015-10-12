<?php

/**
 * @file
 * template.php
 */
 /* hack field  tabs */
   // esto sirve para que siempre se cargen las librerias js y estilos css de base para horizontal tabs de field_group module
   // cuando field_group no tiene ningun grupo con horizontal-tabs no las cargaria
   // -> hay html de "horizontal tabs" usado directamente en el template node--full--persona.tpl.php

function ddam_bootstrap_search_form_wrapper($variables) {
  $output = '<div class="input-group">';
  $output .= $variables['element']['#children'];
  $output .= '<span class="input-group-btn">';
  $output .= '<button type="submit" class="btn btn-default">';
  // We can be sure that the font icons exist in CDN.
/*  if (theme_get_setting('bootstrap_cdn')) {
    $output .= _bootstrap_icon('search');
  }
  else {
    $output .= t('Search');
  }
*/
  $output .= '<i class="glyphicon glyphicon-search"></i>';
  $output .= '</button>';
  $output .= '</span>';
  $output .= '</div>';
  return $output;
}
 drupal_add_css(drupal_get_path('module', 'field_group') . '/horizontal-tabs/horizontal-tabs.css', array('group' => CSS_DEFAULT));
 drupal_add_js('sites/all/modules/field_group/horizontal-tabs/horizontal-tabs.js', 'file');
?>
