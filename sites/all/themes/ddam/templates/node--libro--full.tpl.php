<?php // libro
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

   <div class="row">

      <div class="bibliocard col-lg-7 col-lg-push-5">
         <div class="title-wrapper">
            <div class="icon icon-<?php print $node->type; ?>" ></div>
            <div class="line autor"><?php print render($content['group_autoria']['field_autor'][0]); ?></div>

            <h1><?php print $node->title; ?></h1>
         </div>
         <div class="line">
<?php

$line = array();
$line[] = $content['group_edicion']['field_lugar_de_publicacion'][0]['#location']['city'];
$line[] = render($content['group_edicion']['field_editor'][0]);
$line[] = $content['group_edicion']['field_edicion'][0] ? render($content['group_edicion']['field_edicion'][0])."° edición" : "";

$separador = ""; foreach ($line as $word) {
    if ($word != "") {
       print $separador . $word;
       $separador = ", ";
    }
}
print ".";

?>
         </div>
         <div class="line">
<?php

$line = array();
$line[] = $content['group_descripcion_obra']['field_idioma'][0] ? render($content['group_descripcion_obra']['field_idioma'][0]) : "";
$line[] = $content['group_descripcion_fisica']['field_paginas'][0] ? render($content['group_descripcion_fisica']['field_paginas'][0]) . " páginas" : '';
$line[] = $content['group_edicion']['field_fecha_de_publicacion']['#items'][0]['value'] ? substr($content['group_edicion']['field_fecha_de_publicacion']['#items'][0]['value'], 0, 4) : "";

$separador = ""; foreach($line as $word) {
    if ($word != "") {
       print $separador . $word;
       $separador = ", ";
    }
}
print ".";

?>
            
         </div>
         <div class="icons-desc">
<?php

   foreach ($content['group_descripcion_fisica']['field_caracteristicas_fisicas'] as $clave => $el)
   {
      if ($clave[0] != "#") {
         print '<a href="' . $el['#href'] . '" class="icon-' . $el['#options']['entity']->tid . '"><span>' . $el['#title'] . '</span></a> ';
      }
   }

?>
         </div>
         <div class="body">
            <?php print render($content['group_descripcion_obra']['body'][0]); ?>
         </div>
         <div class="tags">
            <?php print render($content['group_clasificacion']['field_descriptores']); ?>
            <?php print render($content['group_clasificacion']['field_etiquetas']); ?>
         </div>

      </div>

      <div class="left-items col-lg-5 col-lg-pull-7">
         <div class="well slideshow-imagen">
            <?php print render($content['field_imagen']); ?>
         </div>
         <div class="well actions-tab gray-background">
            <?php print render($content['easy_social_1']); ?>
         </div>
      </div>

   </div>

   <div class="row content"<?php print $content_attributes; ?>>
      <div class="p-collapsible col-lg-12">
         <div class="p-collapsible-content ddam-fields">
            <h2><span>Información Detallada</span></h2>
<?php
   // show all fields already been render
   show($content['group_autoria']['field_autor'][0]);
   show($content['group_edicion']['field_editor'][0]);
   show($content['group_edicion']['field_edicion'][0]);
   show($content['group_descripcion_obra']['field_idioma'][0]); 
   show($content['group_descripcion_fisica']['field_paginas'][0]);

   show($content['group_clasificacion']['field_etiquetas']);
   show($content['group_clasificacion']['field_descriptores']);
   show($content['group_descripcion_obra']['body'][0]);

   // We hide the comments and links now so that we can render them later.
   hide($content['comments']);
   hide($content['links']);
   hide($content['field_imagen']);
   hide($content['easy_social_1']);
   hide($content['field_relacionados']);
   hide($content['field_plantilla_libro']); //computed field sin usar por ahora
   print render($content);
?>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-lg-12">
         <h2 class="block-title">Relacionados: </h2>
      </div>
   </div>

   <div class="row row-centered">
         <?php print render($content['field_relacionados']); ?>
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
