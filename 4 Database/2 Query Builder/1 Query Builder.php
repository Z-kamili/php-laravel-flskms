1 Introduction
  The Laravel query builder uses PDO parameter binding to protect your application against SQL injection attacks. There is no need to clean strings being passed as bindings.


2 Retrieving Results

  2.1 Retrieving All Rows From A Table
  You may use the table method on the DB facade to begin a query. The table method returns a fluent query builder instance for the given table,
  <?php
  namespace App\Http\Controllers;

  use App\Http\Controllers\Controller;
  use Illuminate\Support\Facades\DB;

  class UserController extends Controller
  {
      /**
      * Show a list of all of the application's users.
      *
      * @return Response
      */
      public function index()
      {
          $users = DB::table('users')->get();

          return view('user.index', ['users' => $users]);
      }
  }


The get method returns an Illuminate\Support\Collection containing the results where each result is an instance of the PHP stdClass object.
foreach ($users as $user) {
    echo $user->name;
}
?>

2.2 Retrieving A Single Row / Column From A Table
If you just need to retrieve a single row from the database table, you may use the first method. 
<?php
$user = DB::table('users')->where('name', 'John')->first();
echo $user->name;
?>



If you don't even need an entire row, you may extract a single value from a record using the value method. 
<?php
$email = DB::table('users')->where('name', 'John')->value('email');
?>



To retrieve a single row by its id column value, use the find method:
<?php $user = DB::table('users')->find(3); ?>




Retrieving A List Of Column Values
If you would like to retrieve a Collection containing the values of a single column, you may use the pluck method. In this example, we'll retrieve a Collection of role titles:
<?php
$titles = DB::table('roles')->pluck('title');

foreach ($titles as $title) {
    echo $title;
}
?>









