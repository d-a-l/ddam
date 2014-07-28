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
            <span><?php print render($content['group_edicion']['field_lugar_de_publicacion'][0]['#location']['city']); ?></span>, 
            <?php print render($content['group_edicion']['field_editor'][0]); ?>, 
            <span class="edicion"><?php print render($content['group_edicion']['field_edicion'][0]); ?>° edición</span>.
         </div>
         <div class="line">
            <?php print render($content['group_descripcion_obra']['field_idioma'][0]); ?>, 
            <?php print render($content['group_descripcion_fisica']['field_paginas'][0]); ?> Páginas, 
            <span class="year"><?php print substr($content['group_edicion']['field_fecha_de_publicacion']['#items'][0]['value'], 0, 4); ?></span>.
         </div>
      </div>

      <div class="left-items col-lg-5 col-lg-pull-7">
         <div class="well slideshow-imagen gray-background">
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
