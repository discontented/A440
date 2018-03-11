
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