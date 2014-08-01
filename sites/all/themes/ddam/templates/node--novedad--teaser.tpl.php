<!-- <?php print $type; ?> -->

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php print $user_picture; ?>

<?php print render($title_prefix); ?>
<?php if (!$page): ?>
 <h2<?php print $title_attributes; ?>><span><a href="<?php print $node_url; ?>"><?php print $title; ?></a></span></h2>
<?php endif; ?>
<?php print render($title_suffix); ?>

<div class="novedad-date"><?php print format_date($node->created, 'custom', 'd') . '<b>' . format_date($node->created, 'custom', 'M'). '</b>'; ?></div>

<div class="content"<?php print $content_attributes; ?>>
 <?php
   // We hide the comments and links now so that we can render them later.
   hide($content['comments']);
   hide($content['links']);
   print render($content);
 ?>
</div>

<?php print render($content['links']); ?>

<?php print render($content['comments']); ?>

<?php
  // print '<textarea cols="60" rows="20" style="width: 90%;">';
  // print "computed code test: ".$node->field_isbn['und'][0]['value']."\n";
  // print_r( $node );
  // print '</textarea>';
?>

</div>
