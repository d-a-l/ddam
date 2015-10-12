<?php 


$item1 = '';
$slideshow_box_class = "slideshow-box-alt col-lg-12"; $bibliocard_box_class = "bibliocard-box-alt";

if (isset($content['group_tabs']['group_informacion_detallada']['group_datos1'])){
   $datos = $content['group_tabs']['group_informacion_detallada']['group_datos1'];
   if(isset($datos['field_lugar_de_publicacion'][0]['#location']['city'])) $item1 .= $datos['field_lugar_de_publicacion'][0]['#location']['city'] . '. ';  
   if(isset($datos['field_frecuencia'][0])) $item1 .= 'Publicación '  . render($datos['field_frecuencia'][0]). '. ';
   if(isset($datos['field_fecha_primer_numero'][0])) $item1 .= 'Primer número: ' . render($datos['field_fecha_primer_numero'][0]) . '. ';
}

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

    <div class="row ddam-ht content"<?php print $content_attributes; ?>>
   
      <div class="field-group-htabs-wrapper group-tabs field-group-htabs">
         <h2 class="element-invisible">tabs</h2>
         <div class="horizontal-tabs-panes">

            <fieldset class="collapsible collapsed field-group-htab panel panel-default form-wrapper">
               <legend class="panel-heading"><div class="panel-title fieldset-legend">Ejemplares</div></legend>
               <div class="panel-body"><?php print views_embed_view('obras', 'block_2'); // https://api.drupal.org/api/views/views.module/function/views_embed_view/7 ?></div>
            </fieldset>

            <?php 
               foreach($content['group_tabs'] as $index => $tab){

                  if($index[0] != '#') {
                     if(isset($tab['#attributes']['class'])){
                       if(is_array($tab['#attributes']['class'])) $classes = join(' ', $tab['#attributes']['class']);
                     }
                     if (!$classes) $classes = 'collapsible collapsed field-group-htab';
                     print '<fieldset class="'. $classes .' panel form-wrapper">';
                     print '<legend class="panel-heading"><div class="panel-title fieldset-legend">'.$tab['#title'].'</div></legend>';
                     print '<div class="panel-body">';

                     foreach($tab as $tindex => $titem){
                        if($tindex[0] != '#') {
                          print render($titem);
                        }
                     }
                     print '</div>';
                     print '</fieldset>';
                  }
              }
            ?>
         </div>
      </div>
      
   </div>
   
   <div class="row bottom-extra">
       <?php if(isset($content['group_bottom_tab1'])): ?>
         <div class="col-lg-6 ">
            <?php print render($content['group_bottom_tab1']); ?>
         </div>
       <?php endif; ?>
       <?php if(isset($content['group_bottom_tab2'])): ?>
         <div class="col-lg-6">
            <?php print render($content['group_bottom_tab2']); ?>
         </div>
       <?php endif; ?>
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
