<?php

function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

class Publishable extends DataExtension {

  private static $db = array(
    'Published' => 'Boolean',
    'PublicationDate' => 'SS_Datetime',
    'ExpirationDate' => 'SS_Datetime'
  );

  public function updateCMSFields(FieldList $fields) {
    $fields
      ->tab("Publish")
        ->dateTime("PublicationDate")
          ->configure()
            ->setConfig('dmyplaceholders', 'true')
          ->end()
        ->dateTime("ExpirationDate")
          ->configure()
            ->setConfig('dmyplaceholders', 'true')
          ->end()
        ->checkbox("Published");
  }

  public function augmentSQL(SQLQuery &$query) {

    if(empty($query->getSelect()) || $query->getDelete() || in_array("COUNT(*)",$query->getSelect()) || in_array("count(*)", $query->getSelect()) ) return;

    if (!$query->getWhere() || (!preg_match('/\.(\'|"|`|)ID(\'|"|`|)( ?)=/', $query->getWhere()[0]))) {

      $c = Controller::curr();
      if(!startsWith($c->class,"CMS") && !startsWith($c->class,"Model") && $c->getAction()!="update" ) {
        $className = $this->owner->ClassName;
        $query->addWhere( "{$className}.Published=1" );
        // $query->addWhere( "DATE({$className}.PublicationDate)<=DATE(NOW())" );
         $query->addWhere("({$className}.ExpirationDate IS NULL) OR ({$className}.ExpirationDate IS NOT NULL AND DATE({$className}.ExpirationDate)>=DATE(NOW()))");
      }

    }

  }

   public function validate(ValidationResult $result) {
      if( $this->owner->ExpirationDate && $this->owner->PublicationDate && ($this->owner->ExpirationDate <= $this->owner->PublicationDate)) {
        $result->error('Expiration date needs to be greater than the Publication date.');
      }
    }

  public function onBeforeWrite() {
    parent::onBeforeWrite();
    if(!$this->owner->ID && !$this->owner->PublicationDate) {
      $this->owner->PublicationDate = date("Y-m-d H:i:s");
    }
  }

  public function getIsPublished() {
    return $this->owner->dbObject("Published")->Nice();
  }

}
