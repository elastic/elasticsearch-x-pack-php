<?php
namespace XPack;
use XPack\Graph\GraphNamespaceBuilder;
use XPack\License\LicenseNamespaceBuilder;
use XPack\Monitoring\MonitoringNamespaceBuilder;
use XPack\Security\SecurityNamespaceBuilder;
use XPack\Watcher\WatcherNamespaceBuilder;

/**
 * Class XPack
 *
 * @category XPack
 * @package  XPack\Watcher\WatcherNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class XPack
{
    /**
     * @return WatcherNamespaceBuilder
     */
    public static function Watcher()
    {
        return new WatcherNamespaceBuilder();
    }

    /**
     * @return GraphNamespaceBuilder
     */
    public static function Graph()
    {
        return new GraphNamespaceBuilder();
    }

    /**
     * @return LicenseNamespaceBuilder
     */
    public static function License()
    {
        return new LicenseNamespaceBuilder();
    }

    /**
     * @return MonitoringNamespaceBuilder
     */
    public static function Monitoring()
    {
        return new MonitoringNamespaceBuilder();
    }

    /**
     * @return SecurityNamespaceBuilder
     */
    public static function Security()
    {
        return new SecurityNamespaceBuilder();
    }
}