<?php

namespace XPack\Graph;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class GraphNamespace
 *
 * @category Graph
 * @package  XPack\Graph\GraphNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GraphNamespace extends AbstractNamespace
{

    /**
     * $params['index']   = (string) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices (Required)
     *        ['type']    = (string) A comma-separated list of document types to search; leave empty to perform the operation on all types
     *        ['routing'] = (string) Specific routing value
     *        ['timeout'] = (time) Explicit operation timeout
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function explore($params)
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\Explore();
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }


}