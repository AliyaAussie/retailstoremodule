<?php

/**
 * Class Ampersand_Testing_Model_Observers_TestingTest
 */
class Ampersand_Testing_Model_Observers_TestingTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var null
     */
    protected $subject = null;

    /**
     * Setup
     *
     * @author Daniel Doyle <dd@amp.co>
     */
    public function setup()
    {
        $this->subject = Mage::getModel('ampersand_testing/observers_testing');
    }

    /**
     * Returns self
     *
     * @author Daniel Doyle <dd@amp.co>
     */
    public function testGetSelf()
    {
        $this->assertSame($this->subject, $this->subject->getSelf());
    }

    /**
     * Test addition
     *
     * @author Daniel Doyle <dd@amp.co>
     */
    public function testAdd()
    {
        $this->assertEquals(3, $this->subject->add(1, 2));
    }

    /**
     * Test subtraction
     *
     * @author Daniel Doyle <dd@amp.co>
     */
    public function testSubtract()
    {
        $this->assertEquals(2, $this->subject->subtract(3, 1));
    }
}
