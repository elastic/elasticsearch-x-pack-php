<?php

namespace XPack\ML;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class JobNamespace
 *
 * @category ML
 * @package  XPack\ML\JobNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class JobNamespace extends AbstractNamespace
{

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function close($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $endpoint = new Endpoints\Job\Close();
        $endpoint->setJobId($id)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function delete($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $endpoint = new Endpoints\Job\Delete();
        $endpoint->setJobId($id)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function flush($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Job\Flush();
        $endpoint->setJobId($id)->setBody($body)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function get($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $endpoint = new Endpoints\Job\Get();
        $endpoint->setJobId($id)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getBuckets($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');
        $timestamp = $this->extractArgument($params, 'timestamp');
        $endpoint = new Endpoints\Job\GetBuckets();
        $endpoint->setJobId($id)
            ->setBody($body)
            ->setTimestamp($timestamp)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getCategories($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');
        $category_id = $this->extractArgument($params, 'category_id');
        $endpoint = new Endpoints\Job\GetCategories();
        $endpoint->setJobId($id)
            ->setBody($body)
            ->setCategoryId($category_id)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getInfluencers($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Job\GetInfluencers();
        $endpoint->setJobId($id)
            ->setBody($body)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getJobs($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Job\GetJobs();
        $endpoint->setJobId($id)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getRecords($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Job\GetRecords();
        $endpoint->setJobId($id)
            ->setBody($body)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function open($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $ignore = $this->extractArgument($params, 'ignore_downtime');
        $timeout = $this->extractArgument($params, 'timeout');
        $endpoint = new Endpoints\Job\Open();
        $endpoint->setJobId($id)
            ->setIgnoreDowntime($ignore)
            ->setTimeout($timeout)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function put($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Job\Put();
        $endpoint->setJobId($id)
            ->setBody($body)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function update($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Job\Update();
        $endpoint->setJobId($id)
            ->setBody($body)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function validateDetector($params)
    {
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Job\ValidateDetector();
        $endpoint->setBody($body)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function validateJob($params)
    {
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Job\ValidateJob();
        $endpoint->setBody($body)
            ->setParams($params);
        return $this->performRequest($endpoint);
    }

}