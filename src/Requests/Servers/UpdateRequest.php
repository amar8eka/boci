<?php

namespace Boci\HetznerLaravel\Requests\Servers;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Update Server Request
 *
 * This request class is used to update a server's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest extends Request
{
    /**
     * Create a new update server request instance.
     *
     * @param  string  $serverId  The ID of the server to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function __construct(string $serverId, array $parameters)
    {
        parent::__construct(array_merge(['server_id' => $serverId], $parameters));
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'PUT';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return '/v1/servers/'.$this->parameters['server_id'];
    }
}
