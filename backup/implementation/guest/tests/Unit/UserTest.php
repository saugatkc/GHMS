<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */


    public function testLogin()
    {

	    $username="saugat11";
	    $password="saugatc";

	    $response = $this->call("get",'/login',[
	    	'userName'=>$username,
	    	'password' => $password
	    ]);

	    $this->assertEquals(200,$response->status());
    }


        public function testLogin2()
    {

	    $userName="saugat11";
	    $password="saugatkc";

	    $response = $this->call("Get",'/login',[
	    	'userName'=>$userName,
	    	'password' => $password
	    ]);

	    $this->assertEquals(200,$response->status());
    }

    public function testRegister()
    {
    	$response = $this->call("POST",'/register',[
	    	'userName' => "testsaugat",
	    	'name' => "saugat",
	    	'email' => "thelastresort@gmail.com",
	    	'phone' => "9814564131",
	    	'password' => "saugatkc",
	    	'password_confirmation' => "saugatkc",
	    ]);

	    $this->assertEquals(302,$response->status());
    }

        public function testRoomadd()
    {
    	$response = $this->call('GET', '/room');

    	$this->assertEquals(200,$response->status());
    }

        public function testRoomDelete()
    {
    	$response = $this->call('DELETE', '/rooms/delete/1');

    	$this->assertEquals(302,$response->status());
    }


            public function testCheckIn()
    {
    	$response = $this->call('POST', '/booking/checkIn/12');

    	$this->assertEquals(302,$response->status());
    }

            public function testSearchRoom()
    {
    	$response = $this->call('GET', '/reservation');

    	$this->assertEquals(200,$response->status());
    }

        public function testDeleteBooking()
    {
    	$response = $this->call("DELETE",'/booking/adminDelete/14');

	    $this->assertEquals(302,$response->status());
    }

        public function testGenerateBill()
    {
    	$response = $this->call('POST', '/bill', [
    		'bookingId' =>"10",
    		'noOfNights'=>"2",
    	]);

    	$this->assertEquals(200,$response->status());
    }

            public function testItemDelete()
    {
        $response = $this->call('DELETE', 'menu/delete/5');

        $this->assertEquals(302,$response->status());
    }
}
