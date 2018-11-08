<?php
/**
 * Created by PhpStorm.
 * User: gerhard
 * Date: 10/24/18
 * Time: 2:23 PM
 */

namespace Virtuoso\Lib\Admin;


use Virtuoso\Lib\Admin\Blocks\Block;
use Virtuoso\Lib\Admin\CPTs\Custom_Post_Type;
use Virtuoso\Lib\Admin\Customizer\Customizer;

class Admin
{

  public function __construct() {
    new Customizer();
    new Custom_Post_Type();
    new Block();
  }

}