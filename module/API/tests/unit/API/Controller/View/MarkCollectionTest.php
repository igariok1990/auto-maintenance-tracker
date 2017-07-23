<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09/06/17
 * Time: 2:22 PM
 */

namespace unit\API\Controller\View;

use PHPUnit\Framework\TestCase;

class MarkCollectionTest extends TestCase
{
    /**
     * @test
     */
    public function testView()
    {
        $entity = new \Core\Entity\Mark();
        $entity->setName('test');
        $workflowModel = new \API\Controller\View\MarkCollection([$entity]);
        $this->assertEquals(1, count($workflowModel->getVariable('_embedded')['marks']));
    }
}
