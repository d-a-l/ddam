<div id="node-<?php print $node->nid; ?>" class="short-teaser col-xs-12 <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

 <div class="short-teaser-wrapper">

   <div class="short-teaser-left">
     <?php if(($img = render($content['field_imagen'][0])) && $type != "publicacion_periodica" ): ?>
       <?php print $img; ?>
     <?php else: ?>
       <span data-icon="" class="short-teaser-default-img default-img <?php print $node->type; ?>"></span>
     <?php endif; ?>
   </div>
   
   <div class="short-teaser-content">
      
       <?php if ($type == "numero_publicacion_periodica"): ?>
         <h3><a href="<?php print $node_url; ?>"><?php print $content['field_publicacion_periodica'][0]['#markup']; ?></a></h3>
       <?php elseif ($type == "novedad"): ?>
         <div class="wrapper">
            <div class="novedad-date">
               <span class="day"><?php print format_date($node->created, 'custom', 'd'); ?></span>
               <span class="mes"><?php print format_date($node->created, 'custom', 'M'); ?></span>
            </div>
      
            <h3><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
            
            <div class="autor"><?php print 'Por ' . $name . "."; ?></div>
            
         </div>
       <?php else: ?>
         <h3><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a></h3>
       <?php endif;?>

       <div class="content">
         <?php print render($content['group_content']); ?>
       </div>

   </div>
   
  </div>

</div>

