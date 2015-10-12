<?php // libro



$item1 = $item2 =  $item3 = '';
$slideshow_box_class = $bibliocard_box_class = "col-lg-6";
   
if($node->type == 'persona')
{
   $a = $content['group_tabs']['group_informacion_detallada']['group_datos_personales'];
   $item1 = '';
   if ($a['field_actividad']){
      $actividades = array(); 
      foreach($a['field_actividad'] as $index => $actividad) {
         if($index[0] != '#') $actividades[] = $actividad;
      }
      $y = count($actividades); $count = 0; $sep = ''; 
      foreach($actividades as $actividad) {
            if(++$count == $y) $sep = ' y '; 
            $item1 .= $sep . '<a href="' . $actividad['#href'] . '">' . $actividad['#title'] . '</a>';
            $sep = ', ';       
       }
       $item1 .= '. '; 
   }
   if($a['field_fecha_de_nacimiento'][0]){
      $nacionalidad = ( $a['field_lugar_de_nacimiento'][0]['#location']['city'] ? '('.$a['field_lugar_de_nacimiento'][0]['#location']['city'].')' : '');
      $item1 .= '<br />'.render($a['field_fecha_de_nacimiento'][0]).' '.$nacionalidad.' ';
      $item1 .= $a['field_fecha_de_muerte'][0] ? ' ~ '.render($a['field_fecha_de_muerte'][0]) : '';
      $item1 .= '.';
   }
   


} elseif ($node->type == 'organizaci_n') 
{
   $item1 = render($content['field_tipo']).'.';
   $item2 = render($content['field_sigla']).' ~ '.render( $content['field_otros_nombres']).'. Pertenece a: '.render($content['field_organizacion_superior']).".";
   $item3 = render($content['field_lugar']).'.';
} elseif ($node->type == 'fotografia') 
{
   $slideshow_box_class = $bibliocard_box_class = "col-lg-12";
}

// $item1 = $content['group_autoria']['field_autor'][0];
// $item2 = $content['group_descripcion_obra']['body'][0];

?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> full clearfix"<?php print $attributes; ?>>

   <div class="row top-items">

      <div class="slideshow-box <?php print $slideshow_box_class ?>">
         <div class="slideshow-imagen">
            <?php if($content['field_imagen']):?>
              <?php print render($content['field_imagen']); ?>
            <?php else: ?>
              <div class="slideshow-default-img <?php print $node->type; ?>"></div>
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
   
   <div class="row actions-tab">
      <div class="actions-tab-wrapper">
       <?php // print render($content['easy_social_1']); ?>
       <?php if($node->type != 'persona'): ?>
         <div class="icon icon-download"></div>
       <?php endif; ?>
         <div class="icon icon-fb"></div>
         <div class="icon icon-tw"></div>
      </div>
   </div>

   <div class="row ddam-ht content"<?php print $content_attributes; ?>>
      <!-- <div class=" col-lg-12"> -->
    <?php if($node->type != 'persona'): ?>
      <?php print render($content['group_tabs']); ?>
    <?php else: ?>

      <div class="field-group-htabs-wrapper group-tabs field-group-htabs">
         <h2 class="element-invisible">tabs</h2>
         <div class="horizontal-tabs-panes">

            <fieldset class="collapsible collapsed group-descripcion field-group-htab panel panel-default form-wrapper">
               <legend class="panel-heading"><div class="panel-title fieldset-legend">Reseña Biográfica</div></legend>
               <div class="panel-body"><?php print render($content['group_tabs']['group_descripcion']['body']); ?></div>
            </fieldset>

            <fieldset class="collapsible collapsed group-beta field-group-htab panel panel-default form-wrapper">
               <legend class="panel-heading"><div class="panel-title fieldset-legend">Datos Personales</div></legend>
               <div class="panel-body"><?php print render($content['group_tabs']['group_informacion_detallada']['group_datos_personales']); ?></div>
            </fieldset>

            <fieldset class="collapsible collapsed group-gama field-group-htab panel panel-default form-wrapper">
               <legend class="panel-heading"><div class="panel-title fieldset-legend">Obras</div></legend>
               <div class="panel-body"><?php print views_embed_view('libros_y_publicaciones', 'block');        // https://api.drupal.org/api/views/views.module/function/views_embed_view/7 ?></div>
            </fieldset>

         </div>
      </div>
      
    <?php endif; ?>
   </div>

   <div class="row">
         <div class="col-lg-4">
            <div>grupo 1</div>
         </div>
         <div class="col-lg-4">
            <?php print render($content['field_descriptores']); ?>
         </div>
         <div class="col-lg-4">
            <?php print render($content['field_etiquetas']); ?>
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
