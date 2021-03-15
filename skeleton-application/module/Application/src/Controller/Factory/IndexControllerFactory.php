<?php
namespace Application\Controller\Factory;

use Application\Service\MessageManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Controller\IndexController;

/**
 * This is the factory for IndexController. Its purpose is to instantiate the
 * controller.
 */
class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $messageManager = $container->get(MessageManager::class);

        // Instantiate the controller and inject dependencies
        return new IndexController($entityManager, $messageManager);
    }
}