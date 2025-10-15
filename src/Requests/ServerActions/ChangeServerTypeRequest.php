<?php

namespace Boci\HetznerLaravel\Requests\ServerActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Change Server Type Request
 *
 * This request class is used to change the type of a server
 * in the Hetzner Cloud API.
 */
final class ChangeServerTypeRequest extends Request
{
    /**
     * Create a new change server type request instance.
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The server type change parameters
     */
    public function __construct(
        private readonly string $serverId,
        array $parameters = [],
    ) {
        parent::__construct($parameters);
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'POST';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/servers/{$this->serverId}/actions/change_type";
    }
}
