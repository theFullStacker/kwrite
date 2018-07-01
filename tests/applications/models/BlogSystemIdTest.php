<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogSystemId;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;


class BlogSystemIdTest extends TestCase
{
	public function testId()
	{
		$this->create();

		$model = new BlogSystemId();
		$model->blog_system = "novo_blog";
		$data = $model->get();

		$this->assertEquals(is_int($data), true);
		$this->assertNotEquals($data, 0);
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