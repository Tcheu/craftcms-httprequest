# HTTP Request plugin for Craft CMS

Create and send HTTP requests and retrieve the response, in JSON or plain text.

## Installation

1. Copy the "httpreq" directory into "craft/plugins".
2. Open the control panel and go to "Settings > Plugins".
3. Install the "HTTP Request" plugin.

## Usage

Once the plugin has been installed, you may access it through the "craft.httpReq" variable in the templates.
Here is an overview of the available methods:

### get

Sends a GET request to the specified endpoint.

Parameters:

- url: Complete URL to which you want to send the request
- params: Hash containing the parameters names and values
- fromCache: Boolean to specify if the response should be fetch from cache. True by default.

Example:

	craft.httpReq.get('http://domain.com/api/test', { "lang" : "fr" }, false)

This code will try to make a GET request to http://domain.com/api/test?lang=fr without trying to get the response from cache.

	{
		"statusCode": 200,
		"body": (parsed JSON object),
		"erro": "Contains the error message, if any"
	}

### post

Sends a POST request to the specified endpoint.
POST requests are never fetched from cache.

Parameters:

- url: Complete URL to which you want to send the request
- params: Hash containing the parameters names and values
- files: A hash containing file input names and their corresponding handles.

Example:

	craft.httpReq.post('http://domain.com/api/test', { "fname" : "John", "lname" : "Doe" }, { "cv": (UploadFile) })

This code will try to make a POST request to http://domain.com/api/test with the following parameters encoded using multipart/form-data: fname, lname, cv. The value for the CV parameter is the content of the file.

Return value:

	{
		"statusCode": 200,
		"body": (parsed JSON object),
		"erro": "Contains the error message, if any"
	}

### setCacheTtl

To be called before a request is being done. It can be used to specify the number of seconds during which the cache should be active.

Parameters:

- ttl: Integer. Number of seconds during which the elements put in cache will stay valid

Example:

	craft.httpReq.setCacheTtl(60)

This will define a cache validity time of 1 minute for all further requests.

### getParams

Helper method to safely retrieve a list of parameters (GET or POST) from the current Craft request.

Parameters:

- paramNames: Array containing names of parameters to retrieve

Example:

	craft.httpReq.getParams(['fname','lname'])

Return value:

	{ "fname": "John", "lname": "Doe" }

### getFiles

Helper method to retrieve a list of uploaded files from the current Craft request.

Parameters:

- paramNames: Array containing the names of the file inputs

Example:

	craft.httpReq.getFiles(['cv'])

Return value:

	{ "cv": (UploadFile) }

## Cache

We use Craft's caching system to store the responses. The TTL is of 1 hour per default, but this value can be changed using the `setCacheTtl` method.

## Session handling

As this plugin was mainly created with the idea to query REST API, the session handling is not really at its best.
We create a single CookieJar in memory that remains during the whole Craft request.