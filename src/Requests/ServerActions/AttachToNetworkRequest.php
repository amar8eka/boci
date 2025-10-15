<?php

namespace Boci\HetznerLaravel\Requests\ServerActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Attach Server to Network Request
 *
 * This request class is used to attach a server to a network
 * in the Hetzner Cloud API.
 */
final class AttachToNetworkRequest extends Request
{
    /**
     * Create a new attach server to network request instance.
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The network attachment parameters
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
        return "/v1/servers/{$this->serverId}/actions/attach_to_network";
    }
}
