<?php

namespace Boci\HetznerLaravel\Requests\Networks;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Delete Network Request
 *
 * This request class is used to delete a network
 * from the Hetzner Cloud API.
 */
final class DeleteRequest extends Request
{
    /**
     * Create a new delete network request instance.
     *
     * @param  string  $networkId  The ID of the network to delete
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
        return 'DELETE';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return 'networks/'.$this->parameters['network_id'];
    }
}
