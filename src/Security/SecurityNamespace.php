<?php

namespace XPack\Security;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class SecurityNamespace
 *
 * @category Graph
 * @package  XPack\Securit\SecurityNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SecurityNamespace extends AbstractNamespace
{

    /**
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function authenticate($params)
    {
        $endpoint = new Endpoints\Authenticate();
        $endpoint->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['username']   = (string) The username of the user to change the password for
     *        ['refresh']    = (bool) Refresh the index after performing the operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function changePassword($params)
    {
        $username = $this->extractArgument($params, 'username');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\ChangePassword();
        $endpoint->setUsername($username)
            ->setBody($body)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['realms']    = (list) Comma-separated list of realms to clear
     *        ['usernames'] = (list) Comma-separated list of usernames to clear from the cache
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function clearCachedRealms($params)
    {
        $realms = $this->extractArgument($params, 'realms');

        $endpoint = new Endpoints\ClearCachedRealms();
        $endpoint->setRealms($realms)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['name']    = (string) Role name. (required)
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function clearCachedRoles($params)
    {
        $name = $this->extractArgument($params, 'name');

        $endpoint = new Endpoints\ClearCachedRoles();
        $endpoint->setName($name)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['name']    = (string) Role name. (required)
     *        ['refresh'] = (bool) Refresh the index after performing the operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function deleteRole($params)
    {
        $name = $this->extractArgument($params, 'name');

        $endpoint = new Endpoints\DeleteRole();
        $endpoint->setName($name)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['username']    = (string) Username. (required)
     *        ['refresh'] = (bool) Refresh the index after performing the operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function deleteUser($params)
    {
        $username = $this->extractArgument($params, 'username');

        $endpoint = new Endpoints\DeleteUser();
        $endpoint->setUsername($username)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['name']    = (string) Role name.
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function getRole($params)
    {
        $name = $this->extractArgument($params, 'name');

        $endpoint = new Endpoints\GetRole();
        $endpoint->setName($name)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['username']    = (string) Username.
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function getUser($params)
    {
        $username = $this->extractArgument($params, 'username');

        $endpoint = new Endpoints\GetUser();
        $endpoint->setUsername($username)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['name']    = (string) Role name. (required)
     *        ['refresh'] = (bool) Refresh the index after performing the operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function putRole($params)
    {
        $name = $this->extractArgument($params, 'name');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\PutRole();
        $endpoint->setName($name)
            ->setBody($body)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['username']    = (string) Username. (required)
     *        ['refresh'] = (bool) Refresh the index after performing the operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function putUser($params)
    {
        $username = $this->extractArgument($params, 'username');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\PutUser();
        $endpoint->setUsername($username)
            ->setBody($body)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }


}