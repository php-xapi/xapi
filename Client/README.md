Xabbuh xApi Client
==================

[![Build Status](https://travis-ci.org/xabbuh/xapi-client.png)](https://travis-ci.org/xabbuh/xapi-client)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/xabbuh/xapi-client/badges/quality-score.png?s=769c1e047e4dbd4d5cdce1008098f9965dfb7924)](https://scrutinizer-ci.com/g/xabbuh/xapi-client/)
[![Code Coverage](https://scrutinizer-ci.com/g/xabbuh/xapi-client/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/xabbuh/xapi-client/?branch=master)

Client side PHP implementation of the
[Experience API](https://github.com/adlnet/xAPI-Spec/blob/master/xAPI.md).

Installation
------------

The recommended way to install the xAPI client is using
[Composer](http://getcomposer.org/):

1. Download and install Composer:

        curl -sS http://getcomposer.org/installer | php

   For more details on how to install composer have a look at the official
   [documentation](http://getcomposer.org/doc/00-intro.md).

1. Add ``xabbuh/xapi-client``, ``xabbuh/xapi-data-fixtures``, ``xabbuh/xapi-common``, ``xabbuh/xapi-model`` and
   ``xabbuh/xapi-serializer`` as dependencies to your project:

    ```bash
    $ composer require --no-update xabbuh/xapi-client "~1.0@dev"
    $ composer require --no-update xabbuh/xapi-data-fixtures "~1.0@dev"
    $ composer require --no-update xabbuh/xapi-common "~1.0@dev"
    $ composer require --no-update xabbuh/xapi-model "~1.0@dev"
    $ composer require xabbuh/xapi-serializer "~1.0@dev"
    ```

1. Require Composer's autoloader:

   ``` php
   require __DIR__.'/vendor/autoload.php';
   ```

Usage
-----

Read the [documentation](doc/index.md) to find out how to use the library.

Issues
------

Report issue in the [issue tracker of the XAPI package](https://github.com/xabbuh/xapi/issues).

License
-------

This package is under the MIT license. See the complete license in the
[LICENSE](LICENSE) file.
