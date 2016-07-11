<?php
use Elasticsearch\ClientBuilder;
use XPack\XPack;

/**
 * Class SimpleSecurityTests
 * @category   Tests
 * @package    XPack\Security
 * @subpackage Tests
 * @author     Zachary Tong <zach@elastic.co>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elastic.co
 */
class SimpleSecurityTests extends \PHPUnit_Framework_TestCase
{
    public function testSetup()
    {
        $client = ClientBuilder::create()
            ->registerNamespace(XPack::Security())
            ->build();

        /** @var \XPack\Security\SecurityNamespace $securityNamespace */
        $securityNamespace = $client->security();
        $this->assertTrue(method_exists($securityNamespace, 'authenticate'));
    }
}