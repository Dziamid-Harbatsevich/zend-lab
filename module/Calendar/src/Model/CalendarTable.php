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

	public function saveData($event)
	{
		$data = [
			'title' => $event->getTitle(),
			'description' => $event->getDescription(),
			'date' => $event->getDate(),
		];
		return $this->tableGateway->insert($data);
	}

	public function getEvent($id)
	{
		return $this->tableGateway->select([
			'id' => $id
		])->current();
	}

	public function deleteEvent($id)
	{
		return $this->tableGateway->delete([
			'id' => $id
		]);
	}
}