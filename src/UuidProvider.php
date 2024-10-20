<?php declare(strict_types = 1);

namespace VasekSnajdr\Idutils;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class UuidProvider
{

	public function __construct(
		private readonly Crockford $crockford,
	) {}


	public static function uuid7(): UuidInterface
	{
		return Uuid::uuid7();
	}


	public static function fromString(string $uuid): UuidInterface
	{
		return Uuid::fromString($uuid);
	}


	public function fromUlid(string $ulid): UuidInterface
	{
		return self::fromString($this->crockford->decode($ulid));
	}

}