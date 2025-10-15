<?php

namespace Boci\HetznerLaravel\Testing;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Responses\SshKeys\CreateResponse;
use Boci\HetznerLaravel\Responses\SshKeys\DeleteResponse;
use Boci\HetznerLaravel\Responses\SshKeys\ListResponse;
use Boci\HetznerLaravel\Responses\SshKeys\RetrieveResponse;
use Boci\HetznerLaravel\Responses\SshKeys\UpdateResponse;
use Psr\Http\Message\ResponseInterface;
use Throwable;

final class SshKeysFake implements ResourceContract
{
    public function __construct(
        private array &$responses,
        private array &$requests,
    ) {}

    /**
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $this->requests[] = [
            'resource' => 'ssh_keys',
            'method' => 'create',
            'parameters' => $parameters,
        ];

        $response = array_shift($this->responses);

        if ($response instanceof Throwable) {
            throw $response;
        }

        if ($response instanceof ResponseInterface) {
            return CreateResponse::from($response, new \Boci\HetznerLaravel\Requests\SshKeys\CreateRequest($parameters));
        }

        return CreateResponse::fake($parameters);
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    public function list(array $parameters = []): ListResponse
    {
        $this->requests[] = [
            'resource' => 'ssh_keys',
            'method' => 'list',
            'parameters' => $parameters,
        ];

        $response = array_shift($this->responses);

        if ($response instanceof Throwable) {
            throw $response;
        }

        if ($response instanceof ResponseInterface) {
            return ListResponse::from($response, new \Boci\HetznerLaravel\Requests\SshKeys\ListRequest($parameters));
        }

        return ListResponse::fake($parameters);
    }

    public function retrieve(string $sshKeyId): RetrieveResponse
    {
        $this->requests[] = [
            'resource' => 'ssh_keys',
            'method' => 'retrieve',
            'parameters' => ['sshKeyId' => $sshKeyId],
        ];

        $response = array_shift($this->responses);

        if ($response instanceof Throwable) {
            throw $response;
        }

        if ($response instanceof ResponseInterface) {
            return RetrieveResponse::from($response, new \Boci\HetznerLaravel\Requests\SshKeys\RetrieveRequest($sshKeyId));
        }

        return RetrieveResponse::fake(['sshKeyId' => $sshKeyId]);
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    public function update(string $sshKeyId, array $parameters): UpdateResponse
    {
        $this->requests[] = [
            'resource' => 'ssh_keys',
            'method' => 'update',
            'parameters' => array_merge(['sshKeyId' => $sshKeyId], $parameters),
        ];

        $response = array_shift($this->responses);

        if ($response instanceof Throwable) {
            throw $response;
        }

        if ($response instanceof ResponseInterface) {
            return UpdateResponse::from($response, new \Boci\HetznerLaravel\Requests\SshKeys\UpdateRequest($sshKeyId, $parameters));
        }

        return UpdateResponse::fake(array_merge(['sshKeyId' => $sshKeyId], $parameters));
    }

    public function delete(string $sshKeyId): DeleteResponse
    {
        $this->requests[] = [
            'resource' => 'ssh_keys',
            'method' => 'delete',
            'parameters' => ['sshKeyId' => $sshKeyId],
        ];

        $response = array_shift($this->responses);

        if ($response instanceof Throwable) {
            throw $response;
        }

        if ($response instanceof ResponseInterface) {
            return DeleteResponse::from($response, new \Boci\HetznerLaravel\Requests\SshKeys\DeleteRequest($sshKeyId));
        }

        return DeleteResponse::fake(['sshKeyId' => $sshKeyId]);
    }

    public function assertSent(callable $callback): void
    {
        $sent = array_filter($this->requests, fn (array $request) => $request['resource'] === 'ssh_keys');
        $sent = array_filter($sent, $callback);

        if (empty($sent)) {
            throw new \PHPUnit\Framework\AssertionFailedError('No requests were sent to ssh_keys.');
        }
    }

    public function assertNotSent(): void
    {
        $sent = array_filter($this->requests, fn (array $request) => $request['resource'] === 'ssh_keys');

        if (! empty($sent)) {
            throw new \PHPUnit\Framework\AssertionFailedError('Requests were sent to ssh_keys.');
        }
    }
}
