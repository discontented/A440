# Core Concepts
* Javascript is mainly used to modify the Document Object Model (DOM)
* Scripts are executed from events such as the page loading, a mouse click, etc.
* AJAX allows for data to be loaded to the page without the page refreshing.
* Progressive Enhancement
    * Javascript should enhance the user's experience but not be required due to legacy browsers, users disabling Javascript, and page downloading issues.
* Dynamic types
    * Variables don't have types but the objects they refer to do.

# CS Concepts
* Technically Javascript does not have classes but you can create something like them with [constructor functions](#classes)

# Loading Javascript
* Javascript can be embedded within the HTML with a `<script>` tag
```html
<script>
    // jscode
</script>
```
* Or it can be loaded from a separate file
```html
<script src="script.js"></script>
```


# Variables
## Local Scope
* If var is used inside a function it is considered a local variable
```js
var name = value;
```

## Global Scope
* Omitting `var` within a function forces the variable to be global.
```
name = value;
```

# Functions
```js
function functionName(var1,var2,...,varX) 
{
    //code 
}
```

# Objects

## Literal Notation

#### Declaration then Initialization
* The object has been created but no properties or methods assigned.

```js
var objectName = {};

objectName.property = "string";
objectName.methodName = function(par1) {
    return par1;
}
```

#### Declare and Initialize

```js
var objectName = {
    key : value,
    key : value,
    array : [ value, value, value ]
    methodName : function() {
    	//method code
    },
    methodName : function(parameter) {
    	//method code
    }
};
```

## Object Constructor Notation
#### Declaration then Initialization
```js
var objectName = new Object();

objectName.property = value;
objectName.methodName = function() {
    //method code
}
```

#### Declare and Initialize
* Allows the creation of multiple objects based off of a class.

```js
function Class(con1, con2, con3) {
    //properties
    this.con1 = con1;
    this.con2 = con2;
    this.con3 = con3;

    //methods
    this.method = function(par1) {
        return par1;
    }
}

var object = new Class('par1', 42, true);
```

## Classes

* `this` keyword is used instead of object name to indicate this object that is being created.
* Best practice is to begin a constructor function with a capital letter.

```js
function Class(con1, con2, con3) {
    //properties
    this.con1 = con1;
    this.con2 = con2;
    this.con3 = con3;

    //methods
    this.method = function(par1) {
        return par1;
    }
}
```

## Instances
* Declare an object with `new` to create an object from the class.

```js
var object = new Class(con1, con2, con3)
```

## Accessors
* Dot Notation
```js
objectName.method()
```

* Square Brackets
```js
objectName['method']();
```

# Arrays
* Grow dynamically

### Declaration

```js
var a = [1, {two: 2}, 'three']
```
# Control Flow
## if/else

```js
if (condition1)
  {
  	//code to be executed if condition1 is true
  }
else if (condition2)
  {
  	//code to be executed if condition2 is true
  }
else
  {
 	 //code to be executed if neither condition1 nor condition2 is true
  }

```

## switch
```js
switch (option) {
    case 'option1':
        // Do something
        break;
    case 'option2':
        // Do something else
        break;
    case 'option3':
        // Do a third thing
        break;
    default:
        // Do the thing if nothing else
}

```

# Looping
## for
```js
for (var i = start; i < end; i++) {
    //...
}
```

```js
for (var in obj) {
    //...
}
```

## while
```js
while(condition) {
    //...
}
```



