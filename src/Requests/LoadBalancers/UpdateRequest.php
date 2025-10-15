<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancers;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Update Load Balancer Request
 *
 * This request class is used to update a load balancer's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest implements RequestContract
{
    /**
     * Create a new update load balancer request instance.
     *
     * @param  string  $loadBalancerId  The ID of the load balancer to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function __construct(
        private readonly string $loadBalancerId,
        private readonly array $parameters
    ) {}

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'PUT';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/load_balancers/{$this->loadBalancerId}";
    }

    /**
     * Get the request options for the HTTP client.
     *
     * @return array<string, mixed>
     */
    public function options(): array
    {
        return [
            'json' => $this->parameters,
        ];
    }
}
