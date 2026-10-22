# Invoice Matcher

Reconcile purchase orders, receipts and invoice quantities.

Quantities are integer base units and prices are integer cents. Over-delivery, unreceived quantities and rate mismatches block the payment gate.

## Run

PHP 8.2 or newer.

```sh
php main.php
php test.php
```

The function can also be imported with `require` without running the example.
