<?php

namespace Boci\HetznerLaravel\Requests\Firewalls;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Update Firewall Request
 *
 * This request class is used to update a firewall's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest extends Request
{
    /**
     * Create a new update firewall request instance.
     *
     * @param  string  $firewallId  The ID of the firewall to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function __construct(
        private readonly string $firewallId,
        array $parameters = []
    ) {
        parent::__construct($parameters);
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
        return "/v1/firewalls/{$this->firewallId}";
    }
}
