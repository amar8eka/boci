<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\DnsZoneActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * List DNS Zone Actions Request
 */
final class ListActionsRequest extends Request
{
    /**
     * Create a new list DNS zone actions request instance.
     *
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(string $zoneIdOrName, array $parameters = [])
    {
        parent::__construct($parameters);
        $this->zoneIdOrName = $zoneIdOrName;
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
        return "/v1/zones/{$this->zoneIdOrName}/actions";
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

    private string $zoneIdOrName;
}
