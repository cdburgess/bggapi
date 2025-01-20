# PHP - BGG API


[![GitHub tag](https://img.shields.io/github/tag/cdburgess/bggapi.svg)](https://github.com/cdburgess/bggapi/blob/master/tags)
[![GitHub license](https://img.shields.io/github/license/cdburgess/bggapi.svg)](https://github.com/cdburgess/bggapi/blob/main/LICENSE)
[![build](https://github.com/cdburgess/bggapi/actions/workflows/php.yml/badge.svg?branch=master)](https://github.com/cdburgess/bggapi/actions/workflows/php.yml)
![Packagist Downloads](https://img.shields.io/packagist/dt/cdburgess/bggapi)

This project provides several request classes to interact with the BGG XML API2. Below are examples of how to run each type of request.

## Requests
To submit a request to an endpoint on BoardGameGeek, simply create the request
resource for the endpoint you desire. For example, if you want to request a specific
board game, you create the `thing` request as follows:

```php
$thing = new Thing();
```

Once you have the request object, you can set the various parameters for that request
by referencing the method of the parameter name. For example, if you want to request 
the `Nemesis (2018)` board game, you set the id as follows:

```php 
$this->id(167355);
```

To send the request to the API, simply call send.
```php
$data = $thing->send();
```

You can also combine this into a single request.

```php
$thing = new Thing();
$data = $thing->id(167355)
    ->send();
```

## Data Formats
By default, the request will return a `SimpleXMLElement` file.
There are two other supported formats: array and JSON. You can request 
these formats by calling their supported `to` methods.

```php
$thing = new Thing();
$dataArray = $thing->id(167355)
    ->toArray()
    ->send();
```
```php
$thing = new Thing();
$dataJson = $thing->id(167355)
    ->toJson()
    ->send();
```

### Request Options

```php
$collection = new Collection();
$family = new Family();
$forumList = new ForumList();
$forum = new Forum();
$hot = new Hot();
$plays = new Plays();
$search = new Search();
$thing = new Thing();
$thread = new Thread();
$user = new User();
```


