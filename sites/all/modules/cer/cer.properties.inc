<?php

/**
 * @file
 * Contains entity property callback functions for the 'cer' struct exposed
 * to Entity API.
 */

/**
 * Unpacks the cer_left and cer_right values into a CerFieldChain object.
 */
function cer_unpack_field_chain($data, array $options, $property, $entity_type, array $info) {
  return CerFieldChain::unpack($data);
}

/**
 * Creates a parent struct for the lineage, depth, owner, and original properties.
 * All that these other callbacks really need is the entity type and object, so
 * that's what this returns.
 */ 
function cer_get_cer_struct($entity, array $options, $property, $entity_type, array $info) {
  return array( $entity_type, $entity );
}

/**
 * Gets the lineage of the entity as a string, in the format entity_type:bundle:%
 */
function cer_get_entity_lineage(array $data, array $options, $property, $data_type, array $info) {
  list (, , $bundle) = entity_extract_IDs($data[0], $data[1]);
  return $data[0] . ":{$bundle}:";
}

/**
 * Gets the entity depth as an integer. cer_entity_property_info_alter() overrides this
 * callback for field collections, and for all other entity types it's 0 (top level).
 */
function cer_get_entity_depth(array $data, array $options, $property, $data_type, array $info) {
  return 0;
}

/**
 * Gets the ultimate owner of the entity as an EntityDrupalWrapper. cer_entity_property_info_alter()
 * overrides this callback for field collections, and for all other entity types the entity
 * owns itself.
 */
function cer_get_entity_owner(array $data, array $options, $property, $data_type, array $info) {
  return new EntityDrupalWrapper($data[0], $data[1]);
}

/**
 * Gets the original entity, before update. If no update has taken place, the current
 * entity is returned.
 */
function cer_get_entity_original(array $data, array $options, $property, $data_type, array $info) {
  return new EntityDrupalWrapper($data[0], (isset($data[1]->original) ? $data[1]->original : $data[1]));
}

/**
 * Callback functions for field collections (@see cer_entity_property_info_alter()).
 */

/**
 * Gets a field collection's lineage as a string, e.g.
 * node:page:field_my_collection::field_collection_item:field_my_collection:%
 */
function cer_get_field_collection_lineage(array $data, array $options, $property, $data_type, array $info) {
  return implode('::', $info['raw getter callback']($data, $options, $property, $data_type, $info));
}

/**
 * Gets a field collection's lineage as an array.
 */
function cer_get_field_collection_lineage_array(array $data, array $options, $property, $data_type, array $info) {
  $collection = $data[1];

  // If this is the innermost entity, $options['lineage'] will be empty.
  if (! isset($options['lineage'])) {
    $options['lineage'][] = "field_collection_item:{$collection->field_name}:";
  }

  $data[0] = $collection->hostEntityType();
  $data[1] = $collection->hostEntity();
  list (, , $host_bundle) = entity_extract_IDs($data[0], $data[1]);
  array_unshift($options['lineage'], $data[0] . ":{$host_bundle}:{$collection->field_name}");

  // If this field collection is hosted in another field collection, recurse upwards.
  // Otherwise, we're done; return the lineage array.
  if ($data[0] == 'field_collection_item') {
    return cer_get_field_collection_lineage_array($data, $options, $property, $data_type, $info);
  }
  else {
    return $options['lineage'];
  }
}

/**
 * Gets the zero-based depth of a field collection.
 */
function cer_get_field_collection_depth(array $data, array $options, $property, $data_type, array $info) {
  $lineage = cer_get_field_collection_lineage_array($data, $options, $property, $data_type, $info);
  return (sizeof($lineage) - 1);
}

/**
 * Gets the ultimate owner of a field collection -- that is, the top-level entity
 * under which it's embedded. This could be any kind of entity that's not a field
 * collection item.
 */
function cer_get_field_collection_owner(array $data, array $options, $property, $data_type, array $info) {
  if ($data[0] == 'field_collection_item') {
    $data[0] = $data[1]->hostEntityType();
    $data[1] = $data[1]->hostEntity();
    
    $self = __FUNCTION__;
    return $self($data, $options, $property, $data_type, $info);
  }
  else {
    return new EntityDrupalWrapper($data[0], $data[1]);
  }
}
