<?php
namespace Clients\Form;

use Zend\Form\Form;

/**
 *
 */
class ClientsForm extends Form
{

	function __construct($name = null)
	{
		parent::__construct('clients');
		$this->setAttribute('method', 'POST');

		$this->add([
			'name' => 'id',
			'type' => 'hidden',
		]);

		$this->add([
			'name' => 'name',
			'type' => 'text',
			'options' => [
				'label' => 'Name'
			],
		]);

		$this->add([
			'name' => 'email',
			'type' => 'text',
			'options' => [
				'label' => 'Email'
			],

		$this->add([
			'name' => 'event_id',
			'type' => 'hidden',
		]);

		$this->add([
			'name' => 'submit',
			'type' => 'submit',
			'attributes' => [
				'value' => 'Save',
				'id' => 'buttonSave'
			],
		]);
	}
}