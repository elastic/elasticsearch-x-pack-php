<?php
namespace XPack;
use XPack\Graph\GraphNamespaceBuilder;
use XPack\Watcher\WatcherNamespaceBuilder;

/**
 * Class XPack
 *
 * @category XPack
 * @package  XPack\Watcher\WatcherNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastics.co
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
}