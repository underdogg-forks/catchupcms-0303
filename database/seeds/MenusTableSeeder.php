<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		Db::table('menus')->truncate();

		$menus = [

			[
				'parent_id' => 0,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 0,
				'title' => 'Dashboard',
				'url' => 'dashboard', 
				'description' => null,
				'icon' => 'fa-dashboard'
			],
			[ 
				'parent_id' => 0,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 1,
				'title' => 'Reports',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-bar-chart'
			],
			[ 
				'parent_id' => 2,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 1,
				'title' => 'Expenses',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-line-chart'
			],
			[ 
				'parent_id' => 2,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 2,
				'title' => 'Membership',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-line-chart'
			],
			[ 
				'parent_id' => 2,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' =>3,
				'title' => 'Frequentation',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-line-chart'
			],
			[ 
				'parent_id' => 0,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 2,
				'title' => 'Membership',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-rocket'
			],
			[ 
				'parent_id' => 6,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 0,
				'title' => 'Members',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-mortar-board'
			],
			[ 
				'parent_id' => 6,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 1,
				'title' => 'Mentors',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-child'
			],
			[ 
				'parent_id' => 6,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 2,
				'title' => 'Plans',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-ticket'
			],
			[ 
				'parent_id' => 0,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' =>3,
				'title' => 'Finances',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-money'
			],
			[ 
				'parent_id' => 10,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 0,
				'title' => 'Transactions',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-exchange'
			],
			[ 
				'parent_id' => 10,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 0,
				'title' => 'Billing',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-dollar'
			],
			[ 
				'parent_id' => 10,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 0,
				'title' => 'Accounts',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-user'
			],
			[ 
				'parent_id' => 10,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 0,
				'title' => 'Stripe',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-cc-stripe'
			],
			[ 
				'parent_id' => 10,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 0,
				'title' => 'Paypal',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-paypal'
			],
			[ 
				'parent_id' => 0,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 4,
				'title' => 'Access control',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-lock'
			],
			[ 
				'parent_id' => 16,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 0,
				'title' => 'Keys',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-key'
			],
			[ 
				'parent_id' => 16,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 1,
				'title' => 'RFID Cards',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-credit-card'
			],
			[ 
				'parent_id' => 16,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' => 2,
				'title' => 'Alarm Pins',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-shield'
			],
			[ 
				'parent_id' => 16,
				'permission' => 'menu_view',
				'menu_group' => 'mainnavigation',
				'menu_order' =>3,
				'title' => 'HACCSY',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-server'
			],
			[ 
				'parent_id' => 0,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 0,
				'title' => 'General',
				'url' => 'settings/general',
				'description' => null,
				'icon' => 'fa-gear'
			],
			[ 
				'parent_id' => 0,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 1,
				'title' => 'Emails',
				'url' => 'settings/emails',
				'description' => null,
				'icon' => 'fa-envelope'
			],
			[ 
				'parent_id' => 0,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 1,
				'title' => 'Users',
				'url' => 'settings/users',
				'description' => null,
				'icon' => 'fa-user'
			],
			[ 
				'parent_id' => 23,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 0,
				'title' => 'All Users',
				'url' => 'settings/users/all',
				'description' => null,
				'icon' => 'fa-users'
			],
			[ 
				'parent_id' => 23,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 1,
				'title' => 'Roles',
				'url' => 'settings/users/roles',
				'description' => null,
				'icon' => 'fa-eye'
			],
			[ 
				'parent_id' => 23,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 2,
				'title' => 'Permissions',
				'url' => 'settings/users/permissions',
				'description' => null,
				'icon' => 'fa-exclamation-triangle'
			],
			[ 
				'parent_id' => 0,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 3,
				'title' => 'Modules',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-plug'
			],
			[ 
				'parent_id' => 27,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 0,
				'title' => 'Installed Modules',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-inbox'
			],
			[ 
				'parent_id' => 27,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 1,
				'title' => 'Add new',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-plus'
			],
			[ 
				'parent_id' => 0,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' =>4,
				'title' => 'Appearance',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-paint-brush'
			],
			[ 
				'parent_id' => 30,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 0,
				'title' => 'Menus',
				'url' => 'settings/menus',
				'description' => null,
				'icon' => 'fa-bars'
			],
			[ 
				'parent_id' => 30,
				'permission' => 'setting_edit',
				'menu_group' => 'settings',
				'menu_order' => 1,
				'title' => 'Themes',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-television'
			]

		];

		foreach ($menus as $menu) {
			Menu::create($menu);
		}
	}
}
