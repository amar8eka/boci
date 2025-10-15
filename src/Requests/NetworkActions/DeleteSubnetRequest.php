<?php

namespace Boci\HetznerLaravel\Requests\NetworkActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Delete Network Subnet Request
 *
 * This request class is used to delete a subnet from a network
 * in the Hetzner Cloud API.
 */
final class DeleteSubnetRequest extends Request
{
    /**
     * Create a new delete network subnet request instance.
     *
     * @param  string  $networkId  The ID of the network
     * @param  string  $subnetId  The ID of the subnet to delete
     */
    public function __construct(string $networkId, string $subnetId)
    {
        parent::__construct([
            'network_id' => $networkId,
            'subnet_id' => $subnetId,
        ]);
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
        return 'networks/'.$this->parameters['network_id'].'/actions/delete_subnet';
    }
}
