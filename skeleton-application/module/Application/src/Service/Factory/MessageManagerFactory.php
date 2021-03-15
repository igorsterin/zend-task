<?php
namespace Application\Service\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\MessageManager;

class MessageManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,
        $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');

        // Инстанцируем сервис и внедряем зависимости.
        return new MessageManager($entityManager);
    }
}