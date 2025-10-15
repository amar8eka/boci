<?php

namespace Boci\HetznerLaravel\Responses\Servers;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Update Server Response
 *
 * This response class represents the response from updating
 * a server in the Hetzner Cloud API.
 */
final class UpdateResponse extends Response
{
    /**
     * Get the server from the response.
     *
     * @return array<string, mixed>
     */
    public function server(): array
    {
        return $this->data['server'] ?? [];
    }
}
