<?php

namespace Boci\HetznerLaravel\Requests\FloatingIPActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * List Floating IP Actions Request
 *
 * This request class is used to retrieve a list of floating IP actions
 * from the Hetzner Cloud API with optional filtering parameters.
 */
final class ListActionsRequest extends Request
{
    /**
     * Create a new list floating IP actions request instance.
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
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
        return "/v1/floating_ips/{$this->floatingIpId}/actions";
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
