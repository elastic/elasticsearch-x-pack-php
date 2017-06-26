<?php

namespace XPack\ML;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class FilterNamespace
 *
 * @category ML
 * @package  XPack\ML\FilterNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class FilterNamespace extends AbstractNamespace
{

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function delete($params)
    {
        $id = $this->extractArgument($params, 'filter_id');
        $endpoint = new Endpoints\Filter\Delete();
        $endpoint->setFilterId($id)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function get($params)
    {
        $id = $this->extractArgument($params, 'filter_id');
        $endpoint = new Endpoints\Filter\Delete();
        $endpoint->setFilterId($id)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function update($params)
    {
        $id = $this->extractArgument($params, 'filter_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Filter\Put();
        $endpoint->setFilterId($id)->setBody($body)->setParams($params);
        return $this->performRequest($endpoint);
    }


}