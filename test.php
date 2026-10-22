<?php
declare(strict_types=1);
require __DIR__.'/main.php';
function check(bool $ok): void { if (!$ok) { throw new RuntimeException('Check failed'); } }
function invalid(callable $f): void { try { $f(); } catch (InvalidArgumentException $e) { return; } throw new RuntimeException('Expected rejection'); }
check(threeWayMatch(100,80,80,20,20)['payable']); check(!threeWayMatch(100,80,90,20,20)['payable']); check(threeWayMatch(10,11,11,1,1)['issues']===['over-delivery']);
echo "Tests passed\n";
