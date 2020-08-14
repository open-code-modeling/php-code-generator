<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator;

if (version_compare('7.3', PHP_VERSION, '>')) {
    fwrite(
        STDERR,
        'This version of open-code-modeling requires PHP >= 7.3; using the latest version of PHP is highly recommended.' . PHP_EOL
    );

    die(1);
}

if (! ini_get('date.timezone')) {
    ini_set('date.timezone', 'UTC');
}

foreach (
    [
        __DIR__ . '/../../../autoload.php',
        __DIR__ . '/../../autoload.php',
        __DIR__ . '/../vendor/autoload.php',
        __DIR__ . '/vendor/autoload.php',
    ] as $file
) {
    if (file_exists($file)) {
        define('OCMCG_COMPOSER_INSTALL', $file);
        break;
    }
}

unset($file);

if (! defined('OCMCG_COMPOSER_INSTALL')) {
    fwrite(STDERR,
        'You need to set up the project dependencies using the following commands:' . PHP_EOL .
        'wget http://getcomposer.org/composer.phar' . PHP_EOL .
        'php composer.phar install' . PHP_EOL
    );

    die(1);
}

require OCMCG_COMPOSER_INSTALL;

use OpenCodeModeling\CodeGenerator\Config\EmptyResolver;
use OpenCodeModeling\CodeGenerator\Config\FilePhpResolver;
use OpenCodeModeling\CodeGenerator\Config\Config;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputOption;

$description = <<<DESC
===========================================
Open Code Modeling - PHP Code Generator CLI
===========================================

DESC;

$config = null;
$argvInput = new ArgvInput;

if ($argvInput->hasParameterOption(['--config', '-c'])) {
    $config = $argvInput->getParameterOption(['--config', '-c']);
}

$application = new Application($description);
$application->getDefinition()->addOption(new InputOption('config', 'c', InputOption::VALUE_REQUIRED, 'Configuration file'));
$helperSet = $application->getHelperSet();

$helperSet->set(new Console\WorkflowContext(), Console\WorkflowContext::class);

if ($config) {
    $resolver = new FilePhpResolver($config);
} else {
    $resolver = new EmptyResolver();

    if (file_exists('open-code-modeling.php.dist')) {
        $resolver = new FilePhpResolver('open-code-modeling.php.dist');
    }
}

$helperSet->set(new Console\Config($resolver), Config::class);

$configClass = $helperSet->get(Config::class)->resolver()->resolve(
    $helperSet->get(Console\WorkflowContext::class)->context()
);
$consoleCommands = $configClass->consoleCommands();
$consoleCommands[] = new Console\WorkflowCommand();

$application->addCommands($consoleCommands);

unset($workflowContext, $config, $configClass, $argvInput);

$application->run();
