<div class="row actions-tab">
      <div class="actions-tab-wrapper">
        <?php // print render($content['easy_social_1']); ?>
        <?php if($ar = render($content['field_archivo'])):?>
         <div class="popup-files"><div class="icon-actions icon-action_download"></div><?php print $ar; ?></div>
        <?php endif; ?>
         <div class="icon-actions icon-facebook"></div>
         <div class="icon-actions icon-twitter"></div>
      </div>
</div>
