<?php

namespace XPack\Watcher;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class WatcherNamespace
 *
 * @category Watcher
 * @package  XPack\Watcher\WatcherNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class WatcherNamespace extends AbstractNamespace
{

    /**
     * $params['id']             = (string) Watch ID (Required)
     *        ['master_timeout'] = (numeric)Specify timeout for watch write operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function ackWatch($params)
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new Endpoints\AckWatch();
        $endpoint->setId($id)->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']             = (string) Watch ID (Required)
     *        ['master_timeout'] = (numeric)Specify timeout for watch write operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function activateWatch($params)
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new Endpoints\ActivateWatch();
        $endpoint->setId($id)->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']             = (string) Watch ID (Required)
     *        ['master_timeout'] = (numeric)Specify timeout for watch write operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function deactivateWatch($params)
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new Endpoints\DeactivateWatch();
        $endpoint->setId($id)->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']             = (string) Watch ID (Required)
     *        ['master_timeout'] = (numeric)Specify timeout for watch write operation
     *        ['force']          = (bool) Specify if this request should be forced and ignore locks
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function deleteWatch($params)
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new Endpoints\DeleteWatch();
        $endpoint->setId($id)->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }


    /**
     * $params['id'] = (string) Watch ID (Required)
     * $params['body' = (hash) Execution control
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function executeWatch($params)
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\ExecuteWatch();
        $endpoint->setId($id)->setbody($body)->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }


    /**
     * $params['id'] = (string) Watch ID (Required)
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function getWatch($params)
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new Endpoints\GetWatch();
        $endpoint->setId($id)->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']             = (string) Watch ID (Required)
     *        ['body']           = (hash) The watch
     *        ['master_timeout'] = (numeric)Specify timeout for watch write operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function putWatch($params)
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\PutWatch();
        $endpoint->setId($id)->setbody($body)->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }


    /**
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function restart($params)
    {
        $endpoint = new Endpoints\Restart();
        $endpoint->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }


    /**
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function start($params)
    {
        $endpoint = new Endpoints\Start();
        $endpoint->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }


    /**
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function stats($params)
    {
        $endpoint = new Endpoints\Stats();
        $endpoint->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }


    /**
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function stop($params)
    {
        $endpoint = new Endpoints\Stop();
        $endpoint->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }
}