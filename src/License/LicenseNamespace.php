<?php

namespace XPack\License;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class LicenseNamespace
 *
 * @category License
 * @package  XPack\License\LicenseNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class LicenseNamespace extends AbstractNamespace
{

    /**
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function delete($params)
    {
        $endpoint = new Endpoints\Delete();
        $endpoint->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['local'] = (bool) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function get($params)
    {
        $endpoint = new Endpoints\Get();
        $endpoint->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['acknowledge']   = (bool) whether the user has acknowledged acknowledge messages (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function post($params)
    {
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\Post();
        $endpoint->setBody($body)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }


}