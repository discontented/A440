- [jQuery](#jquery)
  - [Syntax](#syntax)
    - [Select IDs and Classes](#select-ids-and-classes)
  - [Remote Script](#remote-script)
- [AJAX](#ajax)
  - [Shortcuts for `.ajax()`](#shortcuts-for-ajax)
    - [Syntax](#syntax)
    - [Parameters](#parameters)
  - [Forms](#forms)
    - [Load](#load)
  - [Resources](#resources)

# jQuery
* jQuery simplifies coding in Javascript and allows one command to execute properly in multiple browsers.

## Syntax
```js
$(selector).action();
```
* `selector`
    * The selector can target HTML tags, classes, or IDs.
    * The selector must be surrounded by single quotes unless it is a variable.
      * Example:
        * `$('div').action()`
    * Do not include angle brackets (<>) when targeting an HTML tag.
        * `$('<div>')` would not select anything.

### Select IDs and Classes

* A div with an ID of "container" would be represented in HTML as: `<div id="container"></div>`
      * To apply some jQuery function to this specific div: `$('#container').action()`
    * jQuery uses the same syntax as CSS for targetting classes and IDs
      * `#<id_name>` - ID
        * $(`'#container'`)
      * `.<class_name>` - class
        * $(`'.list-item'`)

## Remote Script
* In the header of an HTML file, include the jQuery library to execute jQuery code.
```html
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
```

# AJAX

* jQuery provides methods to handle Ajax requrests.
* Typical ajax code:
* 
```js
$.ajax({
  url: 'phpURL.php',
  type: 'POST' or 'GET',
  data: { var : value },
  success: function (response) {
    //code using response data
  }
})
```

## Shortcuts for `.ajax()`

code | desc
--- | ---
`.load()` | Loads HTML fragments into an element.
`$.get()` | Loads data using the HTTP get method.
`$.post()` | Loads data using the HTTP post method.
`$.getJSON()` | Loads JSON data using GET
`$.getScript()` | Loads and executes Javascript data using GET.

### Syntax

```js
$.get(url[, data][, callback][, type])
$.post(url[, data][, callback][, type])
$.getJSON(url[, data][, callback])
$.getScript(url[, callback])
```
### Parameters
`$` method of jQuery object

*url* specifies where data is fetched from.

*data*  provides any extra info to send to the server

*callback* indicates that the function should be called when data is returned.

*type* shows the type of data to expect from the server.


## Forms
* To send form data:
  * The name of the file that will processs the data of the form.
  * The form data being sent.
  * The callback function that will handle the response from the server.

`.serialize()`
* Selects all info from the form.
* Puts into a string to be sent to the server
* Encodes the characters that cannot be used in a query string.

`e.PreventDefault()` stops a form from submitting.
Form data is collected by `.serialize()` method and stored in a variable.

### Load
* Loads content from another html file into the target selector
```js
$('#content').load('target.html #content');
```
* This allows to load the fragment of the HTML page, `target.html` of the tag with the id as #content.
  * If this is ommited then the entire html page will load.


```js
$.ajax({
  url: 'receive.php',
  type: 'POST',
  data: {variable : value},
  success: function()
  {
    //javascript code to execute
  }
})  
```

## Resources
[w3 Schools](https://www.w3schools.com/jquery/jquery_syntax.asp)