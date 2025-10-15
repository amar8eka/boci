<?php

namespace Boci\HetznerLaravel\Requests;

use Boci\HetznerLaravel\Contracts\RequestContract;
use GuzzleHttp\Psr7\Request as Psr7Request;

/**
 * Abstract Request Class
 *
 * This abstract class provides the base functionality for all API request classes.
 * It handles parameter management and provides methods for converting requests
 * to PSR-7 request objects.
 */
abstract class Request implements RequestContract
{
    /**
     * Create a new request instance.
     *
     * @param  array<string, mixed>  $parameters  The request parameters
     */
    public function __construct(
        protected readonly array $parameters = [],
    ) {}

    /**
     * Get the HTTP method for this request.
     */
    abstract public function method(): string;

    /**
     * Get the URI for this request.
     */
    abstract public function uri(): string;

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

    /**
     * Convert this request to a PSR-7 request object.
     *
     * @throws \InvalidArgumentException When JSON encoding fails
     */
    public function toPsr7Request(): Psr7Request
    {
        $body = json_encode($this->parameters);
        if ($body === false) {
            throw new \InvalidArgumentException('Failed to encode parameters to JSON: '.json_last_error_msg());
        }

        return new Psr7Request(
            $this->method(),
            $this->uri(),
            [],
            $body
        );
    }
}
