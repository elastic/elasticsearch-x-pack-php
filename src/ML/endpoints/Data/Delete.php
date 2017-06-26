<?php

namespace XPack\ML\Endpoints\Data;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Delete
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Data
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Delete extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $uri = "/_xpack/ml/_delete_expired_data";

        return $uri;
    }


    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array();
    }


    /**
     * @return string
     */
    public function getMethod()
    {
        return 'DELETE';
    }
}