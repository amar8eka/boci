<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancerTypes;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Retrieve Load Balancer Type Request
 *
 * This request class is used to retrieve a specific load balancer type by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest implements RequestContract
{
    /**
     * Create a new retrieve load balancer type request instance.
     *
     * @param  string  $loadBalancerTypeId  The ID of the load balancer type to retrieve
     */
    public function __construct(
        private readonly string $loadBalancerTypeId
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
        return "/v1/load_balancer_types/{$this->loadBalancerTypeId}";
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
