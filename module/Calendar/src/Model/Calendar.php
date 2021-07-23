<?php
namespace Calendar\Model;

/**
 *
 */
class Calendar
{
	protected $id;
	protected $title;
	protected $description;
	protected $date;

	public function exchangeArray($data){
		$this->id = $data['id'];
		$this->title = $data['title'];
		$this->description = $data['description'];
		$this->date = $data['date'];
	}

	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getDate() {
		return $this->date;
	}
}