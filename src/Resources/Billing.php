<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\Billing\ListPricingRequest;
use Boci\HetznerLaravel\Responses\Billing\ListPricingResponse;
use GuzzleHttp\ClientInterface;

/**
 * Billing Resource
 *
 * This resource class provides methods for managing billing
 * and pricing information in the Hetzner Cloud API.
 */
final class Billing
{
    /**
     * Create a new billing resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * Get all prices
     *
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function listPricing(array $parameters = []): ListPricingResponse
    {
        $request = new ListPricingRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListPricingResponse::from($response, $request);
    }
}
