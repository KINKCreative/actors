<?php

class Clip extends DataObject {

  static $db = array(
    'Sort' => 'Int'
  );

  static $has_one = array(
    'Project' => 'Project',
    'Video' => 'EmbeddedObject'
  );

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    $fields->addFieldToTab('Root.Main', EmbeddedObjectField::create('Video', 'Video from oEmbed URL', $this->Video()));

    return $fields;
  }

}
