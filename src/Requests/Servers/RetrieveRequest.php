<?php

namespace Boci\HetznerLaravel\Requests\Servers;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve Server Request
 *
 * This request class is used to retrieve a specific server by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve server request instance.
     *
     * @param  string  $serverId  The ID of the server to retrieve
     * @param  array<string, mixed>  $parameters  Optional additional parameters
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
        return 'GET';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/servers/{$this->serverId}";
    }

    /**
     * Get the request options for the HTTP client.
     *
     * @return array<string, mixed>
     */
    public function options(): array
    {
        return [];
    }
}
