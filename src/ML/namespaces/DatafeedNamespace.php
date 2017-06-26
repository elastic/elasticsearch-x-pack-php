<?php

namespace XPack\ML;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class DatafeedNamespace
 *
 * @category ML
 * @package  XPack\ML\DatafeedNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DatafeedNamespace extends AbstractNamespace
{

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function delete($params)
    {
        $id = $this->extractArgument($params, 'datafeed_id');
        $endpoint = new Endpoints\Datafeed\Delete();
        $endpoint->setDatafeedId($id)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function get($params)
    {
        $id = $this->extractArgument($params, 'datafeed_id');
        $endpoint = new Endpoints\Datafeed\Get();
        $endpoint->setDatafeedId($id)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getDatafeeds($params)
    {
        $id = $this->extractArgument($params, 'datafeed_id');
        $endpoint = new Endpoints\Datafeed\GetDatafeeds();
        $endpoint->setDatafeedId($id)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function preview($params)
    {
        $id = $this->extractArgument($params, 'datafeed_id');
        $endpoint = new Endpoints\Datafeed\Preview();
        $endpoint->setDatafeedId($id)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function put($params)
    {
        $id = $this->extractArgument($params, 'datafeed_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Datafeed\Put();
        $endpoint->setDatafeedId($id)->setBody($body)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function start($params)
    {
        $id = $this->extractArgument($params, 'datafeed_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Datafeed\Start();
        $endpoint->setDatafeedId($id)->setBody($body)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function stop($params)
    {
        $id = $this->extractArgument($params, 'datafeed_id');
        $endpoint = new Endpoints\Datafeed\Stop();
        $endpoint->setDatafeedId($id)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function update($params)
    {
        $id = $this->extractArgument($params, 'datafeed_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Datafeed\Update();
        $endpoint->setDatafeedId($id)->setBody($body)->setParams($params);
        return $this->performRequest($endpoint);
    }


}