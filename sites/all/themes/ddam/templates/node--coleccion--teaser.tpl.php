<?php 

$item1 = render($content['field_n_mero_de_elementos']).'.';;
$slideshow_box_class = "slideshow-box-alt col-lg-12"; $bibliocard_box_class = "bibliocard-box-alt";

?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> teaser clearfix"<?php print $attributes; ?>>

   <div class="row top-items">

      <div class="slideshow-box <?php print $slideshow_box_class ?>">
         <div class="slideshow-imagen">
            <?php if($img = render($content['field_imagen'][0])): ?>
              <a href="<?php print $node_url; ?>"><?php print $img; ?></a>
            <?php else: ?>
              <a href="<?php print $node_url; ?>"><span class="teaser-default-background default-background <?php print $node->type; ?>"></span></a>
            <?php endif; ?>
         </div>
      </div>
      
      <div class="bibliocard-box <?php print $bibliocard_box_class ?>">
         <div class="bibliocard-wrapper">
         
            <div class="line node-type"><?php print node_type_get_name($node); ?></div>

            <h2><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a></h2>
              
          <?php if($item1): ?>
            <div class="line first"><?php print $item1; ?></div>
          <?php endif;?>
          
         </div>
      </div>

   </div>

</div>

<?php
   // debug
   // print '<textarea cols="60" rows="20" style="width: 90%;">';
   // print_r( $content['group_edicion']['field_lugar_de_publicacion'][0] );
   // print '</textarea>';
?>
