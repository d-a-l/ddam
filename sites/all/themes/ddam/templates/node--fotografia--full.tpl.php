<?php // libro
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

   <div class="row">

      <div class="col-lg-12">
         <div class="well slideshow-imagen">
               <?php print render($content['field_imagen']); ?>
         </div>
      </div>

      <div class="bibliocard col-lg-12">
         <div class="title-wrapper">
            <div class="icon icon-<?php print $node->type; ?>" ></div>
            <h1><?php print $node->title; ?></h1>
         </div>
      </div>

   </div>

   <div class="row content"<?php print $content_attributes; ?>>
      <div class="col-lg-12 ddam-fields">

<?php
   // We hide the comments and links now so that we can render them later.
   hide($content['comments']);
   hide($content['links']);
   hide($content['field_imagen']);
   hide($content['easy_social_1']);
   hide($content['field_relacionados']);
   print render($content);
?>

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
