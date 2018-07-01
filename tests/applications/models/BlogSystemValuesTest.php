<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogSystemValues;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;


class BlogSystemValuesTest extends TestCase
{
	public function testValues()
	{
		$this->create();

		$model = new BlogSystemValues();
		$model->blog_system = "novo_blog";
		$data = $model->values();

		$this->assertEquals($data[0]["name"], "Novo Blog");
		$this->assertEquals($data[0]["slogan"], "novo_blog");
		$this->assertEquals($data[0]["description"], "Descrição do blog.");
		$this->drop();
	}

	private function create()
	{
		$query = new Insert();
        $query->tableName = "blog_system";
        $query->name = "Novo Blog";
        $query->slogan = "novo_blog";
        $query->description = "Descrição do blog.";
        $query->created_at = "datetime();";
        $query->updated_at = "datetime();";

        $conn = new Connection();
        $conn->insert(
            $query->make()
        );
	}

	private function drop()
	{
		$query = new Delete();
        $query->tableName = "blog_system";

        $conn = new Connection();
        $conn->delete(
            $query->make()
        );
	}
}