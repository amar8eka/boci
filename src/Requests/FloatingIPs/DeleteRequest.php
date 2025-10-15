<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPs;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Delete Floating IP Request
 *
 * This request class is used to delete a floating IP
 * from the Hetzner Cloud API.
 */
final class DeleteRequest extends Request
{
    /**
     * Create a new delete floating IP request instance.
     *
     * @param  string  $floatingIpId  The ID of the floating IP to delete
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
        return 'DELETE';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/floating_ips/{$this->floatingIpId}";
    }
}
