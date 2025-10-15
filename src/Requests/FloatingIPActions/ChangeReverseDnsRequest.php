<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Change Floating IP Reverse DNS Request
 *
 * This request class is used to change the reverse DNS settings of a floating IP
 * in the Hetzner Cloud API.
 */
final class ChangeReverseDnsRequest extends Request
{
    /**
     * Create a new change floating IP reverse DNS request instance.
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  array<string, mixed>  $parameters  The reverse DNS settings to change
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
        return "/v1/floating_ips/{$this->floatingIpId}/actions/change_reverse_dns";
    }
}
