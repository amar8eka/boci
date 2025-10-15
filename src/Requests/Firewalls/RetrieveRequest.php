<?php

namespace Boci\HetznerLaravel\Requests\Firewalls;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve Firewall Request
 *
 * This request class is used to retrieve a specific firewall by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve firewall request instance.
     *
     * @param  string  $firewallId  The ID of the firewall to retrieve
     * @param  array<string, mixed>  $parameters  Optional additional parameters
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
        return 'GET';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/firewalls/{$this->firewallId}";
    }
}
