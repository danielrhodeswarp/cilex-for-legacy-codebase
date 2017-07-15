<?php

/*
 * This file is part of the Cilex framework.
 *
 * (c) Mike van Riel <mike.vanriel@naenius.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//namespace Cilex\Command;
namespace NewStuff\Console\Commands;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Cilex\Provider\Console\Command;

use PDO;

/**
 * Example command for testing purposes.
 */
class UsesDatabaseCommand extends Command
{
    use \NewStuff\Traits\LegacyAppBridgeTrait;

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setName('new:uses-db')
            ->setDescription('Uses legacy DB to do stuff')
            //->addArgument('name', InputArgument::OPTIONAL, 'Who do you want to greet?')
            //->addOption('yell', 'y', InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters')
            ;
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //get DB settings of legacy app (via our trait in NewStuff)
        $config = $this->getLegacyAppDbConfig();

        $pdo = new PDO("mysql:host={$config['host']};dbname={$config['schema']}", $config['user'], $config['password']);


        $output->writeln('Contents of legacy_data table:');

        foreach($pdo->query("SELECT * FROM legacy_data") as $row)
        {
            $output->writeln("{$row['id']},{$row['label']},{$row['code']}");
        }
    }
}
