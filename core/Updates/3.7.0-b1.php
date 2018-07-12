<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Updates;

use Piwik\Updater;
use Piwik\Updater\Migration\Factory as MigrationFactory;
use Piwik\Updates;

/**
 * Update for version 3.7.0-b1.
 */
class Updates_3_7_0_b1 extends Updates
{
    /**
     * @var MigrationFactory
     */
    private $migration;

    public function __construct(MigrationFactory $factory)
    {
        $this->migration = $factory;
    }

    public function getMigrations(Updater $updater)
    {
        $migrations = array();
        $migrations[] = $this->migration->db->changeColumnType('access', 'access', 'VARCHAR(50) NULL');
        $migrations[] = $this->migration->db->dropPrimaryKey('access');
        $migrations[] = $this->migration->db->addColumn('access', 'idaccess', 'INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT');
        $migrations[] = $this->migration->db->addIndex('access', array('login', 'idsite'), 'index_loginidsite');

        return $migrations;
    }

    public function doUpdate(Updater $updater)
    {
        $updater->executeMigrations(__FILE__, $this->getMigrations($updater));
    }

}