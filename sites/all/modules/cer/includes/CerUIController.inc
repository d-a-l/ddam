<?php

class CerUIController extends EntityDefaultUIController {

  public function hook_menu() {
    $items = parent::hook_menu();

    $items[$this->path]['title'] = t('Corresponding Entity References');
    $items["{$this->path}/list"]['title'] = t('Presets');

    $this->setTitle($items["{$this->path}/add"], t('Add preset'));
    $this->setTitle($items["{$this->path}/import"], t('Import preset'));

    $items["{$this->path}/manage/%entity_object/toggle"] = $this->createCallback('cer_toggle_preset', 'update');
    $items["{$this->path}/manage/%entity_object/invert"] = $this->createCallback('cer_invert_preset', 'create');

    // Don't provide a page for cloning a preset.
    unset($items["{$this->path}/manage/%entity_object/clone"]);

    return $items;
  }

  private function createCallback($function, $operation, array $init = array()) {
    return $init + array(
      'type' => MENU_CALLBACK,
      'page callback' => $function,
      'page arguments' => array(5),
      'load arguments' => array('cer'),
      'access callback' => 'entity_access',
      'access arguments' => array($operation, 'cer'),
      'file' => 'cer.admin.inc',
      'file path' => drupal_get_path('module', 'cer'),
    );
  }

  /**
   * Sets a static title on a menu item.
   */
  private function setTitle(array &$item, $title) {
    $item['title'] = $title;
    unset($item['title callback'], $item['title arguments']);
  }

  public function operationForm($form, &$form_state, $entity, $action) {
    switch ($action) {
      case 'delete':
        return confirm_form($form, t('Are you sure you want to delete this preset?'), $this->path, t('@left will no longer synchronize with @right.', $entity->labelVariables()));

      default:
        return parent::operationForm($form, $form_state, $entity, $action);
    }
  }

  protected function overviewTableHeaders($conditions, $rows, $additional_header = array()) {
    $header = array(
      t('Enabled'),
      t('Left Field'),
      t('Right Field'),
      t('Bidirectional'),
      t('Status'),
      t('Operations'),
    );

    return array_merge($header, $additional_header);
  }

  protected function overviewTableRow($conditions, $id, $entity, $additional_cols = array()) {
    $fields = field_attach_view($this->entityType, $entity, 'default');

    $fields['cer_left']['#label_display'] = 'inline';
    $fields['cer_left']['#title'] = $entity->wrapper->cer_left->chain->value()->end()->fieldTypeLabel;

    $fields['cer_right']['#label_display'] = 'inline';
    $fields['cer_right']['#title'] = $entity->wrapper->cer_right->chain->value()->end()->fieldTypeLabel;

    $row[] = $entity->wrapper->cer_enabled->value() ? '&#10003;' : '';
    $row[] = render($fields['cer_left']);
    $row[] = render($fields['cer_right']);
    $row[] = $entity->wrapper->cer_bidirectional->value() ? '&#10003;' : '';
    $row[] = array(
      'data' => array(
        '#theme' => 'entity_status',
        '#status' => $entity->{$this->statusKey},
      ),
    );

    // Add in any passed additional cols.
    foreach ($additional_cols as $col) {
      $row[] = $col;
    }

    $links = array(
      'toggle' => array(
        'title' => $entity->wrapper->cer_enabled->value() ? t('disable') : t('enable'),
        'href' => "{$this->path}/manage/{$id}/toggle",
        'query' => drupal_get_destination(),
      ),
      'edit' => array(
        'title' => t('edit'),
        'href' => "{$this->path}/manage/{$id}",
      ),
    );

    // If the preset is one-directional, expose a link to invert it.
    if (! $entity->wrapper->cer_bidirectional->value()) {
      $links['invert'] = array(
        'title' => t('invert'),
        'href' => "{$this->path}/manage/{$id}/invert",
        'query' => drupal_get_destination(),
      );
    }

    if (entity_has_status($this->entityType, $entity, ENTITY_OVERRIDDEN)) {
      $links['revert'] = array(
        'title' => t('revert'),
        'href' => "{$this->path}/manage/{$id}/revert",
        'query' => drupal_get_destination(),
      );
    }
    else {
      $links['delete'] = array(
        'title' => t('delete'),
        'href' => "{$this->path}/manage/{$id}/delete",
        'query' => drupal_get_destination(),
      );
    }
    $links['export'] = array(
      'title' => t('export'),
      'href' => "{$this->path}/manage/{$id}/export",
    );

    $row[] = array(
      'data' => array(
        '#theme' => 'links__ctools_dropbutton',
        '#links' => $links,
      ),
    );

    return $row;
  }

}
