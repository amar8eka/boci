<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Unassign Floating IP Request
 *
 * This request class is used to unassign a floating IP from a server
 * in the Hetzner Cloud API.
 */
final class UnassignRequest extends Request
{
    /**
     * Create a new unassign floating IP request instance.
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  array<string, mixed>  $parameters  Optional additional parameters
     */
    public function __construct(
        private readonly string $floatingIpId,
        array $parameters = []
    ) {
        parent::__construct($parameters);
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
        return "/v1/floating_ips/{$this->floatingIpId}/actions/unassign";
    }
}
