<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancers;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Retrieve Load Balancer Request
 *
 * This request class is used to retrieve a specific load balancer by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest implements RequestContract
{
    /**
     * Create a new retrieve load balancer request instance.
     *
     * @param  string  $loadBalancerId  The ID of the load balancer to retrieve
     */
    public function __construct(
        private readonly string $loadBalancerId
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
        return "/v1/load_balancers/{$this->loadBalancerId}";
    }

    /**
     * Get the request options for the HTTP client.
     *
     * @return array<string, mixed>
     */
    public function options(): array
    {
        return [];
    }
}
