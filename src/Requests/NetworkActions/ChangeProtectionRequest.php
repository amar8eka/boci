<?php

namespace Boci\HetznerLaravel\Requests\NetworkActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Change Network Protection Request
 *
 * This request class is used to change the protection settings of a network
 * in the Hetzner Cloud API.
 */
final class ChangeProtectionRequest extends Request
{
    /**
     * Create a new change network protection request instance.
     *
     * @param  string  $networkId  The ID of the network
     * @param  array<string, mixed>  $parameters  The protection settings to change
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
        return '/v1/networks/'.$this->parameters['network_id'].'/actions/change_protection';
    }
}
