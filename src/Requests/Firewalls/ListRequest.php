<?php

namespace Boci\HetznerLaravel\Requests\Firewalls;

use Boci\HetznerLaravel\Requests\Request;

/**
 * List Firewalls Request
 *
 * This request class is used to retrieve a list of firewalls
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
        return '/v1/firewalls';
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
