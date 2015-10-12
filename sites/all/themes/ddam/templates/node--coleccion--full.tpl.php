<?php 

$item1 = render($content['field_n_mero_de_elementos']).'.';;
$slideshow_box_class = "slideshow-box-alt col-lg-12"; $bibliocard_box_class = "bibliocard-box-alt";

if(isset($content['group_tabs']['group_descripcion']['body']['#items'][0]['summary']))
   $coleccion_summary = render($content['group_tabs']['group_descripcion']['body']['#items'][0]['summary'])
;

?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> full clearfix"<?php print $attributes; ?>>

   <div class="row top-items">

      <div class="slideshow-box <?php print $slideshow_box_class ?>">
         <div class="slideshow-imagen">
            <?php if($img = render($content['field_imagen'][0])): ?>
              <?php print $img; ?>
            <?php else: ?>
              <div class="full-default-background default-background <?php print $node->type; ?>"></div>
            <?php endif; ?>
         </div>
      </div>
      
      <div class="bibliocard-box <?php print $bibliocard_box_class ?>">
         <div class="bibliocard-wrapper">
         
            <div class="line node-type"><?php print node_type_get_name($node); ?></div>

            <h1><?php print $node->title; ?></h1>
              
          <?php if($item1): ?>
            <div class="line first"><?php print $item1; ?></div>
          <?php endif;?>
          
         </div>
      </div>

   </div>
   
   <?php include DRUPAL_ROOT . base_path() . path_to_theme() . "/templates/actions-tab.inc"; ?>

   <?php if($coleccion_summary): ?>
      <div class="row coleccion-summary">
         <div class="col-xs-12"><?php print $coleccion_summary; ?></div>
      </div>
   <?php endif; ?>

    <div class="row ddam-ht content"<?php print $content_attributes; ?>>
   
      <div class="field-group-htabs-wrapper group-tabs field-group-htabs">
         <h2 class="element-invisible">tabs</h2>
         <div class="horizontal-tabs-panes">

            <fieldset class="collapsible collapsed field-group-htab panel panel-default form-wrapper">
               <legend class="panel-heading"><div class="panel-title fieldset-legend">Obras</div></legend>
               <div class="panel-body"><?php print views_embed_view('obras', 'block_1');        // https://api.drupal.org/api/views/views.module/function/views_embed_view/7 ?></div>
            </fieldset>

            <fieldset class="collapsible collapsed group-descripcion field-group-htab panel form-wrapper">
               <legend class="panel-heading"><div class="panel-title fieldset-legend">Descripción detallada</div></legend>
               <div class="panel-body"><?php print render($content['group_tabs']['group_descripcion']['body']); ?></div>
            </fieldset>
         </div>
      </div>
      
   </div>
 
 
<?php print render($content['links']); ?>

<?php print render($content['comments']); ?>

</div>

<?php
   // debug
   // print '<textarea cols="60" rows="20" style="width: 90%;">';
   // print_r( $content['group_edicion']['field_lugar_de_publicacion'][0] );
   // print '</textarea>';
?>
