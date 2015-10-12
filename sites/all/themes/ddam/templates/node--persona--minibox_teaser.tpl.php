<div id="node-<?php print $node->nid; ?>" class="minibox-teaser <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php print $user_picture; ?>

   <div class="minibox-teaser-img">
      <?php print render($content['field_imagen'][0]); ?>
   </div>
   
   <div class="minibox-teaser-body">

      <h3>
         <a href="<?php print $node_url; ?>">
            <?php print $content['field_apellido'][0]['#markup']; ?>,<br/ >
            <?php print $content['field_nombre'][0]['#markup']; ?>
         </a>
      </h3>

      <div class="line fecha">
         <?php print render($content['field_fecha_de_nacimiento']); ?> ~ 
         <?php print render($content['field_fecha_de_muerte']); ?>
      </div>
      <div class="line actividad">
        <?php print render($content['field_actividad']); ?>
      </div>
   </div>
   
</div>

