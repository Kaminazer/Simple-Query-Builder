# Simple-Query-Builder
### Installation
Змінити параметри підключення до бази даних на власні в файлі config/db.ini
Запустити проект

### Usage

```php
<?php
use Builder\Db;
use Builder\QueryBuilder;

$db = new Db();
$queryBuilder = new QueryBuilder();
$query = $queryBuilder->setDb($db)
    ->table('users')
    ->select(['first_name', 'age'])
    ->where(['age' => 20])
    ->getQuery();
$user = $query->all();
```
