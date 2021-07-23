<?php
namespace Calendar\Form;

use Zend\Form\Form;

use Zend\Form\Element;

/**
 *
 */
class CalendarForm extends Form
{

	function __construct($name = null)
	{
		parent::__construct('calendar');
		$this->setAttribute('method', 'POST');

		$this->add([
			'name' => 'id',
			'type' => 'hidden',
		]);

		$this->add([
			'name' => 'title',
			'type' => 'text',
			'class' => 'form-control',
			'options' => [
				'label' => 'Название'
			],
		]);

		$this->add([
			'name' => 'description',
			'type' => 'textarea',
			'class' => 'form-control',
			'options' => [
				'label' => 'Описание'
			],
		]);

		$dateTimeLocal = new Element\DateTimeLocal('date');
		$dateTimeLocal->setLabel('Дата события');
		$dateTimeLocal->setAttributes([
			'class' => 'form-control',
		    // 'min'  => '2010-01-01T00:00:00',
		    // 'max'  => '2020-01-01T00:00:00',
		    // 'step' => '1', // minutes; default step interval is 1 min
		]);
		$dateTimeLocal->setOptions([
		    'format' => 'Y-m-d\TH:i',
		]);
		$this->add($dateTimeLocal);

		$this->add([
			'name' => 'submit',
			'type' => 'submit',
			'class' => 'btn btn-primary',
			'attributes' => [
				'value' => 'Добавить',
				'id' => 'buttonSave'
			],
		]);
	}
}