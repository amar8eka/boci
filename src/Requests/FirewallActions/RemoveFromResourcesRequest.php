<?php

namespace Boci\HetznerLaravel\Requests\FirewallActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Remove Firewall from Resources Request
 *
 * This request class is used to remove a firewall from specific resources
 * in the Hetzner Cloud API.
 */
final class RemoveFromResourcesRequest extends Request
{
    /**
     * Create a new remove firewall from resources request instance.
     *
     * @param  string  $firewallId  The ID of the firewall
     * @param  array<string, mixed>  $parameters  The resources to remove the firewall from
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
        return "/v1/firewalls/{$this->firewallId}/actions/remove_from_resources";
    }
}
