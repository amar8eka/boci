<?php

namespace Boci\HetznerLaravel\Requests\NetworkActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Delete Network Route Request
 *
 * This request class is used to delete a route from a network
 * in the Hetzner Cloud API.
 */
final class DeleteRouteRequest extends Request
{
    /**
     * Create a new delete network route request instance.
     *
     * @param  string  $networkId  The ID of the network
     * @param  string  $routeId  The ID of the route to delete
     */
    public function __construct(string $networkId, string $routeId)
    {
        parent::__construct([
            'network_id' => $networkId,
            'route_id' => $routeId,
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
        return 'networks/'.$this->parameters['network_id'].'/actions/delete_route';
    }
}
