# device

Simple mobile detector for Symfony+Twig

Based on [Fat Free Framework](https://fatfreeframework.com)'s [Audit class](https://github.com/bcosca/fatfree/blob/master/lib/audit.php).

Install:

`composer require resist/device`

Register optinal Twig extension:

```yaml
# config/service.yaml

resist\Device\TwigDevice:
        tags: [ 'twig.extension' ]
```        

Usage:

Use as injected service.
