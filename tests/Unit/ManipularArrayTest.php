<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Helpers\ManipularArray;
use App\Models\User;

class ManipularArrayTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_dobra_numeros(): void
    {
        $manipularArray = new ManipularArray();
        
        $numerosDobrados = $manipularArray->dobrarNumeros([1,2,3]);

        $this->assertEquals(
            2,
            $numerosDobrados[0]
        );
        $this->assertEquals(
            4,
            $numerosDobrados[1]
        );
        $this->assertEquals(
            6,
            $numerosDobrados[2]
        );
    }
    
}
