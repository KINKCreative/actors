<?php

class ProjectImage extends Image {

  static $has_one = array(
    'Project' => 'Project'
  );

}
