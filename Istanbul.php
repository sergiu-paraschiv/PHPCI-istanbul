<?php

namespace SergiuParaschiv\PHPCI\Plugin;

use PHPCI\Builder;
use PHPCI\Model\Build;

class Istanbul implements \PHPCI\Plugin
{
    public function __construct(Builder $phpci, Build $build, array $options = array())
    {
        $this->phpci = $phpci;
        $this->build = $build;
        $this->directory = '';
        $this->command = '';
        $this->outputDirectory = '';

        if (isset($options['directory'])) {
            $this->directory = $options['directory'];
        }

        if (isset($options['command'])) {
            $this->command = $options['command'];
        }

        if (isset($options['outputDirectory'])) {
            $this->outputDirectory = $options['outputDirectory'];
        }
    }

    public function execute()
    {
        if (empty($this->command)) {
            $this->phpci->logFailure('Configuration command not found.');
            return false;
        }

        if (empty($this->directory)) {
            $this->phpci->logFailure('Configuration directory not found.');
            return false;
        }

        if (empty($this->outputDirectory)) {
            $this->phpci->logFailure('Configuration outputDirectory not found.');
            return false;
        }

        $this->phpci->logExecOutput(false);

        $cmd = 'cd ' . $this->directory . '; DIR=' . $this->outputDirectory . ' ' . $this->command;
        $this->phpci->executeCommand($cmd);

        $this->phpci->logExecOutput(true);

        return true;
    }
}
