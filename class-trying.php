<?php
class Reason{
    public $subject;
    public $content;
    function __construct($subject,$content){
        $this->subject = $subject;
        $this->content = $content;
    }
}

$res = new Reason("hello","this is content");
echo $res->subject;