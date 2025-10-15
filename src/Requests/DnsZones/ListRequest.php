<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\DnsZones;

use Boci\HetznerLaravel\Requests\Request;

/**
 * List DNS Zones Request
 */
final class ListRequest extends Request
{
    /**
     * Create a new list DNS zones request instance.
     *
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(array $parameters = [])
    {
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
        return '/v1/zones';
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
