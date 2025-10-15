<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\PrimaryIPActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Get Action by ID Request
 *
 * This request class is used to retrieve a specific action by its ID
 * from the Hetzner Cloud API.
 */
final class GetActionByIdRequest implements RequestContract
{
    /**
     * Create a new get action by ID request instance.
     *
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function __construct(
        private readonly string $actionId
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
        return "/v1/actions/{$this->actionId}";
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
