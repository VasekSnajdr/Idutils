<?php declare(strict_types = 1);

namespace VasekSnajdr\Idutils;

readonly class CrockfordFactory
{

	public function __construct(
		private string $characters,
		private bool $padding,
		private bool $crockford = TRUE,
	) {}


	public function create(): Crockford
	{
		return new Crockford([
			'characters' => $this->characters,
			'padding' => $this->padding,
			'crockford' => $this->crockford,
		]);
	}

}