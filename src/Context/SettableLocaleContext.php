<?php
declare(strict_types=1);


namespace Akki\SyliusSettableLocalePlugin\Context;

use Sylius\Component\Locale\Context\LocaleContextInterface;
use Sylius\Component\Locale\Context\LocaleNotFoundException;
use Sylius\Component\Locale\Provider\LocaleProviderInterface;

final class SettableLocaleContext implements SettableLocaleContextInterface
{
    private string|null $localeCode = null;

    public function __construct(
        private readonly LocaleContextInterface  $decorated,
        private readonly LocaleProviderInterface $localeProvider
    )
    {
    }

    public function getLocaleCode(): string
    {
        if (null === $this->localeCode) {
            return $this->decorated->getLocaleCode();
        }

        return $this->localeCode;
    }

    public function setLocaleCode(string $localeCode): void
    {
        $availableLocalesCodes = $this->localeProvider->getAvailableLocalesCodes();

        if (!in_array($localeCode, $availableLocalesCodes, true)) {
            throw LocaleNotFoundException::notAvailable($localeCode, $availableLocalesCodes);
        }

        $this->localeCode = $localeCode;
    }

    public function reset(): void
    {
        $this->localeCode = null;
    }
}
