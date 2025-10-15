<?php

namespace Boci\HetznerLaravel\Requests\SshKeys;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Update SSH Key Request
 *
 * This request class is used to update an SSH key's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest extends Request
{
    /**
     * Create a new update SSH key request instance.
     *
     * @param  string  $sshKeyId  The ID of the SSH key to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function __construct(
        private readonly string $sshKeyId,
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
        return "/v1/ssh_keys/{$this->sshKeyId}";
    }
}
