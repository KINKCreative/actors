<?php

class Project extends DataObject {

  function getURLPrefix() {
    return "projects";
  }

  static $db = array(
    'Title' => 'Varchar(255)',
    'Description' => 'HTMLText',
    'Genre' => 'Varchar(64)',
    'Format' => 'Varchar(64)',
    'Year' => 'Varchar(4)',
    'Director' => 'Varchar(64)',
    'ProductionCompany' => 'Varchar(64)',
    'IMDBLink' => 'Varchar(64)'
  );

  static $has_many = array(
    'Clips' => 'Clip',
    'Images' => 'ProjectImage',
    'BTSImages' => 'BtsImage'
  );

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    $fields->removeByName("BTSImages");

    $gallery = FileAttachmentField::create('Images', 'Upload images')
    ->setThumbnailHeight(200)
    ->setThumbnailWidth(200)
    ->setAutoProcessQueue(true) // do not upload files until user clicks an upload button
    ->setMaxFilesize(10) // 10 megabytes. Defaults to PHP's upload_max_filesize ini setting
    ->imagesOnly();

    $bts = FileAttachmentField::create('BTSImages', 'Upload BTS images')
    ->setThumbnailHeight(200)
    ->setThumbnailWidth(200)
    ->setAutoProcessQueue(true) // do not upload files until user clicks an upload button
    ->setMaxFilesize(10) // 10 megabytes. Defaults to PHP's upload_max_filesize ini setting
    ->imagesOnly();

    $conf = GridFieldConfig_RelationEditor::create(10);
    $conf->addComponent(new GridFieldSortableRows('Sort'));
    $fields->addFieldToTab('Root.Clips', new GridField('Clips', 'Clips', $this->Clips(), $conf));

    $fields->addFieldToTab('Root.Images', $gallery);
    $fields->addFieldToTab('Root.BTS', $bts);

    return $fields;
  }

  public function Image() {
    if($this->Images()) {
        return $this->Images()->first();
    }
  }

}
