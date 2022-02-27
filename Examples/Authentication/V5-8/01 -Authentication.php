Laravel Authentication
https://www.expertsphp.com/laravel-authentication/

  The authentication is made to secure users in Laravel. By running the command of authentication in laravel, you can easily create a login and registration form and save the value to the database. It is very easy to create user authentication in laravel.

  In order to create a login and registration form laravel has to run a command named auth.As soon as the command runs, resources / views / auth in this directry the file named login and registration is automatically created.


  Laravel Auth Command:-
  php artisan make:auth

  After running this command, the file named User.php is created automatically in your app directry.Which is known by the name of the model. This model file will have some code written in this way.

  <?php
  namespace App;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  class User extends Authenticatable
  {
  protected $fillable = [
  'name', 'email', 'password',
  ];
  protected $hidden = [
  'password', 'remember_token',
  ];
  }

  And in the controller directry, auth name of authController will be created inside the folder named auth.In AuthController file, you can add additional fields and add values ​​to the database.

  Whatever field you will add to AuthController file, you’ll have to define those fields as you like, you can see above 3 fields have been added, this field is bydefault when we run a command named auth, then this field bydefault gets add.

  App/Http/Controllers/Auth/AuthController.php
  AuthController.php

    <?php
  namespace App\Http\Controllers\Auth;
  use App\User;
  use Validator;
  use App\Http\Controllers\Controller;
  use Illuminate\Foundation\Auth\ThrottlesLogins;
  use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
  class AuthController extends Controller
  {
  /*
  |--------------------------------------------------------------------------
  | Registration & Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users, as well as the
  | authentication of existing users. By default, this controller uses
  | a simple trait to add these behaviors. Why don't you explore it?
  |
  */
  use AuthenticatesAndRegistersUsers, ThrottlesLogins;
  /**
  * Where to redirect users after login / registration.
  *
  * @var string
  */
  protected $redirectTo = '/';
  /**
  * Create a new authentication controller instance.
  *
  * @return void
  */
  public function __construct()
  {
  $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }
  /**
  * Get a validator for an incoming registration request.
  *
  * @param array $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data)
  {
  return Validator::make($data, [
  'first_name' => 'required|max:255',
  'email' => 'required|email|max:255|unique:users',
  'password' => 'required|min:6|confirmed',
  ]);
  }
  /**
  * Create a new user instance after a valid registration.
  *
  * @param array $data
  * @return User
  */
  protected function create(array $data)
  {
  return User::create([
  'first_name' => $data['first_name'],
  'email' => $data['email'],
  'password' => bcrypt($data['password']),
  'password_confirmation' => $data['password_confirmation'],
  /**
  * Extra field add.
  */
  'last_name' => $data['last_name'],
  'gender' => $data['gender'],
  ]);
  }
  }

Whatever extra 2 field is added, the lastname and gender will also be defined in the model, how to define it in the model. You can see in the example given below.

  <?php
  namespace App;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  class User extends Authenticatable
  {
  protected $fillable = [
  'name', 'email', 'password','last_name'.'gender',
  ];
  protected $hidden = [
  'password', 'remember_token',
  ];
  }