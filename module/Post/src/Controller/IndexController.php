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
        $id = (int) $this->params()->fromRoute('id', 0);
        if ($id == 0) {
          exit('Can not handle this request. Error.');
        }

        try {
          $post = $this->table->getPost($id);
        }
          catch (Exception $e) {
            exit('Can not get data. Error.');
          }

        return new ViewModel([
          'post' => $post,
          'id' => $id
        ]);
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if ($id == 0) {
          exit('Can not handle this request. Error.');
        }

        try {
          $post = $this->table->getPost($id);
        }
          catch (Exception $e) {
            exit('Can not get data. Error.');
          }

        $form = new \Post\Form\PostForm;
        $form->bind($post);
        $request = $this->getRequest();
        if (!$request->isPost()) {
          return new ViewModel([
            'form' => $form,
            'id' => $id
          ]);
        }

        $form->setData($request->getPost());
        if (!$form->isValid()) {
          exit('Form data is not valid. Error.');
        }
        $this->table->saveData($post);
        return $this->redirect()->toRoute('post', [
          // 'controller' => 'edit',
          'action' => 'edit',
          'id' => $id,
        ]);
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if ($id == 0) {
          exit('Can not handle this request. Error.');
        }

        try {
          $post = $this->table->getPost($id);
        }
          catch (Exception $e) {
            exit('Can not get data. Error.');
          }
        $request = $this->getRequest();
        if (!$request->isPost()) {
          return new ViewModel([
            'post' => $post,
            'id' => $id
          ]);
        }

        $delete = $request->getPost('delete', 'No');
        if ($delete == 'Yes') {
          $id = (int) $post->getId();
          $this->table->deletePost($id);
          return $this->redirect()->toRoute('post');
        }
        else
        {
          return $this->redirect()->toRoute('post');
        }
    }
}
