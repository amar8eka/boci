<?php

namespace Boci\HetznerLaravel\Requests\FirewallActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Apply Firewall to Resources Request
 *
 * This request class is used to apply a firewall to specific resources
 * in the Hetzner Cloud API.
 */
final class ApplyToResourcesRequest extends Request
{
    /**
     * Create a new apply firewall to resources request instance.
     *
     * @param  string  $firewallId  The ID of the firewall
     * @param  array<string, mixed>  $parameters  The resources to apply the firewall to
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
        return 'POST';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/firewalls/{$this->firewallId}/actions/apply_to_resources";
    }
}
