<?php

namespace Boci\HetznerLaravel\Requests\SshKeys;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Create SSH Key Request
 *
 * This request class is used to create a new SSH key
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
        return '/v1/ssh_keys';
    }
}
