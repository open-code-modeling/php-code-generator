# Configuration

The code generator CLI can be started through the `bin/ocmcg` executable. This prints the available CLI commands.
The CLI command `ocmcg:workflow:run` executes the code generation depending on the configuration file. The default
configuration file name is `open-code-modeling.php.dist` which should be located in the root folder of the application 
/ repository.

This file gets the variable `$workflowContext` provided to configure needed slot data for the code generation e. g. 
paths or global data. You have to return an instance of a class which implements `OpenCodeModeling\CodeGenerator\Config\Config` 
interface.

The following example add some slot data to the workflow context (`$workflowContext->put()`). 
```
/** @var CodeGenerator\Workflow\WorkflowContext $workflowContext */
$workflowContext->put('xml_filename', 'data/domain.xml');

$config = new CodeGenerator\Config\ComponentList(
    ...[
        new CodeGenerator\Config\ComponentConfig(
            CodeGenerator\Transformator\StringToFile::workflowComponentDescription(
                Inspectio\WorkflowConfigFactory::SLOT_GRAPHML_XML,
                'xml_filename'
            )
        ),
    ]
);

$config->addConsoleCommands(new Inspectio\Console\XmlGenerateAllCommand());

return $config;
```
