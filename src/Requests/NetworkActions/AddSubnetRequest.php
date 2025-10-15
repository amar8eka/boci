<?php

namespace Boci\HetznerLaravel\Requests\NetworkActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Add Network Subnet Request
 *
 * This request class is used to add a subnet to a network
 * in the Hetzner Cloud API.
 */
final class AddSubnetRequest extends Request
{
    /**
     * Create a new add network subnet request instance.
     *
     * @param  string  $networkId  The ID of the network
     * @param  array<string, mixed>  $parameters  The subnet parameters
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
        return 'POST';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return 'networks/'.$this->parameters['network_id'].'/actions/add_subnet';
    }
}
