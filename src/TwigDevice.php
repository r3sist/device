<?php declare(strict_types=1);
/**
 * TwigDevice: Twig extension of resist/device mobile detector for Symfony
 * https://github.com/r3sist/device
 */

namespace resist\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class TwigDevice extends AbstractExtension
{
    public function __construct(
        private \resist\Device $deviceService,
    )
    {
    }

    public function getFunctions(): array
    {
        $deviceService = $this->deviceService;
        
        return [
            new TwigFunction('is_mobile', static function() use ($deviceService): bool
            {
                return deviceService->isMobile();
            }),
        ];
    }
}
