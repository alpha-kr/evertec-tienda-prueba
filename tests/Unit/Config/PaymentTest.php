<?php

namespace Tests\Unit\Config;

use Tests\TestCase;

class PaymentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_gateway_states_contains_system_state()
    {
        $gateways=array_values(config('payment.states.gateway'));
        $system=array_keys(config('payment.states.system'));
        
        $this->assertTrue(  array_intersect($gateways,$system)==$gateways);
    }

    public function test_system_states_are_not_empty()
    {
        $this->assertGreaterThanOrEqual(1,count(config('payment.states.system')));
    }

    public function test_gateway_states_are_not_empty()
    {
         $this->assertGreaterThanOrEqual(1,count(config('payment.states.gateway')));
    }

    public function system_states_has_colors_and_names()
    {
        foreach (config('payment.states.system') as $states =>$colorNameArray) {
            $this->assertTrue(in_array(['name','color'], array_keys($colorNameArray))); 
        }
    }
    public function test_initial_status_diferent_restart_status()
    {
         $this->assertTrue( config('payment.states.restart')!=config('payment.states.initial'));
    }
}
