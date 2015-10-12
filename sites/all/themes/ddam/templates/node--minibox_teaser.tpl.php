<div id="node-<?php print $node->nid; ?>" class="minibox-teaser <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php print $user_picture; ?>

   <div class="minibox-teaser-img">
      <?php print render($content['field_imagen'][0]); ?>
   </div>
   
   <div class="minibox-teaser-body">

      <h3>
         <a href="<?php print $node_url; ?>"><?php print $node->title; ?></a>
      </h3>

      <div class="line body">
         <?php print render($content['group_body']); ?>
      </div>
      
   </div>
   
</div>

