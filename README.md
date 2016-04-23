# TodoList

This is a web todolist and dyweb php assignment.

## Usage

With php, set up a localhost or a server. A easy way to set up a localhost is
```
git clone https://github.com/JasonQSY/TodoList.git && cd TodoList
php -S localhost:8080 -t ./src/
```
I reccommend that open <http://localhost:8080/index.php> with Google Chrome.

## Struture

- index.php
    - It is mainly a html file to display contents.
- default.css
    - The only css file for `index.php`
- process.php
    - When edit something one index.php, it will redirect to `process.php` to deal with the issue and return to `index.php` to display.
- todolist.php
    - A PHP class offering relatively low-level opeations on the todolist.


## Demo

It is a shame that the configuration on my hired server has some slight problems. I will add the demo soon.
