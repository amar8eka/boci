<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancerTypes;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * List Load Balancer Types Request
 *
 * This request class is used to retrieve a list of load balancer types
 * from the Hetzner Cloud API with optional filtering parameters.
 */
final class ListRequest implements RequestContract
{
    /**
     * Create a new list load balancer types request instance.
     *
     * @param  array<string, mixed>  $parameters  Optional filtering parameters
     */
    public function __construct(
        private readonly array $parameters = []
    ) {}

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
        return '/v1/load_balancer_types';
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
