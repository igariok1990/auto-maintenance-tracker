<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 20/07/17
 * Time: 8:00 AM
 */

namespace API\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use API\Controller\Mark as MarkController;

class MarkFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $markService = $container->get(\API\Service\Mark::class);
        return new MarkController($markService);
    }
}
