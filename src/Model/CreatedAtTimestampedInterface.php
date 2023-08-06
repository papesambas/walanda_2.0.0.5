<?php

namespace App\Model;

interface CreatedAtTimestampedInterface
{
    public function getCreatedAt(): ?\DateTimeImmutable;

    public function setCreatedAt(\DateTimeImmutable $createdAt);
}