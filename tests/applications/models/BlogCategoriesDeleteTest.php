<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogCategoriesDelete;
use Kwrite\Applications\Models\BlogSystemCreate;
use Kwrite\Applications\Models\BlogSystemDelete;
use KWrite\Applications\Models\BlogSystemId;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogCategoriesDeleteTest extends TestCase
{
	public function testDelete()
	{
		$this->createBlog();
		$this->create();

		$model = new BlogCategoriesDelete();
		$model->blog_categories = "nova_categoria";
		$model->id_blog = $this->idBlog();
		$model->delete();

		$data = $this->data();
		$this->assertEquals(count($data), 0);
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
		$query->tableCollumns[0] = "name";
		$query->tableCollumns[1] = "slogan";
		$query->tableCollumns[2] = "description";
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
		$query->id_parent = 0;

		$conn = new Connection();
		$conn->insert($query->make());
	}
}