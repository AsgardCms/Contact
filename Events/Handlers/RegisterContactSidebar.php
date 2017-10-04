<?php

namespace Modules\Contact\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterContactSidebar extends AbstractAdminSidebar
{
    /**
     * Method used to define your sidebar menu groups and items
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item('Contact requests', function (Item $item) {
                $item->icon('fa fa-envelope-o');
                $item->weight(config('asgard.contact.config.sidebar-position', 15));
                $item->route('admin.contact.contactrequest.index');
                $item->authorize(
                    $this->auth->hasAccess('contact.contactrequests.index')
                );
            });
// append
        });

        return $menu;
    }
}
