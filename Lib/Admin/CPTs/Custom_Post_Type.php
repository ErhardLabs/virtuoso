<?php

namespace Virtuoso\Lib\Admin\CPTs;

class Custom_Post_Type {

  public function __construct() {

    $this->set();

  }

  public function set() {
    $directory = get_stylesheet_directory() . '/Lib/Admin/CPTs';

    foreach(glob($directory.'/*.*') as $file) {
      if ($file !== __FILE__) {

        include_once($file);
      }
    }
  }

}