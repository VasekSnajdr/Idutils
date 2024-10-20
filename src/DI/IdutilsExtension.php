<?php declare(strict_types = 1);

namespace VasekSnajdr\Idutils\DI;

use Nette\DI\CompilerExtension;
use Tuupola\Base32;
use VasekSnajdr\Idutils\CrockfordFactory;
use VasekSnajdr\Idutils\UlidProvider;
use VasekSnajdr\Idutils\UuidProvider;

class IdutilsExtension extends CompilerExtension
{

	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('crockfordFactory'))
			->setFactory(CrockfordFactory::class, [
				'characters' => Base32::CROCKFORD,
				'padding' => FALSE,
			]);
		$builder->addDefinition($this->prefix('crockford'))
			->setFactory('@' . $this->prefix('crockfordFactory') . '::create');
		$builder->addDefinition($this->prefix('uuidProvider'))
			->setFactory(UuidProvider::class);
		$builder->addDefinition($this->prefix('ulid'))
			->setFactory(UlidProvider::class);
	}

}