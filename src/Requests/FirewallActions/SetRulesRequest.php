<?php

namespace Boci\HetznerLaravel\Requests\FirewallActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Set Firewall Rules Request
 *
 * This request class is used to set firewall rules
 * in the Hetzner Cloud API.
 */
final class SetRulesRequest extends Request
{
    /**
     * Create a new set firewall rules request instance.
     *
     * @param  string  $firewallId  The ID of the firewall
     * @param  array<string, mixed>  $parameters  The firewall rules to set
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
        return "/v1/firewalls/{$this->firewallId}/actions/set_rules";
    }
}
