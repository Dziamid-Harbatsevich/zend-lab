<?php

declare(strict_types=1);

namespace Post\Controller;

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
    		$posts = $this->table->fetchAll();
        return new ViewModel(['posts' => $posts]);
    }

    public function addAction()
    {
    		$form = new \Post\Form\PostForm;
    		$request = $this->getRequest();
    		if ($request->isGet())
        {
    			return new ViewModel(['form' => $form]);
    		}
        if ($request->isPost())
        {
          $post = new \Post\Model\Post();
          $form->setData($request->getPost());
          if (!$form->isValid()) {
            exit('id is not correct');
          }

          $post->exchangeArray($form->getData());
          $this->table->saveData($post);
          return $this->redirect()->toRoute('post');
          // return $this->redirect()->toRoute('post', [
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
        return new ViewModel();
    }
}
