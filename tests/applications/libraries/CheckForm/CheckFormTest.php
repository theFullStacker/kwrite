<?php 


use Kwrite\CheckForm\Validator\CheckForm;
use PHPUnit\Framework\TestCase;


class CheckFormTest extends TestCase
{
	public function testEmpty()
	{
		$checkForm = new CheckForm();
		$checkForm->empty["example"]["message"] = "Preencha esse campo";
		$checkForm->empty["example"]["value"] = "";
		$this->assertEquals(
			$checkForm->getMessage(),
			array(
				"example" => array(
					"empty" => "Preencha esse campo"
				)
			)
		);
	}

	public function testLimit()
	{
		$checkForm = new CheckForm();
		$checkForm->limit["example"]["message"] = "informe no maximo 5 caracteres";
		$checkForm->limit["example"]["min"] = 0;
		$checkForm->limit["example"]["max"] = 5;
		$checkForm->limit["example"]["value"] = "hello world";
		$this->assertEquals(
			$checkForm->getMessage(),
			array(
				"example" => array(
					"limit" => "informe no maximo 5 caracteres"
				)
			)
		);
	}

	public function testEmail()
	{
		$checkForm = new CheckForm();
		$checkForm->email["example"]["message"] = "Informe um email valido";
		$checkForm->email["example"]["value"] = "my.email.foo";
		$this->assertEquals(
			$checkForm->getMessage(),
			array(
				"example" => array(
					"email" => "Informe um email valido"
				)
			)
		);
	}

	public function testRegex()
	{
		$checkForm = new CheckForm();
		$checkForm->regex["example"]["message"] = "informe apenas letras minusculas";
		$checkForm->regex["example"]["common"] = "a_z";
		$checkForm->regex["example"]["value"] = "HELLOWORLD";
		$this->assertEquals(
			$checkForm->getMessage(),
			array(
				"example" => array(
					"regex" => "informe apenas letras minusculas"
				)
			)
		);
	}

	public function testDate()
	{
		$checkForm = new CheckForm();
		$checkForm->date["example"]["message"] = "Informe uma data valida";
		$checkForm->date["example"]["value"] = "a257-58-59";
		$this->assertEquals(
			$checkForm->getMessage(),
			array(
				"example" => array(
					"date" => "Informe uma data valida"
				)
			)
		);
	}

	public function testTime()
	{
		$checkForm = new CheckForm();
		$checkForm->time["example"]["message"] = "Informe uma hora valida";
		$checkForm->time["example"]["value"] = "a0:00:00";
		$this->assertEquals(
			$checkForm->getMessage(),
			array(
				"example" => array(
					"time" => "Informe uma hora valida"
				)
			)
		);
	}

	public function testDatetime()
	{
		$checkForm = new CheckForm();
		$checkForm->datetime["example"]["message"] = "Informe uma data e hora valida";
		$checkForm->datetime["example"]["value"] = "a257-58-59 a0:00:00";
		$this->assertEquals(
			$checkForm->getMessage(),
			array(
				"example" => array(
					"datetime" => "Informe uma data e hora valida"
				)
			)
		);
	}
}