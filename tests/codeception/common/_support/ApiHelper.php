<?php

namespace tests\codeception\common\_support;

class ApiHelper extends \Codeception\Module
{
    public function seeResponseIsHtml()
    {
        $response = $this->getModule('REST')->response;
        \PHPUnit_Framework_Assert::assertRegex('~^<!DOCTYPE HTML(.*?)<html>.*?<\/html>~m', $response);
    }
}
?>