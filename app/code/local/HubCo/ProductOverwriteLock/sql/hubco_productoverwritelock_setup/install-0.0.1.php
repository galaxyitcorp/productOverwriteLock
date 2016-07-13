<?php
// add a new product attribute to associate a lock down fields
$this->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'lock_fields', array(
    'group'         => 'General',
    'type'          => 'text',
    'backend'       => 'eav/entity_attribute_backend_array',
    'label'         => 'Lock Fields',
    'input'         => 'multiselect',
    'source'        => 'hubco_productoverwritelock/source_lockfields',
));