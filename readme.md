## Project Flyer

Focused on my improvement as a developer, the Project Flyer follows many of the techniques tought by Jeffrey Way on his site Laracasts.

**Important note!** Site has being updated to GitHub to show how I'm working under a developement environment, not a production one.

## Technologies

Developed with [Laravel 5.2](http://laravel.com/docs).

Also used:
- Bootstrap 3
- jQuery

## Dev. status

Currently working on this project, so stay tunned for more updates.

## Design patterns and good practices applied

Some of good practices and techniques applied are:

##### Query scopes

```
public function scopeLocatedAt($query,$zip, $street)
{
    return $query->where(compact('zip','street'))->firstOrFail();
}
```

##### Mutators

```
public function getPriceAttribute($price)
{
    return number_format($price,2,',','.') . '€';
}
```

##### Named routes

```
action="{{ route('store_photo_path',['zip' => $flyer->zip, 'street' => $flyer->street]) }}"
```

##### ACL

Laravel's Gates allows to create ACL:

```
$gate->define('upload-images', function($user, $flyer){
    return $user->id == $flyer->user_id;
});
```

ACL also used on Blade:

```
@can('upload-images',$flyer)
    // ...
@endcan
```

##### Middlewares

Middlewares are used for authorization:

```
public function __construct()
{
    $this->middleware('auth',['except' => 'show']);
}
```

##### RESTful api

Simply routing on a RESTful way but also taking care about SEO good practices

```
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'PagesController@home');
	Route::resource('flyers','FlyersController');	

	Route::get('{zip}/{street}','FlyersController@show');
	Route::post('{zip}/{street}/photos',['as' => 'store_photo_path','uses' => 'PhotosController@store']);
});
```

##### PSR2

Code styled following many of the PSR2 recommendations. Stil pending some comments about the ins and outs for each method.

## More about me

You can find more info about me at [Linkedin](http://es.linkedin.com/in/joseantoniocuenca).

My reputation level in Stack Overflow is 68, with 12 badges won, check [my Stack Overflow profile] (http://stackoverflow.com/users/2172942/joss).
