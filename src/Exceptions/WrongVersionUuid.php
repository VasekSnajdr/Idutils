<?php declare(strict_types = 1);

namespace VasekSnajdr\Idutils\Exceptions;

class WrongVersionUuid extends \Exception
{

	public function __construct(int $version)
	{
		parent::__construct("Wrong version UUID ({$version}) for ULID.");
	}

}