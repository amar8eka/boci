<?php

namespace Boci\HetznerLaravel\Requests\ServerActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Change Server Reverse DNS Request
 *
 * This request class is used to change the reverse DNS settings of a server
 * in the Hetzner Cloud API.
 */
final class ChangeReverseDnsRequest extends Request
{
    /**
     * Create a new change server reverse DNS request instance.
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The reverse DNS settings to change
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
        return "/v1/servers/{$this->serverId}/actions/change_dns_ptr";
    }
}
