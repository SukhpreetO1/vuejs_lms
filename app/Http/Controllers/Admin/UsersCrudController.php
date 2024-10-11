<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsersRequest;
use App\Models\Roles;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UsersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UsersCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\ReviseOperation\ReviseOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Users::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/users');
        CRUD::setEntityNameStrings('users', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::orderBy('id', 'asc');
        CRUD::setOperationSetting('lineButtonsAsDropdown', true);

        // CRUD::setFromDb(); // set columns from db columns.
        CRUD::column("id");
        CRUD::column('name');
        CRUD::column('role.name')->label('role')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("roles/" . $entry->id . "/show");
            }
        ]);
        CRUD::column('email');
        CRUD::column('email_verified_at');
        CRUD::column('stripe_id');
        CRUD::column('pm_expiration');
        CRUD::column('trial_ends_at');

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UsersRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        CRUD::field('role_id')->type('select')->label('Role')->entity('role')->model(Roles::class)->attribute('name')->default(2);
        CRUD::field('password')->type('password')->label('Password');

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setOperationSetting('showDeleteButton', true);
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        // $this->setupCreateOperation();
        CRUD::column('id')->label("ID")->tab('Details');
        CRUD::column('name')->label("Name")->tab('Details');
        CRUD::column('email')->label("Email")->tab('Details');
        CRUD::column('email_verified_at')->label("Email Verified")->tab('Details');
        CRUD::column('created_at')->label('Created At')->tab('Details');
        CRUD::column('updated_at')->label('Updated At')->tab('Details');

        CRUD::column('stripe_id')->label('Stripe ID')->tab('Stripe Details');
        CRUD::column('pm_type')->label('PM Type')->tab('Stripe Details');
        CRUD::column('pm_last_four')->label('PM Last Four')->tab('Stripe Details');
        CRUD::column('trial_ends_at')->label('Trial Ends')->tab('Stripe Details');
        CRUD::column('billing_address')->label('Billing Address')->tab('Stripe Details');
        CRUD::column('billing_city')->label('Billing City')->tab('Stripe Details');
        CRUD::column('billing_state')->label('Billing State')->tab('Stripe Details');
        CRUD::column('billing_postal_code')->label('Billing Postal Code')->tab('Stripe Details');
        CRUD::column('billing_country')->label('Billing Country')->tab('Stripe Details');
        CRUD::column('invoice_emails')->label('Invoice Emails')->tab('Stripe Details');
    }
}
