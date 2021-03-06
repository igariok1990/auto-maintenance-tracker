<?php

namespace API\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use API\Controller\Car as CarController;

class CarFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $markService = $container->get(\API\Service\Car::class);
        return new CarController($markService);
    }
}
