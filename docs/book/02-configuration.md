# Configuration

The code generator is shipped with a CLI which executes the code generation depending on the configuration file. The default
configuration file name is `open-code-modeling.php.dist` which should be located in the root folder of the application 
/ repository.

This file gets the variable `$workflowContext` provided to configure needed slot data for the code generation e. g. 
paths or global data. You have to return an instance of a class which implements `OpenCodeModeling\CodeGenerator\Config\Config` 
interface.

The following code shows a "Hello World!" example. It prepares the `WorkflowContext` object with the first part of the
greeting under slot name `part_one`. The workflow consists of two steps. Step *one* adds the second part of the greeting
to the given input from slot name `part_one`. The returned value is stored under the slot name `greeting`. Step *two*  
prints the string of the input slot name `greeting`. It doesn't has an output slot name.

```
use OpenCodeModeling\CodeGenerator;

/** @var CodeGenerator\Workflow\WorkflowContext $workflowContext */
$workflowContext->put('part_one', 'Hello'); // init some data so it's available as an input slot name

$config = new CodeGenerator\Config\Workflow(
        // step one
        new CodeGenerator\Workflow\ComponentDescriptionWithSlot(
            function(string $inputHello) {
                return $inputHello . ' World!';
            },
            'greeting', // output slot name
            'part_one' // input slot name
        ),
        // step two
        new CodeGenerator\Workflow\ComponentDescriptionWithInputSlotOnly(
            function(string $greeting) {
                echo $greeting;
            },
            'greeting', // input slot name
        ),
);

return $config;
```

## Register additional Symfony CLI commands

It is possible to add additional CLI commands to the code generator CLI. You can register additional Symfony CLI commands
by adding them to the `$config` object via `$config->addConsoleCommands(new AwesomeCliCommand())`.

## Register a monitor

A monitor can be used to display code generation steps and progress.

You can register a monitor instance of type `\OpenCodeModeling\CodeGenerator\Workflow\Monitoring\Monitoring` to the 
`$config` object via `$config->setMonitor(new AwesomeMonitor())`. The Code Generator is shipped with a `Psr\Log\LoggerInterface`
monitor (`\OpenCodeModeling\CodeGenerator\Workflow\Monitoring\LoggerMonitor`).
