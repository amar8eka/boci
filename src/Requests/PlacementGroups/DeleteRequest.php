<?php

namespace Boci\HetznerLaravel\Requests\PlacementGroups;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Delete Placement Group Request
 *
 * This request class is used to delete a placement group
 * from the Hetzner Cloud API.
 */
final class DeleteRequest extends Request
{
    /**
     * Create a new delete placement group request instance.
     *
     * @param  string  $placementGroupId  The ID of the placement group to delete
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
        return 'DELETE';
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
