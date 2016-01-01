<?php

class SiteConfigDecorator extends DataExtension {

   public static $db = array(
     // Work Fields
    'Unions' => 'Varchar(64)',
    'ImdbURL' => 'Varchar(250)',
    'ActorsAccessURL' => 'Varchar(250)',
     // Social Fields
    'FacebookURL' => "Varchar(250)",
    'TwitterURL' => "Varchar(250)",
    'InstagramURL' => "Varchar(250)",
    'PinterestURL' => "Varchar(250)",
    'SoundCloudURL' => "Varchar(250)",
    'VimeoURL' => "Varchar(250)",
    'YouTubeURL' => "Varchar(250)",
    // Contact fields
    'Phone' => 'Varchar(64)',
    'Email' => 'Varchar(64)',
    'Address' => 'Varchar(255)'
  );

  static $has_one = array(
    'Resume' => 'File'
  );

  public function updateCMSFields(FieldList $fields) {
    $fields->removeByName('Access');

    // if(!Permission::check("ADMIN")) {
      $fields->removeByName('Theme');
    // }

    $fields->addFieldToTab("Root.Main",
      $resume = FileAttachmentField::create('Resume', 'Upload resume')
        ->setAcceptedFiles(array('.pdf'))
        ->setThumbnailHeight(200)
        ->setThumbnailWidth(200)
        ->setAutoProcessQueue(true) // do not upload files until user clicks an upload button
        ->setMaxFilesize(10)
    );

    $fields
      ->tab('Main')
        ->text("Unions")
        ->text("ImdbURL")
        ->text("ActorsAccessURL")
      ->tab('Social')
        ->text("FacebookURL")
        ->text("TwitterURL")
        ->text("InstagramURL")
        ->text("PinterestURL")
        ->text("VimeoURL")
        ->text("SoundCloudURL")
        ->text("YouTubeURL", "Enter the full URL of your YouTube channel")
      ->tab('Contact')
        // TODO: PhoneNumberField
        ->text("Phone")
        ->email("Email")
        ->textarea("Address");
    }
}
