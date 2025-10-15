<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\DnsRrsets;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Change DNS RRSet TTL Request
 */
final class ChangeTtlRequest extends Request
{
    /**
     * Create a new change DNS RRSet TTL request instance.
     *
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(string $zoneIdOrName, string $rrName, string $rrType, array $parameters)
    {
        parent::__construct($parameters);
        $this->zoneIdOrName = $zoneIdOrName;
        $this->rrName = $rrName;
        $this->rrType = $rrType;
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'POST';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/zones/{$this->zoneIdOrName}/rrsets/{$this->rrName}/{$this->rrType}/actions/change_ttl";
    }

    private string $zoneIdOrName;

    private string $rrName;

    private string $rrType;
}
