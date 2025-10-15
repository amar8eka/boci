<?php

namespace Boci\HetznerLaravel\Requests\Servers;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Server Metrics Request
 *
 * This request class is used to retrieve server metrics
 * from the Hetzner Cloud API.
 */
final class MetricsRequest extends Request
{
    /**
     * Create a new server metrics request instance.
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  Optional query parameters for metrics filtering
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
        return "/v1/servers/{$this->serverId}/metrics";
    }

    /**
     * Get the request options for the HTTP client.
     *
     * @return array<string, mixed>
     */
    public function options(): array
    {
        return [
            'query' => $this->parameters,
        ];
    }
}
