<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> slideshow clearfix"<?php print $attributes; ?>>

<?php if($img = render($content['field_imagen'])): ?>
   <?php print $img; ?>
<?php else: ?>
   <div class="home-slideshow-default-img"></div>
<?php endif; ?>

<div class="title-wrapper">
   <?php print render($content['field_volanta']); ?>
   <h2 class="slideshow-title"><span><a href="<?php print $node_url; ?>"><?php print $title; ?></a></span></h2>
</div>

<!-- <div class="novedad-date"><?php print format_date($node->created, 'custom', 'd') . '<b>' . format_date($node->created, 'custom', 'M'). '</b>'; ?></div> -->

</div>
