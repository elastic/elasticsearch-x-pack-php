<?php
use Elasticsearch\ClientBuilder;
use XPack\XPack;

/**
 * Class SimpleTests
 * @category   Tests
 * @package    XPack\Graph
 * @subpackage Tests
 * @author     Zachary Tong <zach@elastic.co>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elastic.co
 */
class SimpleGraphTests extends \PHPUnit_Framework_TestCase
{
    public function testSetup()
    {
        $client = ClientBuilder::create()
            ->registerNamespace(XPack::Graph())
            ->build();

        /** @var \XPack\Graph\GraphNamespace $graphNamespace */
        $graphNamespace = $client->graph();
        $this->assertTrue(method_exists($graphNamespace, 'explore'));
    }
}