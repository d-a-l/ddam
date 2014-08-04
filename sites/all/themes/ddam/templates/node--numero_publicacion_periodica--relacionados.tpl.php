<div id="node-<?php print $node->nid; ?>" class="box-teaser col-xs-4 col-centered col-min <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php print $user_picture; ?>

   <div class="box-teaser-wrapper">

      <?php print render($content['field_imagen']); ?>

      <div class="box-teaser-body-top-wrapper">

         <div class="node-type-icon"></div>

         <div class="node-type">Revista</div>

         <div class="content">
          <?php
            // We hide the comments and links now so that we can render them later.
            print('<a href="">' . render($content['group_top']['field_publicacion_periodica']) . '</a>');
            print render($content['group_top']);
          ?>
         </div>

      </div>

      <div class="box-teaser-body-bottom-wrapper">

         <div class="content">
          <?php
            print render($content['group_bottom']);
          ?>
         </div>

      </div>

   </div>

</div>
