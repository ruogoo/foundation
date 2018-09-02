<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\TokenRepository;

/**
 * Interface for token repository.
 */
interface TokenInterface
{
    /**
     * Create a new token record.
     *
     * @param TokenResetable $receiver
     * @param array          $options
     *
     * @return string
     */
    public function create(TokenResetable $receiver, array $options = []);

    /**
     * Find a token record or create it if not found.
     *
     * @param \Ruogu\Foundation\TokenRepository\TokenResetable $receiver
     * @param array                                            $options
     *
     * @return string
     */
    public function findOrCreate(TokenResetable $receiver, array $options = []);

    /**
     * Determine if the receiver's token record exists and is valid.
     *
     * @param TokenResetable $receiver
     * @param string         $token
     *
     * @return bool
     */
    public function exists(TokenResetable $receiver, string $token);

    /**
     * Destroy a receiver's token record.
     *
     * @param TokenResetable $receiver
     */
    public function destroy(TokenResetable $receiver);

    /**
     * Get the created time for the receiver.
     * @param \Ruogu\Foundation\TokenRepository\TokenResetable $receiver
     * @return mixed
     */
    public function createdAt(TokenResetable $receiver);

    /**
     * Get the options fields for the receiver.
     * @param \Ruogu\Foundation\TokenRepository\TokenResetable $receiver
     * @return mixed
     */
    public function getOptions(TokenResetable $receiver);
}
