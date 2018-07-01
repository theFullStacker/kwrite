<?php

namespace Kwrite\Applications\Validators;

use Kwrite\CheckForm\Validator\CheckForm;
use Kwrite\Applications\Languages\BlogSystemLanguage;

/*
 * Example
 * $blogSystem = new BlogSystem();
 * 
 * #=> Validar form criar blog
 * $blogSystem->name = "";
 * $blogSystem->slogan = "";
 * $blogSystem->description = "";
 * $blogSystem->create(); #=> return message error
 * 
 * #=> Validar form atualizar blog
 * #=> metodo GET
 *     $blogSystem->blog_system = "";
 *     $blogSystem->updateGET();  #=> return message error
 * 
 * #=> metodo POST
 *     $blogSystem->name = "";
 *     $blogSystem->slogan = "";
 *     $blogSystem->description = "";
 *     $blogSystem->blog_system = "";
 *     $blogSystem->updatePOST();  #=> return message error
 * 
 * #=> Validar form deletar blog
 * $blogSystem->blog_system = "";
 * $blogSystem->delete();  #=> return message error
 * 
 */
class BlogSystem extends CheckForm
{
    public $name = "";
    public $slogan = "";
    public $description = "";
    public $blog_system = "";
    private $language = array();
    
    function __construct()
    {
        $language = new BlogSystemLanguage();
        $this->language = $language["form"]["error"];
    }
    
    public function create()
    {
        $this->emptyName();
        $this->emptyLimit();
        $this->limitName();
        $this->limitSlogan();
        $this->limitDescription();
        $this->regexName();
        $this->regexSlogan();
        $this->regexDescription();
        return $this->getMessage();
    }
    
    public function updateGET()
    {
        $this->emptyBlogSystem();
        $this->limitBlogSystem();
        $this->regexBlogSystem();
        return $this->getMessage();
    }
    
    public function updatePOST()
    {
        $this->emptyName();
        $this->emptySlogan();
        $this->emptyBlogSystem();
        $this->limitName();
        $this->limitSlogan();
        $this->limitBlogSystem();
        $this->limitDescription();
        $this->regexName();
        $this->regexSlogan();
        $this->regexBlogSystem();
        $this->regexDescription();
        return $this->getMessage();
    }
    
    public function delete()
    {
        $this->emptyBlogSystem();
        $this->limitBlogSystem();
        $this->regexBlogSystem();
        return $this->getMessage();
    }
    
    private function emptyName()
    {
        $message = $this->language["empty"]["name"];
        $this->empty["name"]["message"] = $message;
        $this->empty["name"]["value"] = $this->name;
    }
    
    private function emptySlogan()
    {
        $message = $this->language["empty"]["slogan"];
        $this->empty["slogan"]["message"] = $message;
        $this->empty["slogan"]["value"] = $this->slogan;
    }
    
    private function emptyBlogSystem()
    {
        $message = $this->language["empty"]["blog_system"];
        $this->empty["blog_system"]["message"] = $message;
        $this->empty["blog_system"]["value"] = $this->blog_system;
    }
    
    private function limitName()
    {
        $message = $this->language["limit"]["name"];
        $this->limit["name"]["message"] = $message;
        $this->limit["name"]["min"] = 0;
        $this->limit["name"]["max"] = 20;
        $this->limit["name"]["value"] = $this->name;
    }
    
    private function limitSlogan()
    {
        $message = $this->language["limit"]["slogan"];
        $this->limit["slogan"]["message"] = $message;
        $this->limit["slogan"]["min"] = 0;
        $this->limit["slogan"]["max"] = 20;
        $this->limit["slogan"]["value"] = $this->slogan;
    }
    
    private function limitDescription()
    {
        $message = $this->language["limit"]["description"];
        $this->limit["description"]["message"] = $message;
        $this->limit["description"]["min"] = 0;
        $this->limit["description"]["max"] = 255;
        $this->limit["description"]["value"] = $this->description;
    }
    
    private function limitBlogSystem()
    {
        $message = $this->language["limit"]["blog_system"];
        $this->limit["blog_system"]["message"] = $message;
        $this->limit["blog_system"]["min"] = 0;
        $this->limit["blog_system"]["max"] = 20;
        $this->limit["blog_system"]["value"] = $this->blog_system;
    }
    
    private function regexName()
    {
        $message = $this->language["regex"]["name"];
        $this->regex["name"]["message"] = $message;
        $this->regex["name"]["common"] = "a_zA_Z ";
        $this->regex["name"]["simbols"] = "aAyc";
        $this->regex["name"]["value"] = $this->name;
    }
    
    private function regexSlogan()
    {
        $message = $this->language["regex"]["slogan"];
        $this->regex["slogan"]["message"] = $message;
        $this->regex["slogan"]["common"] = "a_z_";
        $this->regex["slogan"]["value"] = $this->slogan;
    }
    
    private function regexDescription()
    {
        $message = $this->language["regex"]["description"];
        $this->regex["description"]["message"] = $message;
        $this->regex["description"]["common"] = "a_zA_Z0_9 !@#$%&*)(}{][=+-./;:><,";
        $this->regex["description"]["simbols"] = "aAyc";
        $this->regex["description"]["value"] = $this->description;
    }
    
    private function regexBlogSystem()
    {
        $message = $this->language["regex"]["blog_system"];
        $this->regex["blog_system"]["message"] = $message;
        $this->regex["blog_system"]["common"] = "a_z_";
        $this->regex["blog_system"]["value"] = $this->blog_system;
    }
}