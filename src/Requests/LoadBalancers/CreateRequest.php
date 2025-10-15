<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancers;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Create Load Balancer Request
 *
 * This request class is used to create a new load balancer
 * in the Hetzner Cloud API.
 */
final class CreateRequest implements RequestContract
{
    /**
     * Create a new create load balancer request instance.
     *
     * @param  array<string, mixed>  $parameters  The load balancer creation parameters
     */
    public function __construct(
        private readonly array $parameters
    ) {}

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
        return '/v1/load_balancers';
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
