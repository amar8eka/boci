<?php

namespace Boci\HetznerLaravel\Requests\FirewallActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Get Firewall Action Request
 *
 * This request class is used to retrieve a specific firewall action by its ID
 * from the Hetzner Cloud API.
 */
final class GetActionRequest extends Request
{
    /**
     * Create a new get firewall action request instance.
     *
     * @param  string  $firewallId  The ID of the firewall
     * @param  string  $actionId  The ID of the action to retrieve
     * @param  array<string, mixed>  $parameters  Optional additional parameters
     */
    public function __construct(
        private readonly string $firewallId,
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
        return "/v1/firewalls/{$this->firewallId}/actions/{$this->actionId}";
    }
}
