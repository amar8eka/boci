<?php

namespace Boci\HetznerLaravel\Requests\NetworkActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Get Network Action Request
 *
 * This request class is used to retrieve a specific action for a network
 * from the Hetzner Cloud API.
 */
final class GetActionRequest extends Request
{
    /**
     * Create a new get network action request instance.
     *
     * @param  string  $networkId  The ID of the network
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function __construct(string $networkId, string $actionId)
    {
        parent::__construct([
            'network_id' => $networkId,
            'action_id' => $actionId,
        ]);
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
        return 'networks/'.$this->parameters['network_id'].'/actions/'.$this->parameters['action_id'];
    }
}
