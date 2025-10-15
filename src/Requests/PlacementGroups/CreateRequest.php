<?php

namespace Boci\HetznerLaravel\Requests\PlacementGroups;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Create Placement Group Request
 *
 * This request class is used to create a new placement group
 * in the Hetzner Cloud API.
 */
final class CreateRequest extends Request
{
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
        return '/v1/placement_groups';
    }
}
