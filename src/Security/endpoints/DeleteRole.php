<?php


namespace XPack\Security\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class DeleteRole
 *
 * @category Endpoints
 * @package  XPack\Security\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class DeleteRole extends AbstractEndpoint
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
        if (isset($this->name) !== true) {
            throw new Exceptions\RuntimeException(
                'name is required for ClearCachedRoles'
            );
        }
        return "/_xpack/security/role/{$this->name}";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'refresh'
        ];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return "DELETE";
    }
}