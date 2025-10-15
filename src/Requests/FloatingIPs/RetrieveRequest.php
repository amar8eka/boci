<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPs;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve Floating IP Request
 *
 * This request class is used to retrieve a specific floating IP by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve floating IP request instance.
     *
     * @param  string  $floatingIpId  The ID of the floating IP to retrieve
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
        return 'GET';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/floating_ips/{$this->floatingIpId}";
    }
}
