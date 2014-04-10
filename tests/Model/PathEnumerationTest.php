<?php

namespace Ucf\Hierarchy\Tests\Model;

use PHPUnit_Framework_TestCase;
use Ucf\Hierarchy\Model\PathEnumeration;

/**
 * Class PathEnumerationTest
 * @package Ucf\Hierarchy\Tests\Model
 * @covers \Ucf\Hierarchy\Model\PathEnumeration
 * @covers \Ucf\Hierarchy\Model\AbstractHierarchy
 */
class PathEnumerationTest extends PHPUnit_Framework_TestCase
{
    public function testValidatesData()
    {
        $adjacencyList = new PathEnumeration();

        $badData = ['bad_data' => 888];

        $result = $adjacencyList->validate($badData);
        $this->assertFalse($result);

        $this->setExpectedException('InvalidArgumentException');
        $adjacencyList->setData([$badData]);
    }

    public function testChecksIfItemExists()
    {
        $adjacencyList = new PathEnumeration();

        $this->setExpectedException('InvalidArgumentException');

        $adjacencyList->getItem(1);
    }

    public function testGetItem()
    {
        $item = [
            PathEnumeration::ID => 1,
            PathEnumeration::GENEALOGY => null,
            PathEnumeration::SORT_ID => '001'
        ];

        $adjacencyList = new PathEnumeration([$item]);

        $sameItem = $adjacencyList->getItem(1);

        $this->assertEquals($item, $sameItem);
    }
}
