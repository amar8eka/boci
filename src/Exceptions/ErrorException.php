<?php

namespace Boci\HetznerLaravel\Exceptions;

use Exception;

/**
 * Error Exception
 *
 * This exception is thrown when the Hetzner Cloud API returns an error response.
 * It provides access to the error details and HTTP status code.
 */
final class ErrorException extends Exception
{
    /**
     * Create a new error exception instance.
     *
     * @param  array<string, mixed>  $error  The error details from the API response
     * @param  int  $httpStatus  The HTTP status code (default: 0)
     * @param  Exception|null  $previous  The previous exception for chaining
     */
    public function __construct(
        array $error,
        int $httpStatus = 0,
        ?Exception $previous = null,
    ) {
        $message = $error['message'] ?? 'An error occurred';
        $code = $error['code'] ?? $httpStatus;

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the error details as an array.
     *
     * @return array<string, mixed>
     */
    public function getError(): array
    {
        return [
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
        ];
    }
}
