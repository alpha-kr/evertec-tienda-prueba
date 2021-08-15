<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class OrderAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!DataType::where('name','orders')->exists()){
            DB::beginTransaction();
            DataType::create($this->bread())
                ->rows()
                ->createMany($this->inputFields());
            
            $this->generatePermissions();
            $this->generateMenu();
            DB::commit();
        }
    }

    public function bread()
    {
        return [

            'name'                  => 'orders',
            'slug'                  => 'Order',
            'display_name_singular' => 'Order',
            'display_name_plural'   => 'Orders',
            'icon'                  => '',
            'model_name'            => 'App\Models\OrderAdmin',
            'controller'            => null,
            'generate_permissions'  => 1,
            'description'           => 'Ordenes de tu tienda',
            'details'               => [
                "order_column" => null,
                "order_display_column" => null
            ]
        ];
    }

    public function inputFields()
    {
        return [
            [
                'field'        => 'id',
                'type'         => 'number',
                'display_name' => 'Referencia',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 1,
            ],
            [
                'field'        => 'request_id',
                'type'         => 'number',
                'display_name' => 'request_id',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 2,
            ],
            [
                'field'        => 'user_id',
                'type'         => 'number',
                'display_name' => 'user_id',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 3,
            ],
            [
                'field'        => 'customer_name',
                'type'         => 'number',
                'display_name' => 'Nombre cliente',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 4,
            ],
            [
                'field'        => 'customer_email',
                'type'         => 'text',
                'display_name' => 'Correo electronico cliente',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 5,
            ],
            [
                'field'        => 'customer_mobile',
                'type'         => 'number',
                'display_name' => 'Telefono cliente',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 6,
            ],
            [
                'field'        => 'comments',
                'type'         => 'text',
                'display_name' => 'Comentarios y o Sugerencias',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 7,
            ],
            [
                'field'        => 'url_payment',
                'type'         => 'text',
                'display_name' => 'url_payment',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 8,
            ],
            [
                'field'        => 'total',
                'type'         => 'number',
                'display_name' => 'total',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 9,
            ],
            [
                'field'        => 'status',
                'type'         => 'text',
                'display_name' => 'Estado de order',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 10,
            ],
            [
                'field'        => 'order_belongstomany_product_relationship',
                'type'         => 'relationship',
                'display_name' => 'productos ',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      =>json_decode('{"foreign_pivot_key":"order_id","model":"App\\\\Models\\\\Product","table":"products","type":"belongsToMany","column":"id","key":"id","label":"name","pivot_table":"order_details","pivot":"1","taggable":"0"}',true),
                'order'        => 12,
            ],
            [
                'field'        => 'created_at',
                'type'         => 'timestamp',
                'display_name' => 'Fecha ',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 13,
            ],
            [
                'field'        => 'updated_at',
                'type'         => 'timestamp',
                'display_name' => 'updated_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 14,
            ]
        ];
    }

    public function menuEntry()
    {
        return [
            'title'       => 'Ordenes',
            'url'         => '',
            'route'       => 'voyager.Order.index',
            'target'      => '_self',
            'icon_class'  => 'voyager-basket',
            'color'       => null,
            'parent_id'   => null,
            'parameters' => null,
            'order'       => 15,
        ];
    }
    public function generateMenu()
    {
        $menu=Menu::firstWhere('name','admin');
        if ($menu->name == 'admin') {
            $menuItem = $menu->items->where('title', 'Ordenes')->first();
            if (is_null($menuItem)) {
               $menu->items()->create($this->menuEntry());
            }
        }
    }
    public function generatePermissions()
    {
        
        foreach (['browse_orders','read_orders'] as $permission) {
            $permission = Permission::firstOrNew(['key' => $permission, 'table_name' => 'orders']);
            if (!$permission->exists) {
                $permission->save();
                $role = Role::where('name', 'admin')->first();
                if (!is_null($role)) {
                    $role->permissions()->attach($permission);
                }
            }
        }
    }
}
