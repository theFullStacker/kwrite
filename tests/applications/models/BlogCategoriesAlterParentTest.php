<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogCategoriesAlterParent;
use Kwrite\Applications\Models\BlogSystemCreate;
use Kwrite\Applications\Models\BlogSystemDelete;
use KWrite\Applications\Models\BlogSystemId;
use Kwrite\DBConnection\Connection;
use KWrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogCategoriesAlterParentTest extends TestCase
{
	public function testAlterParent()
	{
		$this->createBlog();
		$this->create();

		$model = new BlogCategoriesAlterParent();
		$model->id_parent = 2;
		$model->if_parent = 7;
		$model->id_blog = $this->idBlog();
		$model->alterParent();

		$data = $this->data();
		$this->assertEquals($data[0]["name"], "Nova Categoria");
		$this->assertEquals($data[0]["slogan"], "nova_categoria");
		$this->assertEquals($data[0]["description"], "Descrição da categoria.");
		$this->assertEquals($data[0]["id_parent"], 2);

		$this->drop();
		$this->dropBlog();
	}

	private function createBlog()
	{
		$model = new BlogSystemCreate();
		$model->name = "Novo Blog";
		$model->slogan = "novo_blog";
		$model->description = "Descrição do blog.";
		$model->create();
	}

	private function dropBlog()
	{
		$model = new BlogSystemDelete();
		$model->blog_system = "novo_blog";
		$model->delete();
	}

	private function idBlog()
	{
		$model = new BlogSystemId();
		$model->blog_system = "novo_blog";
		return $model->get();
	}

	private function data()
	{
		$query = new SelectWhereLimit();
		$query->tableName = "blog_categories";
		$query->tableLimit = 1;
		$query->tableCollumns[0] = "id_parent";
		$query->tableCollumns[1] = "name";
		$query->tableCollumns[2] = "slogan";
		$query->tableCollumns[3] = "description";
		$query->tableWhere[0] = array("slogan", "==", "nova_categoria");
		$query->tableWhere[1] = array("id_blog", "==", $this->idBlog());

		$conn = new Connection();
		return $conn->select(
			$query->make(),
			$query->tableCollumns
		);
	}

	private function create()
	{
		$query = new Insert();
		$query->tableName = "blog_categories";
		$query->name = "Nova Categoria";
		$query->slogan = "nova_categoria";
		$query->description = "Descrição da categoria.";
		$query->created_at = "datetime();";
		$query->updated_at = "datetime();";
		$query->id_blog = $this->idBlog();
		$query->id_parent = 7;

		$conn = new Connection();
		$conn->insert($query->make());
	}

	private function drop()
	{
		$query = new Delete();
		$query->tableName = "blog_categories";

		$conn = new Connection();
		$conn->delete(
			$query->make()
		);
	}
}