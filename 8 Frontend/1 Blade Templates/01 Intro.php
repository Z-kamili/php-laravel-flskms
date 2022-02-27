<?php
/*
1 Blade Templates
  Powerful templating engine provided with Laravel.
  You can also use plain PHP Code in Views
  Blade views are compiled into plain PHP code and cached until they are modified, 
  .blade.php file extension and are typically stored in the resources/views directory.


2 Template Inheritance
  2.1 Defining A Layout

  The @section directive, as the name implies, defines a section of content, while the @yield directive is used to display the contents of a given section.
*/

        <!-- Stored in resources/views/layouts/app.blade.php -->

        <html>
            <head>
                <title>App Name - @yield('title')</title>
            </head>
            <body>
                @section('sidebar')
                    This is the master sidebar.
                @show

                <div class="container">
                    @yield('content')
                </div>
            </body>
        </html>

/*        
  2.2 Extending A Layout
  When defining a child view, use the Blade @extends

*/
<!-- Stored in resources/views/child.blade.php -->

    @extends('layouts.app')

    @section('title', 'Page Title')

    @section('sidebar')
        @parent

        <p>This is appended to the master sidebar.</p>
    @endsection

    @section('content')
        <p>This is my body content.</p>
    @endsection
