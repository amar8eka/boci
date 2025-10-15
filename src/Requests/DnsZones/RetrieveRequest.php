<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\DnsZones;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve DNS Zone Request
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve DNS zone request instance.
     */
    public function __construct(string $zoneIdOrName)
    {
        parent::__construct([]);
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
        return "/v1/zones/{$this->zoneIdOrName}";
    }

    private string $zoneIdOrName;
}
