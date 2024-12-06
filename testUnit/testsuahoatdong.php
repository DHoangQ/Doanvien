<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../php/chucnang/suahoatdong_handle.php';

class testsuahoatdong extends TestCase
{
    function testTC_01()
    {
        $_POST["btn"] = true;
        $_GET["idhd"] = "12";
        $_POST['idhd'] = "12";
        $_POST['tenhd'] = "hoatdonga";
        $this->assertEquals(edit(), true);
        //ok
    }

    function testTC_02()
    {
        $_POST["btn"] = true;
        $_GET["idhd"] = "13";
        $_POST['idhd'] = "12";
        $_POST['tenhd'] = "hoatdonga";
        $this->assertEquals(edit(), false);
        // idhd not same 
    }

    function testTC_03()
    {
        $_POST["btn"] = true;
        $_POST['idhd'] = "12";
        $_POST['tenhd'] = "hoatdonga";
        $this->assertEquals(edit(), false);
        // not exitst get iddh
    }
    function testTC_04()
    {
        $_POST["btn"] = true;
        $_GET["idhd"] = "10000";
        $_POST['idhd'] = "10000";
        $_POST['tenhd'] = "hoatdonga";
        $this->assertEquals(edit(), false);
        // not exitst get iddh
    }
    function testTC_05()
    {
        $_POST["btn"] = true;
        $_GET["idhd"] = "";
        $_POST['idhd'] = "";
        $_POST['tenhd'] = "";
        $this->assertEquals(edit(), false);
        // data empty
    }
    function testTC_06()
    {
        $_POST["btn"] = true;
        $this->assertEquals(edit(), false);
        // post not exist
    }

}
