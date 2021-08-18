# device

Simple mobile detector for Symfony+Twig

Based on [Fat Free Framework](https://fatfreeframework.com)'s [Audit class](https://github.com/bcosca/fatfree/blob/master/lib/audit.php).

Install:

`composer require resist/device`

Usage: use as injected service.

Register optinal Twig `is_mobile()` function as extension :

```yaml
# config/service.yaml

resist\Device\Device:
resist\Device\TwigDevice:
        tags: [ 'twig.extension' ]
```        

