Laravel Coding Practices

- [1. Introduction](#1-introduction)
- [2. Scope](#2-scope)
- [3. Purpose](#3-purpose)
- [4. Best Practices](#4-best-practices)
  - [4.1. Naming Conventions](#41-naming-conventions)
    - [4.1.1. Controller](#411-controller)
    - [4.1.2. Route](#412-route)
      - [4.1.2.1. Route Url](#4121-route-url)
      - [4.1.2.2. Route Name](#4122-route-name)
    - [4.1.3. DataBase](#413-database)
      - [4.1.3.1. Table](#4131-table)
      - [4.1.3.2. Pivot Table](#4132-pivot-table)
      - [4.1.3.3. Table Columns](#4133-table-columns)
      - [4.1.3.4. Foreign key](#4134-foreign-key)
      - [4.1.3.5. Primary key](#4135-primary-key)
    - [4.1.4. Model](#414-model)
      - [4.1.4.1. Model Single relations](#4141-model-single-relations)
      - [4.1.4.2. Model all other relations and methods](#4142-model-all-other-relations-and-methods)
    - [4.1.5. Functions](#415-functions)
    - [4.1.6. Variables](#416-variables)
    - [4.1.7. Collection](#417-collection)
    - [4.1.8. Configs](#418-configs)
  - [4.2. Single responsibility principle](#42-single-responsibility-principle)
  - [4.3. Validation](#43-validation)
  - [4.4. Use Eloquent over using Query Builder and raw SQL queries](#44-use-eloquent-over-using-query-builder-and-raw-sql-queries)
  - [4.5. Use shorter and more readable syntax where possible](#45-use-shorter-and-more-readable-syntax-where-possible)
  - [4.6. Do not get data from the `.env` file directly](#46-do-not-get-data-from-the-env-file-directly)
  - [4.7. Store data in the standard format](#47-store-data-in-the-standard-format)
  - [4.8. Business logic should be in service class](#48-business-logic-should-be-in-service-class)
  - [4.9. Don't repeat code](#49-dont-repeat-code)
  - [4.10. Use Middleware](#410-use-middleware)
  - [4.11. Sanitize the request more using the data in request](#411-sanitize-the-request-more-using-the-data-in-request)
  - [4.12. Always try to find solution with the framework](#412-always-try-to-find-solution-with-the-framework)
  - [4.13. Always Write Documentation of classes and methods](#413-always-write-documentation-of-classes-and-methods)
  - [4.14. Separate Credentials / Tokens for development and production](#414-separate-credentials--tokens-for-development-and-production)
  - [4.15. Always perform check before accessing data](#415-always-perform-check-before-accessing-data)
  - [4.16. Always follow official documentation](#416-always-follow-official-documentation)
  - [4.17. Always use official packages](#417-always-use-official-packages)

# 1. Introduction

This is documentation will help developer in understanding and adopting the best practices which writing the code.

# 2. Scope

Scope of this document is describe the best practices and standards for writing the code.

# 3. Purpose

The purpose of this documentation is same practices should be followed will writing any piece of code. Will help in writing more understandable and readable code.

# 4. Best Practices

## 4.1. Naming Conventions

When it comes to be best practices we will start with naming convention of the which should be followed in code.

Follow [PSR standards](http://www.php-fig.org/psr/psr-2/).

 Also, follow naming conventions accepted by Laravel community:

 What | How | Good | Bad
------------ | ------------- | ------------- | -------------
Controller | singular | ArticleController | ~~ArticlesController~~
Route | plural | articles/1 | ~~article/1~~
Named route | snake_case with dot notation | users.show_active | ~~users.show-active, show-active-users~~
Model | singular | User | ~~Users~~
hasOne or belongsTo relationship | singular | articleComment | ~~articleComments, article_comment~~
All other relationships | plural | articleComments | ~~articleComment, article_comments~~
Table | plural | article_comments | ~~article_comment, articleComments~~
Pivot table | singular model names in alphabetical order | article_user | ~~user_article, articles_users~~
Table column | snake_case without model name | meta_title | ~~MetaTitle; article_meta_title~~
Model property | snake_case | $model->created_at | ~~$model->createdAt~~
Foreign key | singular model name with _id suffix | article_id | ~~ArticleId, id_article, articles_id~~
Primary key | - | id | ~~custom_id~~
Migration | - | 2017_01_01_000000_create_articles_table | ~~2017_01_01_000000_articles~~
Method | camelCase | getAll | ~~get_all~~
Method in resource controller | [table](https://laravel.com/docs/master/controllers#resource-controllers) | store | ~~saveArticle~~
Method in test class | camelCase | testGuestCannotSeeArticle | ~~test_guest_cannot_see_article~~
Variable | snake_case | $articlesWithAuthor | ~~$articles_with_author~~
Collection | descriptive, plural | $activeUsers = User::active()->get() | ~~$active, $data~~
Object | descriptive, singular | $activeUser = User::active()->first() | ~~$users, $obj~~
Config and language files index | snake_case | articles_enabled | ~~ArticlesEnabled; articles-enabled~~
View | kebab-case | show-filtered.blade.php | ~~showFiltered.blade.php, show_filtered.blade.php~~
Config | snake_case | google_calendar.php | ~~googleCalendar.php, google-calendar.php~~
Contract (interface) | adjective or noun | AuthenticationInterface | ~~Authenticatable, IAuthentication~~
Trait | adjective | Notifiable | ~~NotificationTrait~~

### 4.1.1. Controller

The naming convention for controller should be as following:

- Name should be in singular form.
- Should use PascalCase.

```php
CustomerController.php
```

### 4.1.2. Route

The naming convention for route urls and route names should be followed properly.

#### 4.1.2.1. Route Url

- Url should be in plural form.
- Can use kebab-case if there are two words in single part For best Practice.

```php
/customers/password-reset
```

#### 4.1.2.2. Route Name

- Should use snake_case with dot notation.
- Better to use same name like in URL.

```php
->('customers.password_reset')
```

### 4.1.3. DataBase

To understanding the structure of database naming convention plays a big role in it. Naming convention for Database should be as following:

#### 4.1.3.1. Table

- Table name must be in plural form.
- Should use snake_case.

```sql
customers
cart_items
```

#### 4.1.3.2. Pivot Table

- Table name must be in singular form.
- Should use snake_case
- Names should be in alphabetical Order.

```sql
course_student
```

#### 4.1.3.3. Table Columns

- Should use snake_case.
- Should not use table name with column names.
- Readable name can use for better practice.

```sql
first_name
```

#### 4.1.3.4. Foreign key

- Should use snake_case.
- Should use singular table name with id prefix.

```sql
course_id
```

#### 4.1.3.5. Primary key

- only use name as id.

```sql
id
```

### 4.1.4. Model

- Model name must be in singular form.
- Should Use PascalCase
- Model name must be a singular form or table name.

```php
Customer
```

#### 4.1.4.1. Model Single relations

Example: Has One, Belongs To

- Method name must be in singular form.
- Should Use camalCase

```php
studentCourse
```

#### 4.1.4.2. Model all other relations and methods

Example: Has Many,other

- Method name must be in plural form.
- Should use camalCase

```php
cartItems
```

### 4.1.5. Functions

- Should Use camalCase
- Should not exceed morethan 12 lines of code

```php
showRoute
```

### 4.1.6. Variables

- Should use snake_case
- Must use readable words which are describe about value.

```php
$customer_messages
```

### 4.1.7. Collection

- Must described about the value.
- Must be plural

```php
$verifiedCustomers
```

### 4.1.8. Configs

- Should use snake_case
- Must described about the value.

```php
comments_enabled
```

## 4.2. Single responsibility principle

A class and a method should have only one responsibility. If a class or method is doing more than 1 task then it should be divided in more sub methods. If you method is longer than 12 lines it is not doing task and needs to be rewritten.

Bad:

```php
public function getFullNameAttribute()
{
    if (auth()->user() && auth()->user()->hasRole('client') && auth()->user()->isVerified()) {
        return 'Mr. ' . $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    } else {
        return $this->first_name[0] . '. ' . $this->last_name;
    }
}
```

Good:

```php
public function getFullNameAttribute()
{
    return $this->isVerifiedClient() ? $this->getFullNameLong() : $this->getFullNameShort();
}

public function isVerifiedClient()
{
    return auth()->user() && auth()->user()->hasRole('client') && auth()->user()->isVerified();
}

public function getFullNameLong()
{
    return 'Mr. ' . $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
}

public function getFullNameShort()
{
    return $this->first_name[0] . '. ' . $this->last_name;
}
```

## 4.3. Validation

We should avoid addition of validation rules in Controllers and use `FormRequest` for validation

Move validation from controllers to Request classes.

Bad:

```php
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|unique:posts|max:255',
        'body' => 'required',
        'publish_at' => 'nullable|date',
    ]);

    ....
}
```

Good:

```php
public function store(PostRequest $request)
{    
    ....
}

class PostRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'publish_at' => 'nullable|date',
        ];
    }
}
```

## 4.4. Use Eloquent over using Query Builder and raw SQL queries

Eloquent allows you to write readable and maintainable code. Also, Eloquent has great built-in tools like soft deletes, events, scopes etc.

Bad:

```sql
SELECT *
FROM `articles`
WHERE EXISTS (SELECT *
              FROM `users`
              WHERE `articles`.`user_id` = `users`.`id`
              AND EXISTS (SELECT *
                          FROM `profiles`
                          WHERE `profiles`.`user_id` = `users`.`id`) 
              AND `users`.`deleted_at` IS NULL)
AND `verified` = '1'
AND `active` = '1'
ORDER BY `created_at` DESC
```

Good:

```php
Article::has('user.profile')->verified()->latest()->get();
```

## 4.5. Use shorter and more readable syntax where possible

Bad:

```php
$request->session()->get('cart');
$request->input('name');
```

Good:

```php
session('cart');
$request->name;
```

More examples:

Common syntax | Shorter and more readable syntax
------------ | -------------
`Session::get('cart')` | `session('cart')`
`$request->session()->get('cart')` | `session('cart')`
`Session::put('cart', $data)` | `session(['cart' => $data])`
`$request->input('name'), Request::get('name')` | `$request->name, request('name')`
`return Redirect::back()` | `return back()`
`is_null($object->relation) ? null : $object->relation->id` | `optional($object->relation)->id`
`return view('index')->with('title', $title)->with('client', $client)` | `return view('index', compact('title', 'client'))`
`$request->has('value') ? $request->value : 'default';` | `$request->get('value', 'default')`
`Carbon::now(), Carbon::today()` | `now(), today()`
`App::make('Class')` | `app('Class')`
`->where('column', '=', 1)` | `->where('column', 1)`
`->orderBy('created_at', 'desc')` | `->latest()`
`->orderBy('age', 'desc')` | `->latest('age')`
`->orderBy('created_at', 'asc')` | `->oldest()`
`->select('id', 'name')->get()` | `->get(['id', 'name'])`
`->first()->name` | `->value('name')`

## 4.6. Do not get data from the `.env` file directly

Pass the data to config files instead and then use the `config()` helper function to use the data in an application.

Bad:

```php
$apiKey = env('API_KEY');
```

Good:

```php
// config/api.php
'key' => env('API_KEY'),

// Use the data
$apiKey = config('api.key');
```

## 4.7. Store data in the standard format

Data should be stored with proper standard Example we can used a date standard for timestamps `YYYY-MM-DD`

## 4.8. Business logic should be in service class

A controller must have only one responsibility, so move business logic from controllers to service classes.

Bad:

```php
public function store(Request $request)
{
    if ($request->hasFile('image')) {
        $request->file('image')->move(public_path('images') . 'temp');
    }
    
    ....
}
```

Good:

```php
public function store(Request $request)
{
    $this->articleService->handleUploadedImage($request->file('image'));

    ....
}

class ArticleService
{
    public function handleUploadedImage($image)
    {
        if (!is_null($image)) {
            $image->move(public_path('images') . 'temp');
        }
    }
}
```

## 4.9. Don't repeat code

We should avoid repetition of code. If save code is required in multiple places then that code should moved to new method and reused where required.

## 4.10. Use Middleware

There are times where we need to perform such task where we need to add more data to request before in reaches controller we should use middleware for that purpose in of do this in controllers

## 4.11. Sanitize the request more using the data in request

While saving the data which is received in request we should make sure that is properly sanitized before it gets used.

## 4.12. Always try to find solution with the framework

While writing the code we should make sure that we should we build tool provided by framework instead of writing them or using any third party to perform task.

## 4.13. Always Write Documentation of classes and methods

When ever a new class or method is made we should make sure that it is documented properly with information what is purpose for that method what are parameters that method is expecting and what is return type for that method.

```php
/**
     * Return true if the given $str is a valid json, false otherwise
     *
     * @param  string  $str
     * @return boolean
     */
    function is_valid_json($str)
    {
        json_decode($str);
        return (json_last_error() == JSON_ERROR_NONE);
    }
```

## 4.14. Separate Credentials / Tokens for development and production

While writing the code we should make sure that we should make sure that any credentials and tokens should not be used on production which are on development.

## 4.15. Always perform check before accessing data

We should make sure that we are performing check on variable before access data from that variable.

```php

$data=[];
if(!empty($data)){
  $first=$data[0];
}

```

## 4.16. Always follow official documentation

While writing the code we should not only believe and follow official documentation only.

## 4.17. Always use official packages

While writing code there are many time we use a external package to perform a special task. While using that external package we need to make that package is official provided and framework or library and get it approved by security team for vulnerabilities and data theft. 
