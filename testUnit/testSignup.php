<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../dangnhap_dangki/Signup.php';

class testSignup extends TestCase
{
    function testTC_01()
    {
        $this->assertEquals(isValidEmail("test@gmail.com"), true);

    }
    function testTC_02()
    {
        $this->assertEquals(isValidEmail("test"), false);
    }


    function testTC_03()
    {
        $_POST["Submit"] = true;
        $_POST['Uname'] = "Uname1";
        $_POST['Pass'] = "password17";
        $_POST['Email'] = "email17@gmail.com";
        $_POST['sdt'] = "098765432";
        $this->assertEquals(createSignup(), true);
    }

    function testTC_04()
    {
        $_POST["Submit"] = true;
        $_POST['Uname'] = "Uname2";
        $_POST['Pass'] = "password12";
        $_POST['Email'] = "emai12";
        $_POST['sdt'] = "name12";
        $this->assertEquals(createSignup(), false);
    }

    function testTC_05()
    {
        $_POST["Submit"] = true;
        $_POST['Uname'] = "name20";
        $_POST['Pass'] = "password20";
        $_POST['Email'] = "emai20@gmail.com";
        $_POST['sdt'] = "";
        $this->assertEquals(createSignup(), false);
    }
}
