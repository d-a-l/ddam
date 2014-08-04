<div id="node-<?php print $node->nid; ?>" class="box-teaser col-xs-4 col-centered col-min <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php print $user_picture; ?>

   <div class="box-teaser-wrapper">

      <?php print render($content['field_imagen']); ?>

      <div class="box-teaser-body-top-wrapper">

         <div class="node-type-icon"></div>

         <div class="node-type"><?php print node_type_get_name($node); ?></div>

         <h3><a href="<?php print $node_url; ?>"><?php print render($content['group_top']['field_titulo']); ?></a></h3>

         <div class="content">
          <?php
            // We hide the comments and links now so that we can render them later.
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
<?php /*
         <h3<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>

*/ ?>
