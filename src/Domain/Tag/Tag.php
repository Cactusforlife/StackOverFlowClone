<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Tag;

/**
 * Tag
 *
 * @package App\Domain\Tag
 */
final class Tag
{
    private $tagId;

    private $description;

    /**
     * Tag constructor.
     * @param String $description
     * @throws \Exception
     */
    public function __construct(String $description)
    {

        $this->tagId = new TagId();
        $this->description = $description;

    }

    /**
     * @return TagId
     */
    public function TagId(): TagId
    {
        return $this->tagId;
    }

    /**
     * @return String
     */
    public function Description(): String
    {
        return $this->description;
    }




}
