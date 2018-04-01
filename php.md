- [Connecting to a Database](#connecting-to-a-database)
	- [Login Information](#login-information)
	- [Requirements](#requirements)
	- [Older Method](#older-method)
		- [MySQL Functions](#mysql-functions)
		- [Query](#query)
	- [PDO Method](#pdo-method)
		- [Querying the Database](#querying-the-database)
		- [Updating the Database](#updating-the-database)
		- [Placeholders](#placeholders)
			- [A Single Placeholder](#a-single-placeholder)
			- [Multiple Placeholders](#multiple-placeholders)
			- [Placeholders and Wildcard Characters (%)](#placeholders-and-wildcard-characters)
	- [Debugging](#debugging)
		- [Create PHP Config Page](#create-php-config-page)
		- [Modify PHP Config](#modify-php-config)
		- [`.htaccess` file](#htaccess-file)
			- [`htaccess` settings](#htaccess-settings)
		- [PHP Header](#php-header)
	- [Sessions](#sessions)
		- [Starting a session](#starting-a-session)
		- [Set a Session Variable](#set-a-session-variable)
		- [Get Session Variable](#get-session-variable)
		- [End Session](#end-session)
	- [Resources](#resources)

# Connecting to a Database

* PHP allows multiple methods to connect to a MySQL database.

## Login Information
* Better practice to store login variables in a separate file.
	* Ex: `mysqlLogin.php`
```php
$db_hostname = 'localhost';
$db_database = '<database_name>';
$db_username = 'www';
$db_password = 'guest';
```

* File can be included in a MySQL connection script with `require_once()`
```php
require_once("mysqlLogin.php");
```

## Requirements
1. `host`
	1. Usually `localhost` if the php script is being executed on the same server as the database.
2. `dbname`
	1. The name of the database being connected to.
	2. Multiple databases can exist under one MySQL server.  Make sure you are connecting to the one which has access to the tables and data you are querying.
3. `user`
	1. The login user for the MySQL server.
	2. There will be different users with different priviledges for a database.
	3. If a user should only be able to read data from the database, then make sure the user being logged into has read-only access to database.
4. `password`
	1. Password for specified database user.

## Older Method
```php
<?php

require_once 'mysqlLogin.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if(!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());

?>
```

### MySQL Functions
* If using the above method, use the [function reference](http://php.net/manual/en/ref.mysql.php)

### Query
* `mysql_query` will execute a query command on the connected database.
```php
$query = "SELECT * FROM table_name";
$result = mysql_query($query);
```


## PDO Method
```php
<?php

try {//Connects to database and creates object
	$db = new PDO("mysql:host=".$db_hostname.";dbname=".$db_database.";",$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo $e->getMessage();
	echo "Could not connect to the database";
	exit;
}
?>
```

### Querying the Database
* `$db->query` can execute a single SQL statement.

```php
try {//Creates object with query results
	$results = $db->query("SELECT * FROM table_name;");
} catch (Exception $e) {
	echo "Couldn't query.";
	exit;
}

$db_array = $results->fetchAll(PDO::FETCH_ASSOC);
```

* `$db_array` is an array of the results from the database query.

### Updating the Database

```php
$results = $db->prepare("SELECT * FROM :placeholder");
$results->execute(':placeholder' => $phpVariable);
```

* `$db->prepare()` is generally the safer method to execute SQL commands.
* `prepare()` takes a SQL statement as an argument but does not execute it.
* `prepare()` allows for [placeholder](#placeholders) arguments within the SQL statement.
* `execute()` runs the SQL statement.
* `$db->prepare()` returns an object.
	* It is best to store this object in a variable. `$results = $db->prepare()`

### Placeholders

* Placeholder text is prepended by a colon (:) within the SQL statement.
	* `:placeHolder`
* When `results->execute()` is called, it will replace the placeholder text with the value of a php variable.
	* This allows for more dynamic programming, such as updating a table with array values by nesting the SQL statement in a for loop.
	* Passing a value to the placeholder is done by assigning the placeholder with `=>`
	* `':placeHolder' => $phpVar`

```php
try {//Creates object with query results
	$results = $db->prepare("UPDATE table_name SET column_name = :change WHERE primary_key =:row_id");
	$results->execute(array(':change' => $to_change, ':row_id' => $row_id));
} catch (Exception $e) {
	echo $e->getMessage();
	echo "Couldn't query.";
	exit;
}
```

#### A Single Placeholder
```php
$statement->bindParam(':parameter', $variable, PDO::PARAM_TYPE);
```
* Besides an array within `execute()`, parameters can be bound with the `bindParam()` method.
	* The `bindParam()` method will allow you to specify the type of variable passed with the `PDO::PARAM_TYPE` argument.
* `PDO::PARAM_TYPE`
	* `PDO::PARAM_INT`
	* `PDO::PARAM_STR`

#### Multiple Placeholders
* You can use bindParam multiple times on the database object to bind different parameters.
```php
$statement->bindParam(':parameter1', $variable1, PDO::PARAM_TYPE);
$statement->bindParam(':parameter2', $variable2, PDO::PARAM_TYPE);
```

#### Placeholders and Wildcard Characters (%)
* When using `LIKE` and wildcard characters, they cannot be included within the SQL statement itself, but within the placeholder.
* This will not work:
* 
```php
"SELECT * FROM `users` WHERE `firstname` LIKE '%:keyword%'";
```
* This will work:
```php
"SELECT * FROM `users` WHERE `firstname` LIKE :keyword";
$keyword = "%".$keyword."%";
```


## Debugging

* PHP defaults to not display errors.
* There are multiple ways to turn error handling on:
	* [Modify the configuration file](#Modify-PHP-Config)
		* This will turn error handling on server-wide.
	* [Turn on at the web root](#htaccess-file)
	* Set error handling for a specific PHP file

### Create PHP Config Page

1. On the server, create a `phpinfo.php` page in the web environment folder (usually `/var/www/`)
	2. `phpinfo.php` contents:

		```php
		<?php
			phpinfo();
		?>
		```

### Modify PHP Config

1. Locate `php.ini`
	2. The `php.ini` file path will be displayed on [`phpinfo.php`](#Create-PHP-Config-Page) under "Configuration File Path".

2. Locate log file directory under `APACHE_LOG_DIR` on `phpinfo.php`
	1. To specify your own location for error log files, add the following line to `php.ini`
		```
		error_log=/path/log_file
		```
	2. If these log files are placed in the web environment directory, it can be accessed through a browser. 
	3. If wanting to see only the most recent errors run `tail error.log` in the terminal.

### `.htaccess` file

1. If you cannot modify the `php.ini` file, you can setup error handling at the directory level.

#### `htaccess` settings
	```
	php_flag display_startup_errors on
	php_flag display_errors on
	php_value error_reporting -1
	php_flag html_errors on
	```

### PHP Header

```php
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
>
```

## Sessions
* Session variables hold info about a single user.
* They are available to all pages in one app.
* These session variables last until the user closes the browser.

### Starting a session
* Start a session with `session_start()`
* Place at the top of first page of the app.
```php
<?php
	session_start();
?>
```

### Set a Session Variable
* `$_SESSION` is the global session variable.

```php
$_SESSION['varName'] = "value";
```

### Get Session Variable
* Calling the global session variable with the variable name as the index will return the value.
```php
echo $_SESSION['varName'];
```

### End Session
* `session_unset()` removes all session variables
* `session_destroy()` destroys the session

## Resources
[Stack Overflow](https://stackoverflow.com/questions/845021/how-to-get-useful-error-messages-in-php)
[treehouse](http://blog.teamtreehouse.com/how-to-debug-in-php)
[Sessions](https://www.w3schools.com/php/php_sessions.asp)