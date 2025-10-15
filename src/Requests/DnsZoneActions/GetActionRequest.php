<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\DnsZoneActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Get DNS Zone Action Request
 */
final class GetActionRequest extends Request
{
    /**
     * Create a new get DNS zone action request instance.
     */
    public function __construct(string $zoneIdOrName, string $actionId)
    {
        parent::__construct([]);
        $this->zoneIdOrName = $zoneIdOrName;
        $this->actionId = $actionId;
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
        return "/v1/zones/{$this->zoneIdOrName}/actions/{$this->actionId}";
    }

    private string $zoneIdOrName;

    private string $actionId;
}
