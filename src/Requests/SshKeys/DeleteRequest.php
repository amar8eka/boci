<?php

namespace Boci\HetznerLaravel\Requests\SshKeys;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Delete SSH Key Request
 *
 * This request class is used to delete an SSH key
 * from the Hetzner Cloud API.
 */
final class DeleteRequest extends Request
{
    /**
     * Create a new delete SSH key request instance.
     *
     * @param  string  $sshKeyId  The ID of the SSH key to delete
     * @param  array<string, mixed>  $parameters  Optional additional parameters
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
        return 'DELETE';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/ssh_keys/{$this->sshKeyId}";
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
