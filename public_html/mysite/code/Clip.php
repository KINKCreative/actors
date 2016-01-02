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
    $fields->addFieldToTab('Root.Main', DropdownField::create('VideoID', 'Select video', EmbeddedObject::get()->map("ID", "Title")));
    $fields->addFieldToTab('Root.Main', EmbeddedObjectField::create('AddVideo', 'Video from oEmbed URL'));

    return $fields;
  }

}
