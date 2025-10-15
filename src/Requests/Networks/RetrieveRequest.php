<?php

namespace Boci\HetznerLaravel\Requests\Networks;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve Network Request
 *
 * This request class is used to retrieve a specific network by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve network request instance.
     *
     * @param  string  $networkId  The ID of the network to retrieve
     */
    public function __construct(string $networkId)
    {
        parent::__construct(['network_id' => $networkId]);
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
        return 'networks/'.$this->parameters['network_id'];
    }
}
