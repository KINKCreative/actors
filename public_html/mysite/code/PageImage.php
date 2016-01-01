<?php

class PageImage extends Image {

  static $has_one = array(
    'Page' => 'Page'
  );

}
