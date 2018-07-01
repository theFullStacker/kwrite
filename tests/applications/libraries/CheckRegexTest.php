<?php 


use Kwrite\Lib\CheckRegex;
use PHPUnit\Framework\TestCase;


class CheckRegexTest extends TestCase
{
	public function testUnique()
	{
		$checkRegex = new CheckRegex();
		$checkRegex->value = "abcdefghijklmnopqrstuvwxyz";
		$checkRegex->common("a_z");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$checkRegex->common("A_Z");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "0123456789";
		$checkRegex->common("0_9");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$checkRegex->common("a_zA_Z");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "abcdefghijklmnopqrstuvwxyz0123456789";
		$checkRegex->common("a_z0_9");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$checkRegex->common("A_Z0_9");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "hello world . example";
		$checkRegex->common("a_z -_+.");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$checkRegex->common("a_zA_Z0_9");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$checkRegex->common("a_z");
		$this->assertEquals($checkRegex->make(), false);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "áéíóú";
		$checkRegex->simbols("á_ú");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "ÁÉÍÓÚ";
		$checkRegex->simbols("Á_Ú");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "àèìòù";
		$checkRegex->simbols("à_ù");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "ÀÈÌÒÙ";
		$checkRegex->simbols("À_Ù");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "ãẽĩõũ";
		$checkRegex->simbols("ã_ũ");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "ÃẼĨÕŨ";
		$checkRegex->simbols("Ã_Ũ");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "âêîôû";
		$checkRegex->simbols("â_û");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "ÂÊÎÔÛ";
		$checkRegex->simbols("Â_Û");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "äëïöü";
		$checkRegex->simbols("ä_ü");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "ÄËÏÖÜ";
		$checkRegex->simbols("Ä_Ü");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "çḉÇḈ";
		$checkRegex->simbols("ç_Ç");
		$this->assertEquals($checkRegex->make(), true);

		$checkRegex = new CheckRegex();
		$checkRegex->value = "ýÝỳỲỹỸŷŶÿŸ";
		$checkRegex->simbols("y_Y");
		$this->assertEquals($checkRegex->make(), true);
	}
}