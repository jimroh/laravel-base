#Laravel Base Installation for Linux / Mac OSX (Darwin Linux):

##Version: 4.2.x

###Additional Libraries Included:
* Twitter Bootstrap 3, 
* jQuery 1.x (for older versions of IE, not loaded)
* jQuery 2.x, 
* AngularJs 1.3.x, 
* jQuery Scroll to Top (extras.min.css loaded for this plugin), 
* json3 (for older versions of IE, not loaded)
* Font-Awesome (not loaded)

###IE 6, 7, 8 Note:
If supporting older versions of IE, remove jQuery 2.x, add jQuery 1.x and add this markup to main.blade.php

```
<!--[if lte IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/json3.min.js"></script>
<![endif]-->
```


#Instructions

1. Install [Composer](https://getcomposer.org/doc/00-intro.md) if you have not already done so.
2. Clone this repository.
3. Add an [.env.local.php](http://laravel.com/docs/4.2/configuration#protecting-sensitive-configuration) file to the root of your repository (described later in this README).
3. Update this Laravel installation and dependencies by doing a *composer update* from the root of your repository directory. You might want to do a *composer self-update* first if you have not updated your composer installation in over 30 days. The commands may differ depending on how you install / link Composer (composer vs. composer.phar).
4. Generate a new application key with `php artisan key:generate` from your repository root.
5. Set up your web server configuration for this repository / directory.
6. Make sure your permissions are correct on your directories and files so that your web server has access to them. You might want to set ACL's on your directories as well.
7. Go to your GitHub account and create a new repository. *Do not* initialize it with a README.md
8. On your local machine in the root where this repository was cloned, remove the .git directory, re-initialize this repository as your own with `git init`, set your remote with `git remote add origin your-repository-uri-here`, add files with `git add --all`, commit the files with `git commit -m "initial commit"` and then push to your new repository with `git push origin master`.


##Other Things to Note:

1. Namespacing has been added. You must do a `php artisan dump-autoload` before running Laravel in a browser.
2. You must set up your own Database. The Laravel Homestead Setup is currently the default.
3. Local debugging has been turned on. It must be turned off manually.
4. You must include the font awesome css file manually.


##The following files have been added or modified. 

###Please examine each change.

All Paths are relative to the root of your repository.

####app/routes.php

```
// Home Route
Route::get(
    '/', 
    ['as' => 'home.get', 'uses' => 'Controllers\HomeController@getHome']
);
```

####bootstrap/start.php

```
$env = $app->detectEnvironment(array(

    'local' => array(gethostname()),
    'production' => array('changeme.com'),

));
```

####app/config/local/database.php

```
'mysql' => array(
    'driver'    => 'mysql',
    'host'      => $_ENV['MYSQL_DB_HOST'],
    'database'  => $_ENV['MYSQL_DB_NAME'],
    'username'  => $_ENV['MYSQL_DB_USER'],
    'password'  => $_ENV['MYSQL_DB_PASSWORD'],
    'charset'   => $_ENV['MYSQL_DB_CHARSET'],
    'collation' => $_ENV['MYSQL_DB_COLLATION'],
    'prefix'    => $_ENV['MYSQL_DB_PREFIX'],
),
```

####.env.local.php
#####You must add this file your self to the root of your repository. 

It has already been added to .gitignore, so it is not included in the Laravel-Base repository.

When going to production, you must transfer the config in app/config/local/database.php to app/config/database.php
and create an .env.php file.

```
return 
    array(
        'MYSQL_DB_HOST'         => 'localhost',
        'MYSQL_DB_NAME'         => 'homestead',
        'MYSQL_DB_USER'         => 'homestead',
        'MYSQL_DB_PASSWORD'     => 'secret',
        'MYSQL_DB_CHARSET'      => 'utf8',
        'MYSQL_DB_COLLATION'    => 'utf8_unicode_ci',
        'MYSQL_DB_PREFIX'       => ''
    );
```

####app/start/global.php

```
App::missing(function($exception)
{
    return Response::view('error.missing', array(), 404);
});
```
    
####app/views/hello.php -> removed.
####.gitignore -> .env.local.php added.
####app/controllers/HomeController.php -> modified
####app/views/layouts/main.blade.php -> added
####app/views/home/home.blade.php -> added
####app/views/error/missing.blade.php -> added
####app/views/subviews/messages.blade.php -> added