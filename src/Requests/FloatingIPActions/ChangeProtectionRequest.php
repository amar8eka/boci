<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Change Floating IP Protection Request
 *
 * This request class is used to change the protection settings of a floating IP
 * in the Hetzner Cloud API.
 */
final class ChangeProtectionRequest extends Request
{
    /**
     * Create a new change floating IP protection request instance.
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  array<string, mixed>  $parameters  The protection settings to change
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
        return "/v1/floating_ips/{$this->floatingIpId}/actions/change_protection";
    }
}
