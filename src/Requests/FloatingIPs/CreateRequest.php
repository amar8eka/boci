<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPs;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Create Floating IP Request
 *
 * This request class is used to create a new floating IP
 * in the Hetzner Cloud API.
 */
final class CreateRequest extends Request
{
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
        return '/v1/floating_ips';
    }
}
