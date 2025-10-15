<?php

namespace Boci\HetznerLaravel\Requests\PlacementGroups;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Update Placement Group Request
 *
 * This request class is used to update a placement group's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest extends Request
{
    /**
     * Create a new update placement group request instance.
     *
     * @param  string  $placementGroupId  The ID of the placement group to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function __construct(
        private readonly string $placementGroupId,
        array $parameters = [],
    ) {
        parent::__construct($parameters);
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'PUT';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/placement_groups/{$this->placementGroupId}";
    }
}
