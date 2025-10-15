<?php

namespace Boci\HetznerLaravel\Requests\Firewalls;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Delete Firewall Request
 *
 * This request class is used to delete a firewall
 * from the Hetzner Cloud API.
 */
final class DeleteRequest extends Request
{
    /**
     * Create a new delete firewall request instance.
     *
     * @param  string  $firewallId  The ID of the firewall to delete
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
        return 'DELETE';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/firewalls/{$this->firewallId}";
    }
}
