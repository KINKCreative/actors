<?php

class Helpers {

  static function Shorten($string = NULL, $length = 50) {
    return strlen($string) > $length ? substr($string,0,$length)."..." : $string;
  }
}
