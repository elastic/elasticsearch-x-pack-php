<?php

namespace XPack\ML;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class DataNamespace
 *
 * @category ML
 * @package  XPack\ML\DataNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DataNamespace extends AbstractNamespace
{

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function delete($params)
    {
        $endpoint = new Endpoints\Data\Delete();
        $endpoint->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function post($params)
    {
        $jobid = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\Data\Post;
        $endpoint->setJobId($jobid)->setBody($body)->setParams($params);
        return $this->performRequest($endpoint);
    }


}