<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPs;

use Boci\HetznerLaravel\Requests\Request;

/**
 * List Floating IPs Request
 *
 * This request class is used to retrieve a list of floating IPs
 * from the Hetzner Cloud API with optional filtering parameters.
 */
final class ListRequest extends Request
{
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
        return '/v1/floating_ips';
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
