# Code Generator CLI

The code generator CLI can be started through the `bin/ocmcg` executable. This prints the registered CLI commands from 
workflows, and the default available CLI commands. The CLI command `ocmcg:workflow:run` executes the code generation 
depending on the configuration file. You can use the CLI option `-c` to specify a specific configuration file.

```
===========================================
Open Code Modeling - PHP Code Generator CLI
===========================================


Usage:
  command [options] [arguments]

Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -c, --config=CONFIG   Configuration file
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  help                Displays help for a command
  list                Lists commands
 ocmcg
  ocmcg:workflow:run  Executes workflow from configuration file to generate code
```
