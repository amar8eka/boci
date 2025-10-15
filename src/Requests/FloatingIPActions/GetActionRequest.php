<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Get Floating IP Action Request
 *
 * This request class is used to retrieve a specific floating IP action by its ID
 * from the Hetzner Cloud API.
 */
final class GetActionRequest extends Request
{
    /**
     * Create a new get floating IP action request instance.
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  string  $actionId  The ID of the action to retrieve
     * @param  array<string, mixed>  $parameters  Optional additional parameters
     */
    public function __construct(
        private readonly string $floatingIpId,
        private readonly string $actionId,
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
        return "/v1/floating_ips/{$this->floatingIpId}/actions/{$this->actionId}";
    }
}
