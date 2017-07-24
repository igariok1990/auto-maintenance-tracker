<?php

namespace unit\API\Controller;

use API\Controller\Mark;
use API\Controller\View\ErrorModel;
use API\Controller\View\MarkCollection;
use API\Controller\View\MarkModel;
use PHPUnit\Framework\TestCase;
use Zend\Http\Response;
use Core\Entity\Mark as Entity;
use Zend\View\Model\JsonModel;

class MarkTest extends TestCase
{
    /**
     * @test
     */
    public function testFetchAll()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->method('getList')->willReturn([]);
        $controller = new Mark($serviceMock);
        $result = $controller->getList();
        $this->assertTrue($result instanceof MarkCollection);
    }

    /**
     * @test
     */
    public function testFetchAllError()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->method('getList')->will($this->throwException(new \Exception('error')));
        $controller = new Mark($serviceMock);
        $result = $controller->getList();
        $this->assertTrue($result instanceof ErrorModel);
    }

    /**
     * @test
     */
    public function testGet()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->method('get')->willReturn(new Entity());
        $controller = new Mark($serviceMock);
        $result = $controller->get(1);
        $this->assertTrue($result instanceof MarkModel);
    }

    /**
     * @test
     */
    public function testGetError()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->method('get')->will($this->throwException(new \Exception('error')));
        $controller = new Mark($serviceMock);
        $result = $controller->get(1);
        $this->assertTrue($result instanceof ErrorModel);
    }

    /**
     * @test
     */
    public function testCreate()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->method('create')->willReturn(new Entity());
        $controller = new Mark($serviceMock);
        $result = $controller->create([]);
        $this->assertTrue($result instanceof MarkModel);
    }

    /**
     * @test
     */
    public function testCreateError()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->method('create')->will($this->throwException(new \Exception('error')));
        $controller = new Mark($serviceMock);
        $result = $controller->create([]);
        $this->assertTrue($result instanceof ErrorModel);
    }

    /**
     * @test
     */
    public function testUpdate()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->method('update')->willReturn(new Entity());
        $controller = new Mark($serviceMock);
        $result = $controller->update(1, []);
        $this->assertTrue($result instanceof JsonModel);
    }

    /**
     * @test
     */
    public function testUpdateError()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->method('update')->will($this->throwException(new \Exception('error')));
        $controller = new Mark($serviceMock);
        $result = $controller->update(1, []);
        $this->assertTrue($result instanceof ErrorModel);
    }

    /**
     * @test
     */
    public function testDelete()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->method('delete')->willReturn(null);
        $controller = new Mark($serviceMock);
        $result = $controller->delete(1);
        $this->assertTrue($result instanceof JsonModel);
    }

    /**
     * @test
     */
    public function testDeleteError()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->method('delete')->will($this->throwException(new \Exception('error')));
        $controller = new Mark($serviceMock);
        $result = $controller->delete(1);
        $this->assertTrue($result instanceof ErrorModel);
    }

    private function getServiceMock()
    {
        $mock = $this->getMockBuilder('API\Service\Mark')
            ->disableOriginalConstructor()->getMock();
        return $mock;
    }
}
