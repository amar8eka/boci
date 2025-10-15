<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\DnsZoneActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Change DNS Zone Protection Request
 */
final class ChangeProtectionRequest extends Request
{
    /**
     * Create a new change DNS zone protection request instance.
     *
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(string $zoneIdOrName, array $parameters)
    {
        parent::__construct($parameters);
        $this->zoneIdOrName = $zoneIdOrName;
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
        return "/v1/zones/{$this->zoneIdOrName}/actions/change_protection";
    }

    private string $zoneIdOrName;
}
