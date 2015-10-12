<!-- <?php print $type; ?> -->
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> teaser clearfix"<?php print $attributes; ?>>
<?php print $user_picture; ?>

<?php if($img = render($content['field_imagen'])): ?>
   <?php print $img; ?>
<?php else: ?>
   <div class="home-slideshow-default-img"></div>
<?php endif; ?>

   <div class="novedad-teaser-wrapper">

    <div class="wrapper">
      <div class="novedad-date">
          <span class="day"><?php print format_date($node->created, 'custom', 'd'); ?></span>
          <span class="mes"><?php print format_date($node->created, 'custom', 'M'); ?></span>
      </div>
      
      <h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      
      <?php print render($content['group_fields_wrapper']); ?>
     </div>
     
   </div>
   
</div>
