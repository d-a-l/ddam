<!-- <?php print $type; ?> -->

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php /* print $user_picture; */ ?>

   <div class="top-node-wrapper">
      <?php /* print render($title_prefix); */ ?>
      <h1<?php print $title_attributes; ?>><span><span><?php print $node->title; ?></span></span></h1>
      <?php /* print render($title_suffix); */ ?>

      <?php 
         print render($content['field_imagen']); 
      ?>

   </div>

   <div class="row">

      <div class="col-lg-3">
         <div class="content"<?php print $content_attributes; ?>>
          <?php
            // We hide the comments and links now so that we can render them later.
            /* hide($content['field-imagen']); */
            hide($content['comments']);
            hide($content['links']);
            hide($content['body']);
            print render($content);
          ?>
         </div>
      </div>

      <div class="col-lg-9">

          <?php if ($display_submitted): ?>
            <div class="submitted">
            <?php print $submitted; ?>
            </div>
          <?php endif; ?>

          <?php
            show($content['body']);
            print render($content['body']);
          ?>

         <?php print render($content['links']); ?>

         <?php print render($content['comments']); ?>

      </div>

   </div>

</div>
