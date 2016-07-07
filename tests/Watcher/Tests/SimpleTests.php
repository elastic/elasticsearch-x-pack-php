<?php
use Elasticsearch\ClientBuilder;
use XPack\XPack;

/**
SimpleTests *
 * @category   Tests
 * @package    XPack\Watcher
 * @subpackage Tests
 * @author     Zachary Tong <zach@elastic.co>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elastic.co
 */
class SimpleTests extends \PHPUnit_Framework_TestCase
{
    public function testSetup()
    {
        $client = ClientBuilder::create()
            ->registerNamespace(XPack::Watcher())
            ->build();

        /** @var \XPack\Watcher\WatcherNamespace $watcherNamespace */
        $watcherNamespace = $client->watcher();
        $this->assertTrue(method_exists($watcherNamespace, 'info'));
    }
}