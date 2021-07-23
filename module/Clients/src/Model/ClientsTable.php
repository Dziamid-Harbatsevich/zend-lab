<?php
namespace Clients\Model;

/**
 *
 */
use Zend\Db\TableGateway\TableGatewayInterface;

use Laminas\Db\Sql\Select;

class ClientsTable
{
	protected $tableGateway;

	function __construct(TableGatewayInterface $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		return $this->tableGateway->select();
	}

	public function saveData($client)
	{
		$data = [
			'name' => $client->getName(),
			'email' => $client->getEmail(),
			'event_id' => $client->getEventId(),
		];
		return $this->tableGateway->insert($data);
	}
}