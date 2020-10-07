<?php
/*
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModelingTest\CodeGenerator\Workflow;

use OpenCodeModeling\CodeGenerator\Workflow\ComponentDescriptionWithInputSlotOnly;
use OpenCodeModeling\CodeGenerator\Workflow\Monitoring\Monitoring;
use OpenCodeModeling\CodeGenerator\Workflow\WorkflowContext;
use OpenCodeModeling\CodeGenerator\Workflow\WorkflowEngine;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;

final class WorkflowEngineTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @test
     */
    public function it_executes_a_workflow(): void
    {
        $description = new ComponentDescriptionWithInputSlotOnly(
            function(string $greeting) {
                $this->assertSame('Hello Test!', $greeting);
            },
            'greeting',
        );

        $monitor = $this->prophesize(Monitoring::class);
        $monitor->start(Argument::is($description))->shouldBeCalled();
        $monitor->call(Argument::is($description))->shouldBeCalled();
        $monitor->done(Argument::is($description))->shouldBeCalled();

        $workflowContext = $this->prophesize(WorkflowContext::class);
        $workflowContext->getByDescription(Argument::is($description))
            ->willReturn(['Hello Test!'])
            ->shouldBeCalled();

        $workflowEngine = new WorkflowEngine($monitor->reveal());
        $workflowEngine->run($workflowContext->reveal(), $description);
    }
}
