<?php


namespace XPack\Watcher\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class DeleteWatch
 *
 * @category Watcher
 * @package  XPack\Watcher\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class DeleteWatch extends AbstractWatcherEndpoint
{
    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for DeleteWatch'
            );
        }

        $id = $this->id;
        return "/_xpack/watcher/watch/$id";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'master_timeout',
            'force'
        ];
    }


    /**
     * @return string
     */
    public function getMethod()
    {
        return "DELETE";
    }
}