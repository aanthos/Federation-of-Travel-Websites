<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2018-04-13 12:06:25 --> Compile Error - Can't use function return value in write context in /s/bach/j/under/anthos/fuel/app/classes/controller/migrations.php on line 11
ERROR - 2018-04-13 13:21:17 --> Fatal Error - Call to undefined method Fuel\Core\Migrate::_find_default() in /s/bach/j/under/anthos/fuel/core/classes/migrate.php on line 411
ERROR - 2018-04-13 13:33:28 --> Fatal Error - Call to undefined method Fuel\Core\Migrate::_find_default() in /s/bach/j/under/anthos/fuel/core/classes/migrate.php on line 411
ERROR - 2018-04-13 13:35:55 --> Error - Migration "/s/bach/j/under/anthos/fuel/app/migrations/003_modify_smallint.php" does not contain expected class "Fuel\Migrations\Modify_smallint" in /s/bach/j/under/anthos/fuel/core/classes/migrate.php on line 481
ERROR - 2018-04-13 13:41:02 --> Fatal Error - Class 'Fuel\Migrations\DBUtil' not found in /s/bach/j/under/anthos/fuel/app/migrations/002_remove_smallint.php on line 25
ERROR - 2018-04-13 13:51:36 --> Fatal Error - Class 'Fuel\Migrations\DBUtil' not found in /s/bach/j/under/anthos/fuel/app/migrations/002_remove_smallint.php on line 25
ERROR - 2018-04-13 13:54:24 --> Fatal Error - Class 'Fuel\Migrations\DBUtil' not found in /s/bach/j/under/anthos/fuel/app/migrations/002_remove_smallint.php on line 25
ERROR - 2018-04-13 13:56:37 --> 1054 - Unknown column '_smallint' in 'tests' [ ALTER TABLE `tests` 
	MODIFY `_smallint` int(11) NOT NULL ] in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 292
ERROR - 2018-04-13 18:14:01 --> Warning - mysqli::mysqli(): (HY000/2003): Can't connect to MySQL server on 'faure.cs.colostate.edu' (113) in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 131
ERROR - 2018-04-13 18:14:46 --> Warning - mysqli::mysqli(): (HY000/2003): Can't connect to MySQL server on 'faure.cs.colostate.edu' (113) in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 131
ERROR - 2018-04-13 18:14:52 --> Warning - mysqli::mysqli(): (HY000/2003): Can't connect to MySQL server on 'faure.cs.colostate.edu' (113) in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 131
ERROR - 2018-04-13 20:20:53 --> 1054 - Unknown column '_smallint' in 'tests' [ ALTER TABLE `tests` 
	MODIFY `_smallint` int(11) NOT NULL ] in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 292
ERROR - 2018-04-13 20:21:48 --> 1054 - Unknown column '_smallint' in 'tests' [ ALTER TABLE `tests` 
	MODIFY `_smallint` int(11) NOT NULL ] in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 292
ERROR - 2018-04-13 20:23:10 --> 1054 - Unknown column '_smallint' in 'tests' [ ALTER TABLE `tests` 
	MODIFY `_smallint` int(11) NOT NULL ] in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 292
ERROR - 2018-04-13 20:26:21 --> 1054 - Unknown column '_smallint' in 'tests' [ ALTER TABLE `tests` 
	MODIFY `_smallint` int(11) NOT NULL ] in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 292
ERROR - 2018-04-13 20:33:12 --> Parsing Error - syntax error, unexpected ';' in /s/bach/j/under/anthos/fuel/app/classes/controller/migrations.php on line 20
ERROR - 2018-04-13 20:43:14 --> Parsing Error - syntax error, unexpected ';' in /s/bach/j/under/anthos/fuel/app/classes/controller/migrations.php on line 39
ERROR - 2018-04-13 21:03:12 --> 1146 - Table 'anthos.test' doesn't exist [ SHOW CREATE TABLE `test` ] in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 292
ERROR - 2018-04-13 21:04:59 --> Fatal Error - Call to a member function set_safe() on a non-object in /s/bach/j/under/anthos/fuel/app/classes/controller/migrations.php on line 43
ERROR - 2018-04-13 21:06:11 --> Fatal Error - Call to undefined function set_safe() in /s/bach/j/under/anthos/fuel/app/classes/controller/migrations.php on line 45
ERROR - 2018-04-13 21:07:30 --> Parsing Error - syntax error, unexpected '{' in /s/bach/j/under/anthos/fuel/app/views/migrations/index.php on line 27
ERROR - 2018-04-13 21:07:57 --> Parsing Error - syntax error, unexpected '}', expecting ',' or ';' in /s/bach/j/under/anthos/fuel/app/views/migrations/index.php on line 30
ERROR - 2018-04-13 21:10:53 --> 1054 - Unknown column '_smallint' in 'tests' [ ALTER TABLE `tests` 
	MODIFY `_smallint` int(11) NOT NULL ] in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 292
ERROR - 2018-04-13 21:22:57 --> 1054 - Unknown column '_smallint' in 'tests' [ ALTER TABLE `tests` 
	MODIFY `_smallint` varchar(255) NOT NULL ] in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 292
ERROR - 2018-04-13 22:01:48 --> Notice - Undefined index: Create Table in /s/bach/j/under/anthos/fuel/app/views/migrations/index.php on line 41
ERROR - 2018-04-13 22:04:33 --> Notice - Array to string conversion in /s/bach/j/under/anthos/fuel/app/views/migrations/index.php on line 41
ERROR - 2018-04-13 22:07:41 --> Fatal Error - Class 'Model_Migrationstatus' not found in /s/bach/j/under/anthos/fuel/app/classes/controller/migrations.php on line 46
ERROR - 2018-04-13 22:08:46 --> 1054 - Unknown column 't0.created_at' in 'field list' [ SELECT `t0`.`id` AS `t0_c0`, `t0`.`version_num` AS `t0_c1`, `t0`.`name` AS `t0_c2`, `t0`.`status` AS `t0_c3`, `t0`.`created_at` AS `t0_c4`, `t0`.`updated_at` AS `t0_c5` FROM `migrationstatus` AS `t0` ] in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 292
ERROR - 2018-04-13 22:10:07 --> 1054 - Unknown column 't0.created_at' in 'field list' [ SELECT `t0`.`id` AS `t0_c0`, `t0`.`version_num` AS `t0_c1`, `t0`.`name` AS `t0_c2`, `t0`.`status` AS `t0_c3`, `t0`.`created_at` AS `t0_c4`, `t0`.`updated_at` AS `t0_c5` FROM `migrationstatus` AS `t0` ] in /s/bach/j/under/anthos/fuel/core/classes/database/mysqli/connection.php on line 292
ERROR - 2018-04-13 22:11:58 --> Notice - Undefined variable: migration_number in /s/bach/j/under/anthos/fuel/app/classes/controller/migrations.php on line 19
ERROR - 2018-04-13 22:39:56 --> Parsing Error - syntax error, unexpected ')' in /s/bach/j/under/anthos/fuel/app/classes/controller/federation.php on line 6
ERROR - 2018-04-13 22:40:09 --> Parsing Error - syntax error, unexpected ')' in /s/bach/j/under/anthos/fuel/app/classes/controller/federation.php on line 6
ERROR - 2018-04-13 22:51:08 --> Notice - Use of undefined constant Closed - assumed 'Closed' in /s/bach/j/under/anthos/fuel/app/classes/controller/federation.php on line 7
