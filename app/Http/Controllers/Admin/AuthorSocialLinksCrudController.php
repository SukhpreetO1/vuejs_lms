<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AuthorSocialLinksRequest;
use App\Models\AuthorDetails;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AuthorSocialLinksCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AuthorSocialLinksCrudController extends CrudController
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
        CRUD::setModel(\App\Models\AuthorSocialLinks::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/author-social-links');
        CRUD::setEntityNameStrings('author social links', 'author social links');
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
        CRUD::column('id');
        CRUD::column('author_details.name')->label('Author')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("author-details/" . $entry->author_id . "/show");
            }
        ]);

        // CRUD::column('name')->label('Social Platform');
        CRUD::column('name')->label('Social Platform')->type('text')->value(function($entry) {
            $platforms = [
                'facebook.com' => 'Facebook',
                'twitter.com' => 'Twitter',
                'instagram.com' => 'Instagram',
                'linkedin.com' => 'LinkedIn',
                'github.com' => 'GitHub',
            ];
            $host = parse_url($entry->links, PHP_URL_HOST);
            $host = preg_replace('/^www\./', '', $host);
            return $platforms[$host] ?? ucfirst($host);
        });
        CRUD::column('links')->label('Social Link')->type('url')->target('_blank');

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
        CRUD::setValidation(AuthorSocialLinksRequest::class);
        CRUD::field('author_id')->type('select')->label('Author')->entity('author_details')->modal(AuthorDetails::class)->attribute('name');
        CRUD::field('links')->label('Social Link');

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
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        CRUD::column('author_details.name')->label('Author')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("author-details/" . $entry->author_id . "/show");
            }
        ]);
        CRUD::column('name')->label('Social Platform')->type('text')->value(function($entry) {
            $platforms = [
                'facebook.com' => 'Facebook',
                'twitter.com' => 'Twitter',
                'instagram.com' => 'Instagram',
                'linkedin.com' => 'LinkedIn',
                'github.com' => 'GitHub',
            ];
            $host = parse_url($entry->links, PHP_URL_HOST);
            $host = preg_replace('/^www\./', '', $host);
            return $platforms[$host] ?? ucfirst($host);
        });
        CRUD::column('links')->label('Social Link')->type('url')->target('_blank');
        CRUD::column('created_at')->label('Created');
        CRUD::column('updated_at')->label('Updated');
    }
}
