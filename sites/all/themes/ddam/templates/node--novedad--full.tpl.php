<!-- <?php print $type; ?> -->

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> full clearfix"<?php print $attributes; ?>>

   <div class="row">

      <div class="col-md-12"><h3 class="volanta-title"><?php print render($content['field_volanta']); ?></h3></div>

      <div class="col-md-3 col-md-push-9 col-lateral">

         <div class="novedad-date">
             <span class="day"><?php print format_date($node->created, 'custom', 'd'); ?></span>
             <span class="mes"><?php print format_date($node->created, 'custom', 'M'); ?></span>
         </div>

         <?php print render($content['group_etiquetas']); ?>      

         <?php include DRUPAL_ROOT . base_path() . path_to_theme() . "/templates/actions-tab.inc"; ?>

      </div>

      <div class="col-md-9 col-md-pull-3">
      
          <?php if($img = render($content['field_imagen'])): ?>
              <?php print $img; ?>
          <?php else: ?>
              <div class="novedad-default-img"></div>
          <?php endif; ?>


          <?php print render($content['body']); ?>

          <?php print render($content['links']); ?>
          <?php print render($content['comments']); ?>

      </div>

   </div>

</div>
