<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\DnsRrsets;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Delete DNS RRSet Request
 */
final class DeleteRequest extends Request
{
    /**
     * Create a new delete DNS RRSet request instance.
     */
    public function __construct(string $zoneIdOrName, string $rrName, string $rrType)
    {
        parent::__construct([]);
        $this->zoneIdOrName = $zoneIdOrName;
        $this->rrName = $rrName;
        $this->rrType = $rrType;
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'DELETE';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/zones/{$this->zoneIdOrName}/rrsets/{$this->rrName}/{$this->rrType}";
    }

    private string $zoneIdOrName;

    private string $rrName;

    private string $rrType;
}
