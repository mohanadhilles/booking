<?php

use Illuminate\Database\Seeder;

use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        // auto-generated code
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Dashboard", "url" => "", "route" => "voyager.dashboard", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-boat", "color" => "#000000", "parent_id" => null, "order" => "1", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Media", "url" => "", "route" => "voyager.media.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-images", "color" => "", "parent_id" => null, "order" => "10", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Users", "url" => "", "route" => "voyager.users.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-people", "color" => "#000000", "parent_id" => null, "order" => "8", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Menu Builder", "url" => "", "route" => "voyager.menus.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-list", "color" => "", "parent_id" => "5", "order" => "1", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Database", "url" => "", "route" => "voyager.database.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-data", "color" => "", "parent_id" => "5", "order" => "2", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Compass", "url" => "", "route" => "voyager.compass.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-compass", "color" => "", "parent_id" => "5", "order" => "3", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "BREAD", "url" => "", "route" => "voyager.bread.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-bread", "color" => "", "parent_id" => "5", "order" => "4", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Settings", "url" => "", "route" => "voyager.settings.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-settings", "color" => "", "parent_id" => null, "order" => "14", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Categories", "url" => "", "route" => "voyager.categories.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-categories", "color" => "", "parent_id" => null, "order" => "2", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Blog Posts", "url" => "", "route" => "voyager.posts.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-news", "color" => "#000000", "parent_id" => null, "order" => "13", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Pages", "url" => "", "route" => "voyager.pages.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-file-text", "color" => "", "parent_id" => null, "order" => "12", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Hooks", "url" => "", "route" => "voyager.hooks", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-hook", "color" => "", "parent_id" => "5", "order" => "5", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Events", "url" => "", "route" => "voyager.events.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-calendar", "color" => "#000000", "parent_id" => null, "order" => "4", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Taxes", "url" => "", "route" => "voyager.taxes.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-documentation", "color" => "#000000", "parent_id" => null, "order" => "7", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Banners", "url" => "", "route" => "voyager.banners.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-photo", "color" => "#000000", "parent_id" => null, "order" => "11", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Contacts", "url" => "", "route" => "voyager.contacts.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-mail", "color" => "#000000", "parent_id" => null, "order" => "9", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Bookings", "url" => "", "route" => "voyager.bookings.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-dollar", "color" => "", "parent_id" => null, "order" => "5", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Commissions", "url" => "", "route" => "voyager.commissions.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-wallet", "color" => "", "parent_id" => null, "order" => "6", ])->save();
        }
        $menuItem = MenuItem::firstOrNew(["menu_id" => $menu->id, "title" => "Tags", "url" => "", "route" => "voyager.tags.index", ]);
        if (!$menuItem->exists) {
            $menuItem->fill(["target" => "_self", "icon_class" => "voyager-puzzle", "color" => "", "parent_id" => null, "order" => "3", ])->save();
        }
        
        
    }

    protected function menuItem($field, $for)
    {
        return MenuItem::firstOrNew([$field => $for]);
    }
}