<?php
namespace Calendar\Model;

/**
 *
 */
use Zend\Db\TableGateway\TableGatewayInterface;

// use Laminas\Db\Adapter\Adapter;
// use Laminas\Db\Sql\Sql;
// use Zend\Db\TableGateway\TableGateway;
// use Zend\Db\Sql\Select;
// use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\Sql\Select;

class CalendarTable
{
	protected $tableGateway;

	function __construct(TableGatewayInterface $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		return $this->tableGateway->select();

		// $rowset = $this->tableGateway->select(function (Select $select) {
		//     $select->join('clients', 'clients.id = calendar.client_id', ['id','name','email'], 'left');
		// });
		// return $rowset;

	}

	public function saveData($post)
	{
		$data = [
			'title' => $post->getTitle(),
			'description' => $post->getDescription(),
			'date' => $post->getDate(),
		];
		return $this->tableGateway->insert($data);
	}
}