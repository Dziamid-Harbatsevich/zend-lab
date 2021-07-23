<?php

declare(strict_types=1);

namespace Calendar\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
		protected $table;

		public function __construct($table){
			$this->table = $table;
		}

    public function indexAction()
    {
    		$events = $this->table->fetchAll();
        return new ViewModel(['events' => $events]);
    }

    public function addAction()
    {
    		$form = new \Calendar\Form\CalendarForm;
    		$request = $this->getRequest();
    		if ($request->isGet())
        {
    			return new ViewModel(['form' => $form]);
    		}
        if ($request->isPost())
        {
          $event = new \Calendar\Model\Calendar();
          $form->setData($request->getPost());
          if (!$form->isValid()) {
            exit('id is not correct');
          }

          $event->exchangeArray($form->getData());
          $this->table->saveData($event);
          return $this->redirect()->toRoute('calendar');
          // return $this->redirect()->toRoute('calendar', [
          //   'controller' => 'index',
          //   'action' => 'add'
          // ]);
        }
    }

    public function showAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }

    public function deleteAction()
    {
        dd($this->getRequest());
        // return new ViewModel();
    }
}
