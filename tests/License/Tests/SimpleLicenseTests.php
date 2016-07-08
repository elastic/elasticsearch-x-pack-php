<?php
use Elasticsearch\ClientBuilder;
use XPack\XPack;

/**
 * Class SimpleLicenseTests
 * @category   Tests
 * @package    XPack\License
 * @subpackage Tests
 * @author     Zachary Tong <zach@elastic.co>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elastic.co
 */
class SimpleLicenseTests extends \PHPUnit_Framework_TestCase
{
    public function testSetup()
    {
        $client = ClientBuilder::create()
            ->registerNamespace(XPack::License())
            ->build();

        /** @var \XPack\License\LicenseNamespace $licenseNamespace */
        $licenseNamespace = $client->license();
        $this->assertTrue(method_exists($licenseNamespace, 'get'));
    }
}