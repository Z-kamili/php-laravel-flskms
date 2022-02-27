3 Chunking results
  This method retrieves a small chunk of the results at a time and feeds each chunk into a Closure for processing. 
  For example, let's work with the entire users table in chunks of 100 records at a time:

  DB::table('users')->orderBy('id')->chunk(100, function ($users) {
      foreach ($users as $user) {
          //
      }
  });

  You may stop further chunks from being processed by returning false from the Closure:

  DB::table('users')->orderBy('id')->chunk(100, function ($users) {
      // Process the records...

      return false;
  });


  If you are updating database records while chunking results, your chunk results could change in unexpected ways. So, when updating records while chunking, it is always best to use the chunkById method instead. This method will automatically paginate the results based on the record's primary key:
  DB::table('users')->where('active', false)
    ->chunkById(100, function ($users) {
        foreach ($users as $user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['active' => true]);
        }
    });