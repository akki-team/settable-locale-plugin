<?php
declare(strict_types=1);


namespace Akki\SyliusSettableLocalePlugin\Context;

use Sylius\Component\Locale\Context\LocaleContextInterface;

interface SettableLocaleContextInterface extends LocaleContextInterface
{
    public function setLocaleCode(string $localeCode): void;

    public function reset(): void;
}
