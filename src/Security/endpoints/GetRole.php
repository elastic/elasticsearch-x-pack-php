<?php


namespace XPack\Security\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class GetRole
 *
 * @category Endpoints
 * @package  XPack\Security\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class GetRole extends AbstractEndpoint
{
    /** @var  string */
    protected $name;

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        if (isset($name) !== true) {
            return $this;
        }
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        if (isset($this->username) === true) {
            return "/_xpack/security/role/{$this->name}";
        }
        return "/_xpack/security/role";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return "GET";
    }
}