Aggregates
The query builder also provides a variety of aggregate methods such as count, max, min, avg, and sum. You may call any of these methods after constructing your query:

  $users = DB::table('users')->count();

  $price = DB::table('orders')->max('price');

  You may combine these methods with other clauses:

  $price = DB::table('orders')
                  ->where('finalized', 1)
                  ->avg('price');



Determining If Records Exist
  Instead of using the count method to determine if any records exist that match your query's constraints, you may use the exists and doesntExist methods:

  return DB::table('orders')->where('finalized', 1)->exists();

  return DB::table('orders')->where('finalized', 1)->doesntExist();