<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\DnsZones;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Export DNS Zone Request
 */
final class ExportRequest extends Request
{
    /**
     * Create a new export DNS zone request instance.
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
        return "/v1/zones/{$this->zoneIdOrName}/export";
    }

    private string $zoneIdOrName;
}
