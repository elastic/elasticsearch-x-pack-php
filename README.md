elasticsearch-watcher-php
=================

This repository contains the official Watcher namespace module for Elasticsearch-PHP.  It is an optional module which
adds new APIs to the client if you are using Watcher.

Version Matrix
--------------

| Elasticsearch-php Version | Elasticsearch-Watcher-PHP Branch |
| --------------------- | ------------------------ |
| 2.0 (unreleased)   | 2.0                   |
| 1.0        | 1.0                      |

If you are using the 1.x version of Elasticsearch-PHP, you should use the 1.x branch of the Watcher module.  If you are
using 2.x version of Elasticsearch-php, use the 2.x branch of the Watcher module.


Installation
------------
This module is a set of additional API endpoints that can be accessed by the Elasticsearch-PHP client.  It is not a
standalone client, so make sure you have the `elasticsearch/elasticsearch` client in your `composer.json`.  Then simply
add the watcher module:


```json
{
    "require": {
        "elasticsearch/elasticsearch": "~1.0",
        "elasticsearch/watcher" : "~1.0"
    }
}
```

Then update your installation:


```bash
    php composer.phar update
```


Using Watcher
-----

Now that the Watcher namspace is installed, we need to inject it into the client library:



```php
use Watcher\WatcherNamespace;

$params = array(
    'hosts => array('localhost:9200'),
    'customNamespaces' => array(
        'watcher' => 'Watcher\WatcherNamespace' // Inject the WatcherNamespace with the 'watcher' name
    )
);
$client = new Elasticsearch\Client($params);
```

After the client has been initialized, you can invoke the `watcher()` namespace just like any other namespace:

```php
// Get watcher information
$watcherInfo = $client->watcher()->info();

// Get watcher stats
$watcherStats = $client->watcher()->stats();

// Add a new watch
$body = '{
 "trigger": {
   "schedule": {
     "hourly": {
       "minute": [ 0, 5 ]
       }
     }
 },
 "input": {
   "simple": {
     "payload": {
       "send": "yes"
     }
   }
 },
 "condition": {
   "always": {}
 },
 "actions": {
   "test_index": {
     "index": {
       "index": "test",
       "doc_type": "test2"
     }
   }
 }
}'
$params = array(
    'id' => 'my_watch_id',
    'body' => $body
);
$response = $client->watcher()->putWatch($params);
```


Available Licenses
-------

Elasticsearch-Watcher-PHP is available under two licenses: Apache v2.0 and LGPL v2.1.

The user may choose which license they wish to use.  Since there is no discriminating executable or distribution bundle
to differentiate licensing, the user should document their license choice externally, in case the library is re-distributed.
If no explicit choice is made, assumption is that redistribution obeys rules of both licenses.

### Contributions
All contributions to the library are to be so that they can be licensed under both licenses.

Apache v2.0 License:
>Copyright 2013-2014 Elasticsearch
>
>Licensed under the Apache License, Version 2.0 (the "License");
>you may not use this file except in compliance with the License.
>You may obtain a copy of the License at
>
>    http://www.apache.org/licenses/LICENSE-2.0
>
>Unless required by applicable law or agreed to in writing, software
>distributed under the License is distributed on an "AS IS" BASIS,
>WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
>See the License for the specific language governing permissions and
>limitations under the License.

LGPL v2.1 Notice:
>Copyright (C) 2013-2014 Elasticsearch
>
>This library is free software; you can redistribute it and/or
>modify it under the terms of the GNU Lesser General Public
>License as published by the Free Software Foundation; either
>version 2.1 of the License, or (at your option) any later version.
>
>This library is distributed in the hope that it will be useful,
>but WITHOUT ANY WARRANTY; without even the implied warranty of
>MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
>Lesser General Public License for more details.
>
>You should have received a copy of the GNU Lesser General Public
>License along with this library; if not, write to the Free Software
>Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
