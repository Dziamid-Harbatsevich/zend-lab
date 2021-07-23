<?php
namespace Clients\Model;

/**
 *
 */
class Clients
{
	protected $id;
	protected $name;
	protected $email;
	protected $event_id;

	public function exchangeArray($data){
		$this->id = $data['id'];
		$this->name = $data['name'];
		$this->email = $data['email'];
		$this->event_id = $data['event_id'];
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getEventId() {
		return $this->event_id;
	}
}