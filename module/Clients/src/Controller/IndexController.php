<?php

declare(strict_types=1);

namespace Clients\Controller;

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
        $clients = $this->table->fetchAll();
        return new ViewModel(['clients' => $clients]);
    }

    public function clientAddAction()
    {
        $request = $this->getRequest();

        if ($request->isGet()) {
          return $this->redirect()->toRoute('calendar');
        }

        if ($request->isPost())
        {
          $client = new \Clients\Model\Clients();
          $data = $request->getPost();
          $client->exchangeArray($data);
          $this->table->saveData($client);

          echo "success";
          exit;
        }
    }
}
