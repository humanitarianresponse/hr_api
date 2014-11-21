<?php

/**
 * @file
 * Contains \RestfulEntityTaxonomyTermOrganizations.
 */

class RestfulEntityTaxonomyTermOrganizations extends \RestfulEntityBaseTaxonomyTerm {

  /**
   * Overrides \RestfulEntityBase::publicFieldsInfo().
   */
  public function publicFieldsInfo() {
    $public_fields = parent::publicFieldsInfo();

    $public_fields['acronym'] = array(
      'property' => 'field_acronym',
    );

    $public_fields['homepage'] = array(
      'property' => 'field_website',
      'sub_property' => 'url',
    );

    $public_fields['fts_id'] = array(
      'property' => 'field_organization_fts',
    );

    $public_fields['type'] = array(
      'property' => 'field_organization_type',
      'callback' => array($this, 'getType'),
    );

    return $public_fields;
  }

  protected function getType($wrapper) {
    $type = $wrapper->field_organization_type->value();
    return array('id' => $type->tid, 'label' => $type->name);
  }

}
