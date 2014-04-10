<?php

namespace Ucf\Hierarchy\Tests\Model;

use PHPUnit_Framework_TestCase;
use Ucf\Hierarchy\Model\AdjacencyList;

/**
 * Class AdjacencyListTest
 * @package Ucf\Hierarchy\Tests\Model
 * @covers \Ucf\Hierarchy\Model\AdjacencyList
 * @covers \Ucf\Hierarchy\Model\AbstractHierarchy
 */
class AdjacencyListTest extends PHPUnit_Framework_TestCase
{
    public function testValidatesData()
    {
        $adjacencyList = new AdjacencyList();

        $badData = ['bad_data' => 888];

        $result = $adjacencyList->validate($badData);
        $this->assertFalse($result);

        $this->setExpectedException('InvalidArgumentException');
        $adjacencyList->setData([$badData]);
    }

    public function testChecksIfItemExists()
    {
        $adjacencyList = new AdjacencyList();

        $this->setExpectedException('InvalidArgumentException');

        $adjacencyList->getItem(1);
    }

    public function testGetItem()
    {
        $item = [
            AdjacencyList::ID => 1,
            AdjacencyList::PARENT_ID => null,
            AdjacencyList::SORT_VALUE => 1
        ];

        $adjacencyList = new AdjacencyList([$item]);

        $sameItem = $adjacencyList->getItem(1);

        $this->assertEquals($item, $sameItem);
    }
}
