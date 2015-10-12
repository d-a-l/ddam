<div id="node-<?php print $node->nid; ?>" class="box-teaser <?php print ($is_front ? 'in-front' : 'col-md-3 col-sm-4 col-xs-4 col-xs-custom'); ?> col-centered col-min <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php print $user_picture; ?>

   <div class="box-teaser-top">
   
     <?php if($img = render($content['field_imagen'][0])): ?>
      <?php print $img; ?>
     <?php else: ?>
      <a href="<?php print $node_url; ?>"><span data-icon="" class="box-teaser-default-img default-img <?php print $node->type; ?>"></span></a>
     <?php endif; ?>
     
   </div>            
   
   <div class="box-teaser-bottom">
   
      <div class="box-teaser-bottom-content">

       <?php if ($type == "coleccion"): ?>
         <h3><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a></h3>
       <?php elseif ($type == "numero_publicacion_periodica"): ?>
         <h3><a href="<?php print $node_url; ?>"><?php print $content['field_publicacion_periodica'][0]['#markup']; ?></a></h3>
       <?php else: ?>
         <h3><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a></h3>
       <?php endif;?>

         <div class="node-type"><?php print node_type_get_name($node); ?></div>

         <div class="groups">
           <?php print render($content['group_bottom']); ?>
         </div>

      </div>
   
   </div>



</div>

