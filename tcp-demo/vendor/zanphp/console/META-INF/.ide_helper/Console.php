<?php

namespace Zan\Framework\Foundation\Console;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Application as SymfonyApplication;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

use ZanPHP\Contracts\Config\Repository;

class Console extends SymfonyApplication
{
    protected $commands = [];

    /**
     * The Zan application instance.
     *
     * @var \Zan\Framework\Foundation\Application
     */
    protected $zanApp;

    /**
     * Create a new Artisan console application.
     *
     * @param Application $app
     * @param  string $version
     */
    public function __construct($app, $version = 'UNKNOWN')
    {
    }

    /**
     * Add a command to the console.
     *
     * @param  \Symfony\Component\Console\Command\Command  $command
     * @return \Symfony\Component\Console\Command\Command
     */
    public function add(SymfonyCommand $command)
    {

    }

    public function registerCommands()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function get($name)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function all($namespace = null, $resolve = false)
    {

    }
    
    /**
     * Get the default input definitions for the applications.
     *
     * This is used to add the --env option to every available command.
     *
     * @return \Symfony\Component\Console\Input\InputDefinition
     */
    protected function getDefaultInputDefinition()
    {

    }

    /**
     * Get the global environment option for the definition.
     *
     * @return \Symfony\Component\Console\Input\InputOption
     */
    protected function getEnvironmentOption()
    {

    }

    /**
     * Get the Zan application instance.
     *
     * @return \Zan\Framework\Foundation\Application
     */
    public function getZanApp()
    {

    }

}