<?php
/**
 * Created by PhpStorm.
 * User: gerhard
 * Date: 11/7/18
 * Time: 4:57 PM
 */

namespace Virtuoso\Lib\Admin\Blocks;
use Virtuoso\Lib\Admin\Blocks\Testimonial_Block;
use Virtuoso\Lib\Admin\Blocks\Centered_Welcome_Block;


class Block
{

  public function __construct()
  {

//    new Testimonial_Block();
    new Centered_Welcome_Block();


  }

}