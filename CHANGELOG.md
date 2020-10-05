# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## TBA

### Added

* Monitoring functionality to display code generation steps and progress.

### Deprecated

* Nothing

### Removed

The following classes are removed (deprecated in 0.2.0).

* Class `\OpenCodeModeling\CodeGenerator\Config\ArrayConfig`
* Class `\OpenCodeModeling\CodeGenerator\Config\Component`
* Class `\OpenCodeModeling\CodeGenerator\Config\ComponentCollection`
* Class `\OpenCodeModeling\CodeGenerator\Config\ComponentList`

### Fixed

* Nothing

## 0.2.0 (2020-09-05)

### Added

* Documentation (code / markdown docs)

### Deprecated

The following classes are deprecated and support will be removed in next version.

* Class `\OpenCodeModeling\CodeGenerator\Config\ArrayConfig` use `\OpenCodeModeling\CodeGenerator\Config\Workflow` instead
* Class `\OpenCodeModeling\CodeGenerator\Config\Component` use `\OpenCodeModeling\CodeGenerator\Config\WorkflowConfig` instead
* Class `\OpenCodeModeling\CodeGenerator\Config\ComponentCollection` use `\OpenCodeModeling\CodeGenerator\Config\WorkflowCollection` instead
* Class `\OpenCodeModeling\CodeGenerator\Config\ComponentList` use `\OpenCodeModeling\CodeGenerator\Config\WorkflowList` instead

### Removed

* Nothing

### Fixed

* Add console commands from each workflow config

## 0.1.0 (2020-09-04)

### Added

* Initial release

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing
