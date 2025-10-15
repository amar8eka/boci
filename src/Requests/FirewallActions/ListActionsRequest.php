<?php

namespace Boci\HetznerLaravel\Requests\FirewallActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * List Firewall Actions Request
 *
 * This request class is used to retrieve a list of firewall actions
 * from the Hetzner Cloud API with optional filtering parameters.
 */
final class ListActionsRequest extends Request
{
    /**
     * Create a new list firewall actions request instance.
     *
     * @param  string  $firewallId  The ID of the firewall
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
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
        return 'GET';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/firewalls/{$this->firewallId}/actions";
    }

    /**
     * Get the request options for the HTTP client.
     *
     * @return array<string, mixed>
     */
    public function options(): array
    {
        return [
            'query' => $this->parameters,
        ];
    }
}
