<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogCategoriesUpdate;
use Kwrite\Applications\Models\BlogSystemCreate;
use Kwrite\Applications\Models\BlogSystemDelete;
use KWrite\Applications\Models\BlogSystemId;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogCategoriesUpdateTest extends TestCase
{
	public function testUpdate()
	{
		$this->createBlog();
		$this->create();

		$model = new BlogCategoriesUpdate();
		$model->name = "Categoria Atualizada";
		$model->slogan = "categoria_atualizada";
		$model->description = "Descrição da categoria.";
		$model->blog_categories = "nova_categoria";
		$model->id_blog = $this->idBlog();
		$model->update();

		$data = $this->data();
		$this->assertEquals($data[0]["name"], "Categoria Atualizada");
		$this->assertEquals($data[0]["slogan"], "categoria_atualizada");
		$this->assertEquals($data[0]["description"], "Descrição da categoria.");

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
		$query->tableCollumns[0] = "name";
		$query->tableCollumns[1] = "slogan";
		$query->tableCollumns[2] = "description";
		$query->tableWhere[0] = array("slogan", "==", "categoria_atualizada");
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