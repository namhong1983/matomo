<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Access\Role;

use Piwik\Access\Role;

class Admin extends Role
{
    const ID = 'admin';

    public function getName()
    {
        return 'Admin';
    }

    public function getId()
    {
        return self::ID;
    }

    public function getDescription()
    {
        return 'Lets you admin ...';
    }

    public function getHelpUrl()
    {
        return 'https://matomo.org/faq/general/faq_69/';
    }

}