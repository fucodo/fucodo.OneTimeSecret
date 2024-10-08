<?php
namespace fucodo\OneTimeSecret\Command;

/*
 * This file is part of the fucodo.OneTimeSecret package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;

/**
 * @Flow\Scope("singleton")
 */
class SecretCommandController extends CommandController
{

    /**
     * An example command
     *
     * The comment of this command method is also used for Flow's help screens. The first line should give a very short
     * summary about what the command does. Then, after an empty line, you should explain in more detail what the command
     * does. You might also give some usage example.
     *
     * It is important to document the parameters with param tags, because that information will also appear in the help
     * screen.
     *
     * @param string $requiredArgument This argument is required
     * @param string $optionalArgument This argument is optional
     * @return void
     */
    public function exampleCommand($requiredArgument, $optionalArgument = null)
    {
        $this->outputLine('You called the example command and passed "%s" as the first argument.', array($requiredArgument));
    }
}
