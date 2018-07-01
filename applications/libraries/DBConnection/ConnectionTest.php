<?php 

namespace Kwrite\DBConnection;
use PDO;


class Connection
{
	private $connector;

	function __construct()
	{
		$this->connector = new PDO('mysql:host=localhost; dbname=kwriteTest', 'root', 'jorge');
	}

	public function insert($value)
	{
		$stmt = $this->connector->prepare($value);
		$stmt->execute();
	}

	public function delete($value)
	{
		$stmt = $this->connector->prepare($value);
		$stmt->execute();
	}

	public function update($value)
	{
		$stmt = $this->connector->prepare($value);
		$stmt->execute();
	}

	public function select($value, $collumns)
	{
		$data = array();
		$data_length = 0;

		foreach ($this->connector->query($value) as $row)
		{
			foreach ($collumns as $collumns_key)
			{
				$data[$data_length][$collumns_key] = $row[$collumns_key];
			}
			$data_length += 1;
		}

		return $data;
	}

	public function count($value, $collumn)
	{
		foreach ($this->connector->query($value) as $row)
		{
			foreach ($row as $rowKey => $rowValue)
			{
				return (int) $rowValue;
			}

			return 0;
		}
	}
}