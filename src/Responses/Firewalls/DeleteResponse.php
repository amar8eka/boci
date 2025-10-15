<?php

namespace Boci\HetznerLaravel\Responses\Firewalls;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Delete Firewall Response
 *
 * This response class represents the response from deleting
 * a firewall in the Hetzner Cloud API.
 */
final class DeleteResponse extends Response
{
    // Empty response for delete operations

    /**
     * Create a fake response for testing.
     *
     * @param  array<string, mixed>  $parameters  Optional parameters
     */
    public static function fake(array $parameters = []): self
    {
        $data = [];
        $meta = new \Boci\HetznerLaravel\Meta\MetaInformation;

        return new self($data, $meta);
    }
}
