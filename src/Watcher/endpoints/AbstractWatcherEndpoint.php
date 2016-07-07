<?php

namespace XPack\Watcher\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractWatcherEndpoint
 *
 * @category Watcher
 * @package  XPack\Watcher\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

abstract class AbstractWatcherEndpoint extends AbstractEndpoint {

    protected $id;

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        if (isset($id) !== true) {
            return $this;
        }

        $this->id = $id;
        return $this;
    }
}