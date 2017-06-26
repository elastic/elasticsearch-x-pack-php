<?php

namespace XPack\ML;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class ModelNamespace
 *
 * @category ML
 * @package  XPack\ML\ModelNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ModelNamespace extends AbstractNamespace
{

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function delete($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $snapshotId = $this->extractArgument($params, 'snapshot_id');
        $endpoint = new Endpoints\Model\Delete();
        $endpoint->setJobId($id)->setSnapshotId($snapshotId)->setParams($params);
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
        $snapshotId = $this->extractArgument($params, 'snapshot_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Model\Get();
        $endpoint->setJobId($id)->setSnapshotId($snapshotId)->setBody($body)->setParams($params);
        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function revert($params)
    {
        $id = $this->extractArgument($params, 'job_id');
        $snapshotId = $this->extractArgument($params, 'snapshot_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Model\Revert();
        $endpoint->setJobId($id)->setSnapshotId($snapshotId)->setBody($body)->setParams($params);
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
        $snapshotId = $this->extractArgument($params, 'snapshot_id');
        $body = $this->extractArgument($params, 'body');
        $endpoint = new Endpoints\Model\Update();
        $endpoint->setJobId($id)->setSnapshotId($snapshotId)->setBody($body)->setParams($params);
        return $this->performRequest($endpoint);
    }


}