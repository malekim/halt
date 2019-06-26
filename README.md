# Halt plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require malekim/halt
```

It is also required to have Debug Kit installed.

Then register the plugin in src/Application.php:
```
$this->addPlugin(\Halt\Plugin::class);
Configure::write('DebugKit.panels', ['Halt.Halt']);
```

Recommended way is to add those lines between debug condition and then DebugKit load should be similar to:
```
if (Configure::read('debug')) {
    $this->addPlugin(\Halt\Plugin::class);
    Configure::write('DebugKit.panels', ['Halt.Halt']);
    $this->addPlugin(\DebugKit\Plugin::class);
}
```


## Usage

The plugin adds new panel to DebugKit Toolbar. You can see all your halts in that panel.

To halt simple use function:
```
halt($variable);
```

Inside halt you can see line number, file and content of halted variable.

For instance:
```
// inside PagesController.php
public function display(...$path) {
    halt($path);
    // rest of the code
}
```
And then halt shows:
```
Array
(
    [line] => 43
    [file] => /Users/malekim/Projects/halttest/src/Controller/PagesController.php
    [var] => Array
        (
            [0] => home
        )

)
```

Halt can be used to any type of variable and any sort of data.

It is important to note that halt() does not terminate script execution, so you can use any nuber of halt() during request. So it is helpful solution if you need to debug complicated things.  