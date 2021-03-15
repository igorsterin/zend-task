<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\Message;
use Application\Entity\Post;
use Application\Form\MessageForm;
use Application\Form\GuestForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    private $entityManager;

    private $messageManager;

    public function __construct($entityManager, $messageManager)
    {
        $this->entityManager = $entityManager;
        $this->messageManager = $messageManager;
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function guestAction()
    {
        $form = new GuestForm();
        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $form->setData($data);
        }
        return new ViewModel(
            [
                'form' => $form
            ]
        );
    }

    public function dbtestAction()
    {
        $posts = $this->entityManager->getRepository(Post::class)->findBy([], ['dateCreated'=>'DESC']);
        return new ViewModel();
    }

    public function viewtestAction()
    {
        $vyvod = 's454e7546fs';
        return new ViewModel(['vyvod' => $vyvod]);
    }

    public function messageAction()
    {
        $form = new MessageForm();
        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $form->setData($data);
            $this->messageManager->addNewMessage($data);
            $this->redirect()->refresh();
        }
        $messages = $this->entityManager->getRepository(Message::class)->findBy([], ['dateCreated'=>'DESC']);
       // $messages = $this->entityManager->getRepository(Message::class)->findAll();
        return new ViewModel(
            [
                'form' => $form,
                'messages' => $messages
            ]
        );
    }

    public function escapeAction()
    {
        return new ViewModel();
    }


}
