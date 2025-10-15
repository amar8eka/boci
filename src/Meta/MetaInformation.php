<?php

namespace Boci\HetznerLaravel\Meta;

use Psr\Http\Message\ResponseInterface;

/**
 * Meta Information
 *
 * This class represents metadata information extracted from HTTP responses,
 * including request IDs and rate limiting information from the Hetzner Cloud API.
 */
final class MetaInformation
{
    /**
     * Create a new meta information instance.
     *
     * @param  string|null  $requestId  The request ID from the API response
     * @param  string|null  $rateLimitLimit  The rate limit limit header value
     * @param  string|null  $rateLimitRemaining  The rate limit remaining header value
     * @param  string|null  $rateLimitReset  The rate limit reset header value
     */
    public function __construct(
        public readonly ?string $requestId = null,
        public readonly ?string $rateLimitLimit = null,
        public readonly ?string $rateLimitRemaining = null,
        public readonly ?string $rateLimitReset = null,
    ) {}

    /**
     * Create a meta information instance from an HTTP response.
     *
     * @param  ResponseInterface  $response  The HTTP response
     */
    public static function from(ResponseInterface $response): self
    {
        $headers = $response->getHeaders();

        return new self(
            requestId: $headers['x-request-id'][0] ?? null,
            rateLimitLimit: $headers['x-ratelimit-limit'][0] ?? null,
            rateLimitRemaining: $headers['x-ratelimit-remaining'][0] ?? null,
            rateLimitReset: $headers['x-ratelimit-reset'][0] ?? null,
        );
    }

    /**
     * Convert the meta information to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'x-request-id' => $this->requestId,
            'x-ratelimit-limit' => $this->rateLimitLimit,
            'x-ratelimit-remaining' => $this->rateLimitRemaining,
            'x-ratelimit-reset' => $this->rateLimitReset,
        ];
    }
}
