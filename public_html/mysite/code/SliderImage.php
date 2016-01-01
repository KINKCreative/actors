<?php

class SliderImage extends DataObject {

  static $db = array(
    'Title' => 'Varchar(255)',
    'Caption' => 'Text',
    'Link' => 'Varchar(255)',
    'ButtonLabel' => 'Varchar(64)',
    'OpenInNew' => 'Boolean',
    'Sort' => 'Int'
  );

  static $has_one = array(
    'Image' => 'Image',
    'Page' => 'Page',
    'Project' => 'Project'
  );

  static $defaults = array(
    'ButtonLabel' => 'Read more'
  );

  function getCMSFields() {
    $fields = parent::getCMSFields();

    $fields->removeByName("Sort");
    $fields->removeByName("PageID");

    $image = FileAttachmentField::create('Image', 'Slide image')
    ->setThumbnailHeight(200)
    ->setThumbnailWidth(200)
    ->setAutoProcessQueue(true) // do not upload files until user clicks an upload button
    ->setMaxFilesize(10) // 10 megabytes. Defaults to PHP's upload_max_filesize ini setting
    ->imagesOnly();

    $fields->addFieldToTab("Root.Main", $image);

    return $fields;
  }

}
