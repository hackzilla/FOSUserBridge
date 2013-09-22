<?php

namespace Hackzilla\Bundle\FOSUserBridgeBundle\Tests\User;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FOSUserTest extends WebTestCase
{
    private $_object;

    public function setUp()
    {
        $this->_object = new \Hackzilla\Bundle\FOSUserBridgeBundle\User\FOSUser();
    }

    public function tearDown()
    {
        unset($this->_object);
    }

    public function testObjectCreated()
    {
        $this->assertTrue(\is_object($this->_object));
    }
}

