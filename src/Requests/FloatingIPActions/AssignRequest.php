<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Assign Floating IP Request
 *
 * This request class is used to assign a floating IP to a server
 * in the Hetzner Cloud API.
 */
final class AssignRequest extends Request
{
    /**
     * Create a new assign floating IP request instance.
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  array<string, mixed>  $parameters  The assignment parameters
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
        return "/v1/floating_ips/{$this->floatingIpId}/actions/assign";
    }
}
