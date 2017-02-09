<?php

class HubCo_ProductOverwriteLock_Model_Source_Lockfields extends Mage_Eav_Model_Entity_Attribute_Source_Abstract {
  public function getAllOptions() {
    $options = array();
    $options[] = array('label' => 'None', 'value' => 'none');
    $options[] = array('label' => 'Name', 'value' => 'name');
    $options[] = array('label' => 'Description', 'value' => 'description');
    $options[] = array('label' => 'Short Description', 'value' => 'short_description');
    $options[] = array('label' => 'Price', 'value' => 'price');
    $options[] = array('label' => 'Attributes (Color, size, etc.)', 'value' => 'attributes');
    $options[] = array('label' => 'Google Active', 'value' => 'google_active');
    $options[] = array('label' => 'Thumbnail Image', 'value' => 'thumbnail');
    $options[] = array('label' => 'Small Image', 'value' => 'small_image');
    $options[] = array('label' => 'Base Image', 'value' => 'image');
    $options[] = array('label' => 'Image Gallery', 'value' => 'media_gallery');

    return $options;
  }
}

?>