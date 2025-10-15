<?php

namespace Boci\HetznerLaravel\Requests\PlacementGroups;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve Placement Group Request
 *
 * This request class is used to retrieve a specific placement group by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve placement group request instance.
     *
     * @param  string  $placementGroupId  The ID of the placement group to retrieve
     */
    public function __construct(
        private readonly string $placementGroupId,
    ) {
        parent::__construct();
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
        return "/v1/placement_groups/{$this->placementGroupId}";
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
