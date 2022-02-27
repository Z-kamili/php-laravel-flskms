<?php

Selects
Specifying A Select Clause
You may not always want to select all columns from a database table. Using the select method, you can specify a custom select clause for the query:

$users = DB::table('users')->select('name', 'email as user_email')->get();
The distinct method allows you to force the query to return distinct results:

$users = DB::table('users')->distinct()->get();
If you already have a query builder instance and you wish to add a column to its existing select clause, you may use the addSelect method:

$query = DB::table('users')->select('name');

$users = $query->addSelect('age')->get();
