<?php

class HubCo_ProductOverwriteLock_Model_Source_Lockfields extends Mage_Eav_Model_Entity_Attribute_Source_Abstract {
  public function getAllOptions() {
    $options = array();

    $attributesInfo = Mage::getResourceModel('eav/entity_attribute_collection')
    ->setEntityTypeFilter('4')  //4 = Default - набор атрибутов
    ->addSetInfo()
    ->getData();

    $needed_attribute_codes = array('brand_id','name', 'description', 'url_key', 'image', 'price','map_price',
      'tax_class_id', 'weight', 'google_taxonomy', 'upc', 'mpn', 'color', 'size', 'gender','google_active');
    $needed_attribute_ids = array();
    $needed_attributes = array();
    $google_attribute_id;
    foreach($attributesInfo as $attribute) {
      $attribute = Mage::getModel('eav/entity_attribute')->load($attribute['attribute_id']);
      if (in_array($attribute['attribute_code'], $needed_attribute_codes))
      {
        $needed_attribute_ids[] = $attribute['attribute_id'];
        $needed_attributes[$attribute['attribute_id']] = $attribute['attribute_code'];
        //$needed_attributes[$attribute['attribute_code']] = $attribute['attribute_id'];
      }
    }


    $options[] = array('label' => 'None', 'value' => 'none');
    $options[] = array('label' => 'All Attributes (Color, size, etc.)', 'value' => 'attributes');
    // Get a list of selected locks from the
    $locked = explode(',',Mage::getStoreConfig ('productoverwritelock_options/lock/attributes'));
    foreach($attributesInfo as $attribute) {
      $attribute = Mage::getModel('eav/entity_attribute')->load($attribute['attribute_id']);
      if (in_array($attribute['attribute_code'], $locked)) {
        $options[] = array('value' => $attribute['attribute_code'], 'label' => $attribute['frontend_label']);
      }
    }
    /*$options[] = array('label' => $locked, 'value' => 'none');
    $options[] = array('label' => 'Name', 'value' => 'name');
    $options[] = array('label' => 'Description', 'value' => 'description');
    $options[] = array('label' => 'Short Description', 'value' => 'short_description');
    $options[] = array('label' => 'Price', 'value' => 'price');
    $options[] = array('label' => 'Google Active', 'value' => 'google_active');
    $options[] = array('label' => 'Thumbnail Image', 'value' => 'thumbnail');
    $options[] = array('label' => 'Small Image', 'value' => 'small_image');
    $options[] = array('label' => 'Base Image', 'value' => 'image');
    $options[] = array('label' => 'Image Gallery', 'value' => 'media_gallery');
    */
    return $options;
  }

  /*----------------------------------------------------
      Pull all attributes with front end labels and codes to select which ones we might want locked.

  */
  public function toOptionArray() {
    $options = array();

    $attributesInfo = Mage::getResourceModel('eav/entity_attribute_collection')
    ->setEntityTypeFilter('4')  //4 = Default - набор атрибутов
    ->addSetInfo()
    ->getData();

    foreach($attributesInfo as $attribute) {
      $attribute = Mage::getModel('eav/entity_attribute')->load($attribute['attribute_id']);
      $options[] = array('value' => $attribute['attribute_code'], 'label' => $attribute['frontend_label']);
    }

    return $options;

  }
}

?>