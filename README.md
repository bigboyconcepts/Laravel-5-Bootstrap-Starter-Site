# WORK IN PROGRESS - Do not use
## You have been warned

## Laravel 5 Bootstrap Starter Site



## Official Documentation


## Database migrations

### Suggestion use Innodb
In general, innodb is a better mysql engine. By default the migrations do not specify to use it.
Here are the steps to make it the default. It's important to make these changes before you run 
the migrations.

For example, from the `post` migration:

```php
Schema::create('posts', function(Blueprint $table)
{
    $table->increments('id')->unsigned();
    $table->string('title');
    [...]
});
```
Add the engine. See the first line within the brackets:
```php
Schema::create('posts', function(Blueprint $table)
{
    $table->engine = 'InnoDB';
    $table->increments('id')->unsigned();
    $table->string('title');
    [...]
});
```

## Contributing

Thank you for considering contributing to the Laravel 5 Bootstrap Starter Site! The contribution guide is the same as
Laravel can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

### License

The Laravel 5 Starter Site is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

This starter site includes other licensed software. Those licenses can be found in the `licenses` directory with the specific
license and general description of use.

### Thanks

Many of the backend options and setup are influenced by or use pieces from
[Graham Campbell](https://github.com/GrahamCampbell)'s various works. His [CMS](https://github.com/BootstrapCMS/CMS)
is worth a look as it's a more complete piece of software. Graham is an amazing resource for the Laravel Community;
Many thanks go out to him.

The Bootstrap templates are pulled from [Start Bootstrap](http://startboostrap.com)

[Frontend](http://ironsummitmedia.github.io/startbootstrap-modern-business/)
[Admin](http://ironsummitmedia.github.io/startbootstrap-sb-admin-2/)


