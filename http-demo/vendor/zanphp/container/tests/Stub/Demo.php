<?php
/**
 * Created by PhpStorm.
 * User: huye
 * Date: 2017/9/18
 * Time: 上午11:43
 */

namespace ZanPHP\Container\Tests\Stub;


class Demo
{
    private $arg0;
    private $arg1;

    public function __construct($arg0, $arg1)
    {

        $this->arg0 = $arg0;
        $this->arg1 = $arg1;
    }

    /**
     * @return mixed
     */
    public function getArg0()
    {
        return $this->arg0;
    }

    /**
     * @return mixed
     */
    public function getArg1()
    {
        return $this->arg1;
    }
    
}