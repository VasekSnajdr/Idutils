<?php declare(strict_types = 1);

namespace VasekSnajdr\Idutils;

use Ramsey\Uuid\UuidInterface;
use VasekSnajdr\Idutils\Exceptions\WrongVersionUuid;

class UlidProvider
{

	public function __construct(
		private readonly Crockford $crockford,
	) {}


	/**
	 * @throws WrongVersionUuid
	 */
	public function ulid(UuidInterface $uuid): string
	{
		if ($uuid->getFields()->getVersion() === 7) {
			$bytes = \str_pad($uuid->getBytes(), 20, "\x00", STR_PAD_LEFT);
			$encoded = $this->crockford->encode($bytes);

			return \substr($encoded, 6);
		}

		throw new WrongVersionUuid($uuid->getFields()->getVersion());
	}

}