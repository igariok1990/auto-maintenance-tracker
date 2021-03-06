<?php

namespace unit\API\Service\Validator;

use API\RequestModel\MaintenanceHistory;
use PHPUnit\Framework\TestCase;

class MaintenanceHistoryTest extends TestCase
{
    public function testValidator()
    {
        $request = new MaintenanceHistory([]);
        $validator = new \API\Service\Validator\MaintenanceHistory();
        $validator->validate($request);
        $this->assertTrue($validator->hasErrors());
        $this->assertEquals(6, count($validator->getErrors()));
    }
}
