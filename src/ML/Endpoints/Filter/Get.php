<?php

namespace XPack\ML\Endpoints\Filter;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package XPack\Graph\Endpoints\Xpack\Ml\Filters
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    // The ID of the filter to fetch
    private $filter_id;

    /**
     * @param $filter_id
     *
     * @return $this
     */
    public function setFilterId($filter_id)
    {
        if (isset($filter_id) !== true) {
            return $this;
        }
        $this->filter_id = $filter_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $filter_id = $this->filter_id;
        $uri = "/_xpack/ml/filters/";
        if (isset($filter_id) === true) {
            $uri = "/_xpack/ml/filters/$filter_id";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'from',
            'size',
        );
    }


    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}