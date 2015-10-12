<?php

if(isset($content['group_tabs']['group_informacion_detallada']['group_autoria'])) 
   $a = $content['group_tabs']['group_informacion_detallada']['group_autoria']
;
if(isset($content['group_tabs']['group_informacion_detallada']['group_edicion']))
   $d = $content['group_tabs']['group_informacion_detallada']['group_edicion']
;
if(isset($content['group_tabs']['group_informacion_detallada']['group_descripcion_fisica'])) 
   $f = $content['group_tabs']['group_informacion_detallada']['group_descripcion_fisica']
;
$line1 = $line2 = $line3 = $icons = "";

// line 1
if(isset($a['field_autor'][0]))
   $line1 = render($a['field_autor'][0]) . "."
;

// line 2

$line = array();
if(isset($d['field_lugar_de_publicacion'][0]['#location']['city']))
   $line[] = $d['field_lugar_de_publicacion'][0]['#location']['city']
;
if(isset($d['field_editor'][0]))
   $line[] = render($d['field_editor'][0])
;
if(isset($d['field_edicion'][0]))
   $line[] = $d['field_edicion'][0] ? render($d['field_edicion'][0])."° edición" : ""
;

$separador = ""; foreach ($line as $word) {
    if ($word != "") {
       $line2 .= $separador . $word;
       $separador = ", ";
    }
}
$line2 .= ".";

// line 3


$line = array();
if(isset($d['field_idioma'][0]))
   $line[] = $d['field_idioma'][0] ? render($d['field_idioma'][0]) : ""
;
if(isset($f['field_paginas'][0]))
   $line[] = $f['field_paginas'][0] ? render($f['field_paginas'][0]) . " páginas" : ''
;
if(isset($d['field_fecha_de_publicacion']['#items'][0]['value']))
   $line[] = $d['field_fecha_de_publicacion']['#items'][0]['value'] ? substr($d['field_fecha_de_publicacion']['#items'][0]['value'], 0, 4) : ""
;

$separador = ""; foreach($line as $word) {
    if ($word != "") {
       $line3 .= $separador . $word;
       $separador = ", ";
    }
}
$line3 .= ".";

// icons
if( isset($f['field_caracteristicas_fisicas']) && is_array($f['field_caracteristicas_fisicas']) ) {
   foreach ($f['field_caracteristicas_fisicas'] as $clave => $el)
   {
      if ($clave[0] != "#") {
         $icons .= '<a href="' . $el['#href'] . '" title="' . $el['#title'] .'"><span class="icon-fc icon-' . $el['#options']['entity']->tid . '"></span></a> ';
      }
   }
}


// autores minibox teasers
    // TODO: corregir este código según -> http://www.computerminds.co.uk/articles/rendering-drupal-7-fields-right-way
$autores_miniteasers = '';
if(array_key_exists('und', $node->field_autor)) {
   if(is_array($node->field_autor['und'])) {
      foreach($node->field_autor['und'] as $nodoid ) {
         $node_to_render = node_load($nodoid['target_id']);
         $node_object = node_view( $node_to_render, 'minibox_teaser' );
         $autores_miniteasers .= render( $node_object ). "\n";
      }
   }
}

?>
<!-- libro full -->
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> full clearfix"<?php print $attributes; ?>>

   <div class="row top-items">
   
      <div class="slideshow-box col-sm-6 ">
         <div class="slideshow-imagen">         
            <?php if($img = render($content['field_imagen'][0])): ?>
              <?php print $img; ?>
            <?php else: ?>
              <div data-icon="" class="full-default-img default-img <?php print $node->type; ?>"></div>
            <?php endif; ?>
          </div>
      </div>
      
      <div class="bibliocard-box col-sm-6">
         <div class="bibliocard-wrapper">
         
            <div class="line node-type"><?php print $node->type; ?></div>

            <h1><?php print $node->title; ?></h1>

          <?php if($line1): ?>
            <div class="line first autor"><?php print $line1; ?></div>
          <?php endif;?>

          <?php if($line1): ?>
            <div class="line"><?php print $line2; ?></div>
          <?php endif;?>

          <?php if($line1): ?>
            <div class="line"><?php print $line3; ?></div>
          <?php endif;?>

          <?php if($icons): ?>
            <div class="icons-desc"><?php print $icons; ?></div>
          <?php endif;?>
         </div>
      </div>

   </div>
 
   <?php include DRUPAL_ROOT . base_path() . path_to_theme() . "/templates/actions-tab.inc"; ?>
  
   <div class="row ddam-ht content"<?php print $content_attributes; ?>>
      <!-- <div class=" col-lg-12"> -->
      <?php print render($content['group_tabs']); ?>
      <!-- </div> -->
   </div>

   <div class="row bottom-extra">
   
   <?php if($autores_miniteasers): ?>
   
         <div class="col-lg-4">
            <div class="bottom-tab">
               <h3><span>Autores</span></h3>
               <div class="bottom-tab-pane">
                  <?php print $autores_miniteasers ; ?>
               </div>
             </div>
         </div>
       <?php if(isset($content['group_bottom_tab1'])): ?>
         <div class="col-lg-4 ">
            <?php print render($content['group_bottom_tab1']); ?>
         </div>
       <?php endif; ?>
       <?php if(isset($content['group_bottom_tab2'])): ?>
         <div class="col-lg-4">
            <?php print render($content['group_bottom_tab2']); ?>
         </div>
       <?php endif; ?>

    <?php else: ?>
    
       <?php if(isset($content['group_bottom_tab1'])): ?>
         <div class="col-lg-6 ">
            <?php print render($content['group_bottom_tab1']); ?>
         </div>
       <?php endif; ?>
       <?php if(isset($content['group_bottom_tab2'])): ?>
         <div class="col-lg-6">
            <?php print render($content['group_bottom_tab2']); ?>
         </div>
       <?php endif; ?>
       
    <?php endif; ?>
   </div>

<?php print render($content['links']); ?>

<?php print render($content['comments']); ?>

</div>

<?php
   // debug
   // print '<textarea cols="60" rows="20" style="width: 90%;">';
   // print_r( $content['group_edicion']['field_lugar_de_publicacion'][0] );
   // print '</textarea>';
?>
