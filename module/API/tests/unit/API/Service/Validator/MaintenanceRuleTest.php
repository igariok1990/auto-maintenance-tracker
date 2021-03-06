<?php

namespace unit\API\Service\Validator;

use API\RequestModel\MaintenanceRule;
use PHPUnit\Framework\TestCase;

class MaintenanceRuleTest extends TestCase
{
    public function testValidator()
    {
        $request = new MaintenanceRule([]);
        $validator = new \API\Service\Validator\MaintenanceRule();
        $validator->validate($request);
        $this->assertTrue($validator->hasErrors());
        $this->assertEquals(6, count($validator->getErrors()));
    }
}
