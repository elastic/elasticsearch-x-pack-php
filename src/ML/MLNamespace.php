<?php

namespace XPack\ML;

use Elasticsearch\Namespaces\AbstractNamespace;
use XPack\ML\namespaces\DatafeedNamespace;
use XPack\ML\namespaces\DataNamespace;
use XPack\ML\namespaces\FilterNamespace;
use XPack\ML\namespaces\JobNamespace;
use XPack\ML\namespaces\ModelNamespace;

/**
 * Class MLNamespace
 *
 * @category ML
 * @package  XPack\ML\MLNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MLNamespace extends AbstractNamespace
{
    protected $dataNamespace;
    protected $datafeedNamespace;
    protected $filterNamespace;
    protected $jobNamespace;
    protected $modelNamespace;

    public function __construct(\Elasticsearch\Transport $transport, $endpoints)
    {
        parent::__construct($transport, $endpoints);
        $this->dataNamespace = new DataNamespace($transport, $endpoints);
        $this->datafeedNamespace = new DatafeedNamespace($transport, $endpoints);
        $this->filterNamespace = new FilterNamespace($transport, $endpoints);
        $this->jobNamespace = new JobNamespace($transport, $endpoints);
        $this->modelNamespace = new ModelNamespace($transport, $endpoints);
    }


    /**
     * @return DataNamespace
     */
    public function data()
    {
        return $this->dataNamespace;
    }

    /**
     * @return DatafeedNamespace
     */
    public function datafeed()
    {
        return $this->datafeedNamespace;
    }

    /**
     * @return FilterNamespace
     */
    public function filter()
    {
        return $this->filterNamespace;
    }

    /**
     * @return JobNamespace
     */
    public function job()
    {
        return $this->jobNamespace;
    }

    /**
     * @return ModelNamespace
     */
    public function model()
    {
        return $this->modelNamespace;
    }


}