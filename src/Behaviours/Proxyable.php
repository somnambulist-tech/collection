<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours;

use InvalidArgumentException;
use Somnambulist\Components\Collection\Utils\MapProxy;
use Somnambulist\Components\Collection\Utils\RunProxy;
use function array_key_exists;
use function is_callable;

/**
 * Trait Proxyable
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Proxyable
 *
 * @property array $items
 */
trait Proxyable
{

    private array $proxies = [
        'run' => RunProxy::class,
        'map' => MapProxy::class,
    ];

    public function __get($name): mixed
    {
        if ($this->hasProxy($name)) {
            return new $this->proxies[$name]($this);
        }

        return $this->offsetGet($name);
    }

    public function proxies(): array
    {
        return $this->proxies;
    }

    public function proxy(string $name): object
    {
        if ($this->hasProxy($name)) {
            return $this->proxies[$name]($this);
        }

        throw new InvalidArgumentException(sprintf('No proxy found for "%s", have you registered a proxy against this keyword?', $name));
    }

    public function registerProxy(string $name, $class): void
    {
        if (!is_callable($class)) {
            $class = function ($subject) use ($class) {
                return new $class($subject);
            };
        }

        $this->proxies[$name] = $class;
    }

    public function hasProxy(string $name): bool
    {
        return array_key_exists($name, $this->proxies);
    }
}
