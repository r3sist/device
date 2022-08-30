<?php declare(strict_types=1);
/**
 * Device: Simple mobile detector for Symfony
 * https://github.com/r3sist/device
 */

namespace resist\Device;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * This class is based on Fat Free Framework's Audit class.
 * @see https://github.com/bcosca/fatfree/blob/master/lib/audit.php
 */
class Device
{
    public const UA_MOBILE = 'android|blackberry|phone|ipod|palm|windows\s+ce';
//    const UA_DESKTOP = 'bsd|linux|os\s+[x9]|solaris|windows';
//    const UA_BOT = 'bot|crawl|slurp|spider';

    /**
     * @var array<string, string> $headers
     */
    private array $headers;

    public function __construct(
        RequestStack $requestStack
    )
    {
        $request = $requestStack->getCurrentRequest()??(new Request());
        array_change_key_case($this->headers = $request->headers->all());
    }

    private function getAgent():string
    {
        return $this->headers['x-operamini-phone-ua'][0]
            ?? ($this->headers['x-skyfire-phone'][0]
                ?? ($this->headers['user-agent'][0]
                    ?? ''));
    }

    public function isMobile(): bool
    {
        return (bool)preg_match('/('.self::UA_MOBILE.')/i',$this->getAgent());
    }
}
