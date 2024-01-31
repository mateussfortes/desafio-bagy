<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Helpers\ManipularString;

class ManipularStringTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_retorna_string(): void
    {
        $manipularString = new ManipularString();        

        $this->assertEquals(
            'suetam',
            $manipularString->inverterString('mateus')
        );
    }
}
