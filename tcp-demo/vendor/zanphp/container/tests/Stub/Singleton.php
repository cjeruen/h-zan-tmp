<?php
/**
 * Created by PhpStorm.
 * User: huye
 * Date: 2017/9/18
 * Time: 上午11:43
 */

namespace ZanPHP\Container\Tests\Stub;

class Singleton
{
    private $value;

    public function __construct()
    {

    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value){
        $this->value = $value;
    }
}