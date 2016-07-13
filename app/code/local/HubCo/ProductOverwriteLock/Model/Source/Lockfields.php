<?php

class HubCo_ProductOverwriteLock_Model_Source_Lockfields extends Mage_Eav_Model_Entity_Attribute_Source_Abstract {
  public function getAllOptions() {
    $options = array();
    $options[] = array('label' => 'Name', 'value' => 'name');
    $options[] = array('label' => 'Description', 'value' => 'description');
    $options[] = array('label' => 'Short Description', 'value' => 'short_description');
    $options[] = array('label' => 'Price', 'value' => 'price');

    return $options;
  }
}

?>