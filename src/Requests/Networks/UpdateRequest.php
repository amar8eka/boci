<?php

namespace Boci\HetznerLaravel\Requests\Networks;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Update Network Request
 *
 * This request class is used to update a network's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest extends Request
{
    /**
     * Create a new update network request instance.
     *
     * @param  string  $networkId  The ID of the network to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function __construct(string $networkId, array $parameters)
    {
        parent::__construct(array_merge(['network_id' => $networkId], $parameters));
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
        return '/v1/networks/'.$this->parameters['network_id'];
    }
}
