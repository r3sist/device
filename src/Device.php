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
    const UA_MOBILE = 'android|blackberry|phone|ipod|palm|windows\s+ce';
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
        $this->headers = $request->headers->all();

    }

    /**
     * @see agent() method of https://github.com/bcosca/fatfree/blob/master/lib/base.php
     */
    private function getAgent():string
    {
        return $this->headers['X-Operamini-Phone-UA']
            ?? ($this->headers['X-Skyfire-Phone']
                ?? ($this->headers['User-Agent']
                    ?? ''));
    }

    public function isMobile(): bool
    {
        return (bool)preg_match('/('.self::UA_MOBILE.')/i',$this->getAgent());
    }
}
