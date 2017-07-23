<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21/07/17
 * Time: 3:41 PM
 */

namespace unit\API\Service\Validator;

use API\RequestModel\CarType;
use PHPUnit\Framework\TestCase;

class CarTypeTest extends TestCase
{
    public function testValidator()
    {
        $request = new CarType([]);
        $validator = new \API\Service\Validator\CarType();
        $validator->validate($request);
        $this->assertTrue($validator->hasErrors());
        $this->assertEquals(1, count($validator->getErrors()));
    }
}
