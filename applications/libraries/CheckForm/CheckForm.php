<?php

namespace Kwrite\CheckForm\Validator;
use \Kwrite\Lib\CheckEmpty;
use \Kwrite\Lib\CheckLimit;
use \Kwrite\Lib\CheckEmail;
use \Kwrite\Lib\CheckRegex;
use \Kwrite\Lib\CheckDate;
use \Kwrite\Lib\CheckTime;
use \Kwrite\Lib\CheckDatetime;


class CheckForm
{
    public $empty = array();
    public $limit = array();
    public $email = array();
    public $regex = array();
    public $date = array();
    public $time = array();
    public $datetime = array();
    private $messages = array();
        
    public function getMessage()
    {
        $this->makeEmpty();
        $this->makeLimit();
        $this->makeEmail();
        $this->makeRegex();
        $this->makeDate();
        $this->makeTime();
        $this->makeDatetime();
        return $this->messages;
    }
        
    private function makeEmpty()
    {
        foreach ($this->empty as $key => $value)
        {
            if (CheckEmpty::make($value["value"]))
            {
                $this->messages[$key]["empty"] = $value["message"];
            }
        }
    }
        
    private function makeLimit()
    {
        foreach ($this->limit as $key => $value)
        {
            if (CheckLimit::make($value["value"], $value["min"], $value["max"]))
            {
                $this->messages[$key]["limit"] = $value["message"];
            }
        }
    }
        
    private function makeEmail()
    {
        foreach ($this->email as $key => $value)
        {
            if (!CheckEmail::make($value["value"]))
            {
                $this->messages[$key]["email"] = $value["message"];
            }
        }
    }
        
    private function makeRegex()
    {
        foreach ($this->regex as $key => $value)
        {
            $checkRegex = new CheckRegex();
            $checkRegex->value = $value["value"];
            $checkRegex->common($value["common"] ?? "");
            $checkRegex->simbols($value["simbols"] ?? "");
            if (!$checkRegex->make())
            {
                $this->messages[$key]["regex"] = $value["message"];
            }
        }
    }
        
    private function makeDate()
    {
        foreach ($this->date as $key => $value)
        {
            if (!CheckDate::make($value["value"]))
            {
                $this->messages[$key]["date"] = $value["message"];
            }
        }
    }
        
    private function makeTime()
    {
        foreach ($this->time as $key => $value)
        {
            if (!CheckTime::make($value["value"]))
            {
                $this->messages[$key]["time"] = $value["message"];
            }
        }
    }
        
    private function makeDatetime()
    {
        foreach ($this->datetime as $key => $value)
        {
            if (!CheckDatetime::make($value["value"]))
            {
                $this->messages[$key]["datetime"] = $value["message"];
            }
        }
    }
}