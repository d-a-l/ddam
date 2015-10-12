<?php 



$item1 = $item2 =  $item3 = '';
$slideshow_box_class = $bibliocard_box_class = "col-sm-6";
$relaciones_destacadas = ''; $relaciones_destacadas_title = 'Otros';
$bottom_tabs = false;

if ($node->type == 'organizaci_n') 
{
   $item1 = render($content['field_tipo']).'.';
   $item2 = render($content['field_sigla']).' ~ '.render( $content['field_otros_nombres']).'. Pertenece a: '.render($content['field_organizacion_superior']).".";
   $item3 = render($content['field_lugar']).'.';
   
} elseif ($node->type == 'fotografia') 
{
   $slideshow_box_class = $bibliocard_box_class = "col-lg-12";
   $bottom_tabs = true;   
   
   // coleccion minibox teasers
    // TODO: corregir este código según -> http://www.computerminds.co.uk/articles/rendering-drupal-7-fields-right-way
   $relaciones_destacadas_title = 'Colección';
   $relaciones_destacadas = ''; // miniteaser de la coleccion a la que pertenece
   if(isset($node->field_coleccion['und'])) {
      if(is_array($node->field_coleccion['und'])) {
         foreach($node->field_coleccion['und'] as $nodoid ) {
            $node_to_render = node_load($nodoid['target_id']);
            $node_object = node_view( $node_to_render, 'minibox_teaser' );
            $relaciones_destacadas .= render( $node_object ). "\n";
         }
      }
   }
} elseif ($node->type == 'numero_publicacion_periodica') 
{
   $bottom_tabs = true;   
   
   // coleccion minibox teasers
    // TODO: corregir este código según -> http://www.computerminds.co.uk/articles/rendering-drupal-7-fields-right-way
   $relaciones_destacadas_title = 'Publicación Periódica';
   $relaciones_destacadas = ''; // miniteaser de la coleccion a la que pertenece
   if(isset($node->field_publicacion_periodica['und'])) {   
      if(is_array($node->field_publicacion_periodica['und'])) {
         foreach($node->field_publicacion_periodica['und'] as $nodoid ) {
            $node_to_render = node_load($nodoid['target_id']);
            $node_object = node_view( $node_to_render, 'minibox_teaser' );
            $relaciones_destacadas .= render( $node_object ). "\n";
         }
      }
   }
} elseif ($node->type == 'programa') 
{
   $bottom_tabs = true;   
   
   $relaciones_destacadas_title = '';
   $relaciones_destacadas = ''; 
}

// $item1 = $content['group_autoria']['field_autor'][0];
// $item2 = $content['group_descripcion_obra']['body'][0];

?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> full clearfix"<?php print $attributes; ?>>

   <div class="row top-items">

      <div class="slideshow-box <?php print $slideshow_box_class ?>">
         <div class="slideshow-imagen">
            <?php if($img = render($content['field_imagen'][0])): ?>
              <?php print $img; ?>
            <?php else: ?>
              <div data-icon="" class="full-default-img default-img <?php print $node->type; ?>"></div>
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
          
          <?php if($item2): ?>
            <div class="line"><?php print $item2; ?></div>
          <?php endif;?>

          <?php if($item3): ?>
            <div class="line last"><?php print $item3; ?></div>
          <?php endif;?>

         </div>
      </div>

   </div>
   
   <?php include DRUPAL_ROOT . base_path() . path_to_theme() . "/templates/actions-tab.inc"; ?>

 <?php if(isset($content['group_tabs'])): ?>
   <div class="row ddam-ht content"<?php print $content_attributes; ?>>
      <?php print render($content['group_tabs']); ?>
   </div>
 <?php endif; ?>
 
 <?php if($bottom_tabs): ?>    
   <div class="row">
    <?php if($relaciones_destacadas): ?>
         <div class="col-lg-4">
            <div class="bottom-tab">
               <h3><span><?php print $relaciones_destacadas_title; ?></span></h3>
               <div class="bottom-tab-pane">
                  <?php print $relaciones_destacadas; ?>
               </div>
             </div>
         </div>
       <?php if(isset($content['group_bottom_tab1'])): ?>
         <div class="col-lg-4">
            <?php print render($content['group_bottom_tab1']); ?>
         </div>
       <?php endif; ?>
       <?php if(isset($content['group_bottom_tab2'])): ?>
         <div class="col-lg-4">
            <?php print render($content['group_bottom_tab2']); ?>
         </div>
       <?php endif; ?>
     <?php else: ?>
       <?php if(isset($content['group_bottom_tab1'])): ?>
         <div class="col-lg-6">
            <?php print render($content['group_bottom_tab1']); ?>
         </div>
       <?php endif; ?>
       <?php if(isset($content['group_bottom_tab2'])): ?>
         <div class="col-lg-6">
            <?php print render($content['group_bottom_tab2']); ?>
         </div>
       <?php endif; ?>
     <?php endif; ?>
   </div>
 <?php endif; ?>



<?php print render($content['links']); ?>

<?php print render($content['comments']); ?>

</div>

<?php
   // debug
   // print '<textarea cols="60" rows="20" style="width: 90%;">';
   // print_r( $content['group_edicion']['field_lugar_de_publicacion'][0] );
   // print '</textarea>';
?>
