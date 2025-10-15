<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\DnsRrsets;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Remove DNS RRSet Records Request
 */
final class RemoveRecordsRequest extends Request
{
    /**
     * Create a new remove DNS RRSet records request instance.
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
        return "/v1/zones/{$this->zoneIdOrName}/rrsets/{$this->rrName}/{$this->rrType}/actions/remove_records";
    }

    private string $zoneIdOrName;

    private string $rrName;

    private string $rrType;
}
