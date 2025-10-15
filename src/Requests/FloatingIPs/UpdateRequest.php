<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPs;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Update Floating IP Request
 *
 * This request class is used to update a floating IP's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest extends Request
{
    /**
     * Create a new update floating IP request instance.
     *
     * @param  string  $floatingIpId  The ID of the floating IP to update
     * @param  array<string, mixed>  $parameters  The update parameters
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
        return 'PUT';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/floating_ips/{$this->floatingIpId}";
    }
}
