<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../php/themhoatdong_form_handler.php';

class testthemhoatdong extends TestCase
{

    function testTC_01()
    {
        $_POST["Submit"] = true;
        $_POST['idhd'] = "12";
        $_POST['tenhd'] = "hoatdonga";
        $this->assertEquals(add(), false);
        //ok
    }

    function testTC_02()
    {
        $_POST["Submit"] = true;
        $_POST['idhd'] = "11";
        $_POST['tenhd'] = "hoatdonga";
        $this->assertEquals(add(), false);
        // same tets1
    }

    function testTC_03()
    {
        $_POST['idhd'] = "12";
        $_POST['tenhd'] = "hoatdongc";
        $this->assertEquals(add(), false);
        // not send submit
    }

    function testTC_04()
    {
        $_POST["Submit"] = true;
        $_POST['idhd'] = "";
        $_POST['tenhd'] = "";
        $this->assertEquals(add(), false);
        // data empty
    }
    function testTC_05()
    {
        $_POST["Submit"] = true;
        $_POST['idhd'] = " ";
        $_POST['tenhd'] = " ";
        $this->assertEquals(add(), false);
        // data space
    }

    function testTC_06()
    {
        $_POST["Submit"] = true;
        $_POST['idhd'] = null;
        $_POST['tenhd'] = "Hoạt động 1";
        $this->assertEquals(add(), false);
        // id null
    }
}
