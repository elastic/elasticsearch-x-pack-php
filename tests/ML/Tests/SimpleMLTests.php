<?php
use Elasticsearch\ClientBuilder;
use XPack\XPack;

/**
 * Class SimpleMLTests
 * @category   Tests
 * @package    XPack\ML
 * @subpackage Tests
 * @author     Zachary Tong <zach@elastic.co>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elastic.co
 */
class SimpleMLTests extends \PHPUnit_Framework_TestCase
{
    public function testSetup()
    {
        $client = ClientBuilder::create()
            ->registerNamespace(XPack::Graph())
            ->build();

        /** @var \XPack\ML\MLNamespace $mlNamespace */
        $mlNamespace = $client->ml();
        $this->assertTrue(method_exists($mlNamespace, 'datafeed'));

        /** @var \XPack\ML\DatafeedNamespace $datafeedNamespace */
        $datafeedNamespace = $mlNamespace->datafeed();
        $this->assertTrue(method_exists($datafeedNamespace, 'getDatafeeds'));
    }
}