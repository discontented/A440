```
layout: page
title: MySQL
```

# MySQL Cheat Sheet

## SELECT
```mysql
SELECT * FROM TABLE
SELECT column_name FROM table_name
```

## JOINS
### Inner Join
```
SELECT 
    column1,
    column2
FROM table1 alias1
JOIN table2 alias2
ON alias1.foreignKey = alias2.primaryKey;
```

### Outer Join

* Looks for inequalities on both sides of a query
* Will show all of the rows in both tables

```
SELECT
    column1,
    column2,
    table2.column1
FROM table1
OUTER JOIN table2
ON table2.table2ID  = table1.table2ID
```

* LEFT or RIGHT specifies which table you are wanting to query everything from.
`FROM table1 LEFT JOIN table2`

* Displays everything within table1 along with the related values specified in the ON clause in table2.
`FROM table1 RIGHT JOIN table2`

* Will display everything from table2 and the related values of table 1.

## Subquery
```
SELECT OrderKey
FROM OrderDetail
WHERE  productKey = 
    (
    SELECT productKey 
    FROM product 
    WHERE productName = 'Large'
    )
```
* To use a subquery within an INSERT it must look like this:
```
INSERT INTO table
    (columnName, columnName)
SELECT fk_column1, fk_column2
FROM fk_table
WHERE fk_columnName = 'string'
```

## Set Operators
### Union
* Selects all rows in the two specified tables.
* Used to join related tables
* Only allows two tables to be matched. 

### Intersect
* Finds where two datasets collide and what they have in common. (common rows)
```
SELECT columnKey
FROM table1
INTERSECT
SELECT columnKey
FROM table2
```
```
SELECT columnKey, columnName
FROM table1
JOIN table3
ON table1.columnKey = table3.columnKey
INTERSECT
SELECT columnKey, columnName
FROM table2
JOIN table3
ON table2.columnKey = table3.columnKey
```

## Creating a Table
```
CREATE TABLE table_name (
    name_id int NOT NULL identity(1,1), 
    foreign_id int NOT NULL,
    table_date datetime, 
    CONSTRAINT constraint_name PRIMARY KEY (name_id)
    CONSTRAINT constraint_name FOREIGN KEY(foreign_id) REFERENCES fkTable (foreign_id)
);
```

## UPDATE
```
UPDATE table
SET old_field = new_value
WHERE name_field = 'name_value';
```
```
UPDATE
    table
SET
    column = value
WHERE columnID IN 
    (
    SELECT columnID
    FROM
    table
    WHERE column = ‘String’
    )
```

## INSERT
```
INSERT INTO table
    (name_field, year_field, currency_field)
VALUES
    (‘name_val’, ‘year_val’, currency_val’)
VALUES
    (‘name_val2’, ‘year_val2’, currency_val2’);
```

### Positional Insert
```
INSERT INTO TABLE table SET name_field = ‘name_val’ , year_field = ‘year_val’;
```

## ALTER
### Add/drop columns
```
ALTER TABLE tableName
ADD columnName datatype() NULL/NOT NULL
CONSTRAINT constraint_def DEFAULT default_value 
CONSTRAINT constraint CHECK (check statement)

ALTER TABLE tableName DROP COLUMN columnName
```

### Change Data Type
```
ALTER TABLE tableName ALTER COLUMN columnName datatype()
```

### Change default or nullability
```
ALTER TABLE tableName
ALTER COLUMN columnName datatype() NULL;

ALTER TABLE tableName
ADD DEFAULT ‘default text’ FOR columnName;
```

### Change constraints
```
ALTER TABLE tableName
ADD CONSTRAINT constraintName CHECK (check statement)

ALTER TABLE tableName
DROP CONSTRAINT constraintName
```

## WHERE
### LIKE
```
WHERE column LIKE '%pattern%'
```

### IN
```
WHERE column in (‘string’, ‘string’)
```

* Show all fields where column is equal to null
```
WHERE column is null
```

## GROUP BY
```
SELECT column
FROM table
GROUP BY column
```

```
SELECT column
	aggregate(column * constant);
FROM table
GROUP BY column
HAVING aggregate(column * constant) <>= condition;
```

### Aggregate Functions
* SUM
* AVG
* COUNT
```
SELECT 
	aggregate(column) as [alias]
FROM table
JOIN table_fk
ON table_fk.id = table.fk_id
GROUP BY column;
```