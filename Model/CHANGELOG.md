CHANGELOG
=========

0.3.0
-----

* removed dependency on `xabbuh/xapi-data-fixtures` to fix  cyclic dependency

* replaced dependency on `xabbuh/xapi-common` with its `php-xapi/exception`
  replacement

**CAUTION**: This is the last release of this package and it will no longer be
maintained in the future. Please use the `php-xapi/model` package instead which
provides the same features.

0.2.1
-----

* depend on a released version of the `xabbuh/xapi-data-fixtures` package

0.2.0
-----

* added created and stored timestamp attributes to statements

* added statement authorities

* model classes are now final and thus cannot be extended anymore

* added `equals()` methods to all models to make them comparable

* added a class to create statement filters

* model classes are now immutable

0.1.0
-----

This is the first release containing immutable classes that reflect all parts
of Experience API statements.
