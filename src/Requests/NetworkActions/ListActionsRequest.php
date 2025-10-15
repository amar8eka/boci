<?php

namespace Boci\HetznerLaravel\Requests\NetworkActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * List Network Actions Request
 *
 * This request class is used to retrieve a list of actions for a specific network
 * from the Hetzner Cloud API with optional filtering parameters.
 */
final class ListActionsRequest extends Request
{
    /**
     * Create a new list network actions request instance.
     *
     * @param  string  $networkId  The ID of the network
     * @param  array<string, mixed>  $parameters  Optional filtering parameters
     */
    public function __construct(string $networkId, array $parameters = [])
    {
        parent::__construct(array_merge(['network_id' => $networkId], $parameters));
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
        return 'networks/'.$this->parameters['network_id'].'/actions';
    }
}
