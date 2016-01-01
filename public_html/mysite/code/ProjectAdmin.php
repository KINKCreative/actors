<?php

class ProjectAdmin extends ModelAdmin {

  private static $managed_models = array(
    'Project'
  );

  private static $menu_title = 'Projects';
  private static $url_segment = 'project';

  private static $menu_priority = 10;

  // public function getEditForm($id = null, $fields = null){
  //   $form = parent::getEditForm($id, $fields);
  //   if($IGField = $form->Fields()->dataFieldByName('ImageGlider')){
  //     $IGField->getConfig()->addComponent(new GridFieldSortableRows('sortOrder'));
  //   }
  //   return $form;
  // }



  static $model_importers = array();

}
