<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\Actions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * List Actions Request
 *
 * This request class is used to retrieve a list of actions
 * from the Hetzner Cloud API with optional filtering parameters.
 */
final class ListActionsRequest implements RequestContract
{
    /**
     * Create a new list actions request instance.
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
        return '/v1/actions';
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
