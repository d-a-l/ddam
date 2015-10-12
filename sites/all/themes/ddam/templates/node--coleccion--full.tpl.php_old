<?php // libro
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

   <div class="row">

      <div class="bibliocard col-lg-12">
         <div class="title-wrapper">
            <div class="icon icon-<?php print $node->type; ?>" ></div>
            <div class="line type">Colección</div>

            <h1><?php print $node->title; ?></h1>
         </div>

         <div class="body">
            <?php print render($content['group_descripcion_obra']['body'][0]); ?>
         </div>
         <div class="tags">
            <?php print render($content['group_clasificacion']['field_descriptores']); ?>
            <?php print render($content['group_clasificacion']['field_etiquetas']); ?>
         </div>

      </div>

<!--      <div class="">
         <div class="well actions-tab gray-background"> -->
            <?php // print render($content['easy_social_1']); ?>
<!--         </div>
      </div>
-->

   </div>

   <div class="row content"<?php print $content_attributes; ?>>
      <div class="col-lg-12 ddam-fields">

<?php
   // show all fields already been render
   show($content['group_autoria']['field_autor'][0]);
   show($content['group_edicion']['field_editor'][0]);
   show($content['group_edicion']['field_edicion'][0]);
   show($content['group_descripcion_obra']['field_idioma'][0]); 
   show($content['group_descripcion_fisica']['field_paginas'][0]);

   show($content['group_clasificacion']['field_etiquetas']);
   show($content['group_clasificacion']['field_descriptores']);
   show($content['group_descripcion_obra']['body']);

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

   <div class="row">
      <div class="col-lg-12">
         <h2 class="block-title">Elementos de la colección: </h2>
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
