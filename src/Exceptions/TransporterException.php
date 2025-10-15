<?php

namespace Boci\HetznerLaravel\Exceptions;

use Exception;

/**
 * Transporter Exception
 *
 * This exception is thrown when there are issues with the HTTP transport layer
 * during API requests to the Hetzner Cloud API.
 */
final class TransporterException extends Exception
{
    /**
     * Create a new transporter exception instance.
     *
     * @param  string  $message  The exception message
     * @param  int  $code  The exception code
     * @param  Exception|null  $previous  The previous exception
     */
    public function __construct(
        string $message,
        int $code = 0,
        ?Exception $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}
