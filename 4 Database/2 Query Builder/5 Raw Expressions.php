<?php

1 Raw Expressions
Sometimes you may need to use a raw expression in a query. To create a raw expression, you may use the DB::raw method:

$users = DB::table('users')
                     ->select(DB::raw('count(*) as user_count, status'))
                     ->where('status', '<>', 1)
                     ->groupBy('status')
                     ->get();

Note
Raw statements will be injected into the query as strings, so you should be extremely careful to not create SQL injection vulnerabilities.



2 Raw Methods
Instead of using DB::raw, you may also use the following methods to insert a raw expression into various parts of your query.

  selectRaw
  The selectRaw method can be used in place of addSelect(DB::raw(...)). This method accepts an optional array of bindings as its second argument:

  $orders = DB::table('orders')
                  ->selectRaw('price * ? as price_with_tax', [1.0825])
                  ->get();
  whereRaw / orWhereRaw
  The whereRaw and orWhereRaw methods can be used to inject a raw where clause into your query. These methods accept an optional array of bindings as their second argument:

  $orders = DB::table('orders')
                  ->whereRaw('price > IF(state = "TX", ?, 100)', [200])
                  ->get();
  havingRaw / orHavingRaw
  The havingRaw and orHavingRaw methods may be used to set a raw string as the value of the having clause. These methods accept an optional array of bindings as their second argument:

  $orders = DB::table('orders')
                  ->select('department', DB::raw('SUM(price) as total_sales'))
                  ->groupBy('department')
                  ->havingRaw('SUM(price) > ?', [2500])
                  ->get();
  orderByRaw
  The orderByRaw method may be used to set a raw string as the value of the order by clause:

  $orders = DB::table('orders')
                  ->orderByRaw('updated_at - created_at DESC')
                  ->get();
  groupByRaw
  The groupByRaw method may be used to set a raw string as the value of the group by clause:

  $orders = DB::table('orders')
                  ->select('city', 'state')
                  ->groupByRaw('city, state')
                  ->get();