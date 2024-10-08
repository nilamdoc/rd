<?php
/**
 * li₃: the most RAD framework for PHP (http://li3.me)
 *
 * Copyright 2010, Union of RAD. All rights reserved. This source
 * code is distributed under the terms of the BSD 3-Clause License.
 * The full license text can be found in the LICENSE.txt file.
 */

namespace app\config\bootstrap;

use lithium\data\Connections;

/**
 * ### Configuring backend database connections
 *
 * Lithium supports a wide variety relational and non-relational databases, and is designed to allow
 * and encourage you to take advantage of multiple database technologies, choosing the most optimal
 * one for each task.
 *
 * As with other `Adaptable`-based configurations, each database configuration is defined by a name,
 * and an array of information detailing what database adapter to use, and how to connect to the
 * database server. Unlike when configuring other classes, `Connections` uses two keys to determine
 * which class to select. First is the `'type'` key, which specifies the type of backend to
 * connect to. For relational databases, the type is set to `'database'`. For HTTP-based backends,
 * like CouchDB, the type is `'http'`. Some backends have no type grouping, like MongoDB, which is
 * unique and connects via a custom PECL extension. In this case, the type is set to `'MongoDb'`,
 * and no `'adapter'` key is specified. In other cases, the `'adapter'` key identifies the unique
 * adapter of the given type, i.e. `'MySql'` for the `'database'` type, or `'CouchDb'` for the
 * `'http'` type. Note that while adapters are always specified in CamelCase form, types are
 * specified either in CamelCase form, or in underscored form, depending on whether an `'adapter'`
 * key is specified. See the examples below for more details.
 *
 * ### Multiple environments
 *
 * As with other `Adaptable` classes, `Connections` supports optionally specifying different
 * configurations per named connection, depending on the current environment. For information on
 * specifying environment-based configurations, see the `Environment` class.
 *
 * @see lithium\core\Adaptabl
 * @see lithium\core\Environment
 */
   Connections::add('default', array(
 	'type' => CONNECTION_TYPE,
 	'host' => array(CONNECTION,
		),
//	'replicaSet' => true,
 	'database' => CONNECTION_DB,
	'login' => CONNECTION_USER,
	'password' => CONNECTION_PASS,	
	//'classes' => array('server' => 'Mongo')
//	'setSlaveOkay' => true,
//	'readPreference' => Mongo::RP_NEAREST	
 ));
Connections::add('defaultMySQL', [
	'type' => 'database',
	'adapter' => 'MySql',
	'host' => 'localhost',
	'login' => 'rd_desk',
//	'password' => 'BQqX7crhvr',
	'password' => '!gj1hm13490210Ahd',
	'database' => 'rd_desk'
 ]);
?>