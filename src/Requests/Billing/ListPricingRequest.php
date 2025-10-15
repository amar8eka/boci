<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\Billing;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * List Pricing Request
 *
 * This request class is used to retrieve pricing information
 * from the Hetzner Cloud API.
 */
final class ListPricingRequest implements RequestContract
{
    /**
     * Create a new list pricing request instance.
     *
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
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
        return '/v1/pricing';
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
