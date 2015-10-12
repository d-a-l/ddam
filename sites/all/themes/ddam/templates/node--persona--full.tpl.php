<?php 

$line = '';
$slideshow_box_class = $bibliocard_box_class = "col-sm-6";
   
   $a = $content['group_tabs']['group_informacion_detallada']['group_datos_personales'];
   $line = '';
   if ($a['field_actividad']){
      $actividades = array(); 
      foreach($a['field_actividad'] as $index => $actividad) {
         if($index[0] != '#') $actividades[] = $actividad;
      }
      $y = count($actividades); $count = 0; $sep = ''; 
      foreach($actividades as $actividad) {
            if(++$count == $y && $y > 1) $sep = ' y '; 
            $line .= $sep . '<a href="' . $actividad['#href'] . '">' . $actividad['#title'] . '</a>';
            $sep = ', ';       
       }
       $line .= '. '; 
   }
   if($a['field_fecha_de_nacimiento'][0]){
      $nacionalidad = ( $a['field_lugar_de_nacimiento'][0]['#location']['city'] ? '('.$a['field_lugar_de_nacimiento'][0]['#location']['city'].')' : '');
      $line .= '<br />'.render($a['field_fecha_de_nacimiento'][0]).' '.$nacionalidad.' ';
      $line .= $a['field_fecha_de_muerte'][0] ? ' ~ '.render($a['field_fecha_de_muerte'][0]) : '';
      $line .= '.';
   }

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
              
          <?php if($line): ?>
            <div class="line first"><?php print $line; ?></div>
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
               <legend class="panel-heading"><div class="panel-title fieldset-legend">Obras</div></legend>
               <div class="panel-body"><?php print views_embed_view('obras', 'block');        // https://api.drupal.org/api/views/views.module/function/views_embed_view/7 ?></div>
            </fieldset>
            
            <?php 
            if(isset($content['group_tabs'])) {
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
            }
            ?>
            
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
