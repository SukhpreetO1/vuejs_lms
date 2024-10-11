<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CoursesRequest;
use App\Models\AuthorDetails;
use App\Models\CourseTopics;
use App\Models\Users;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CoursesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CoursesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Courses::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/courses');
        CRUD::setEntityNameStrings('courses', 'courses');
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
        CRUD::column('users.name')->label('Added By')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("users/" . $entry->user_id . "/show");
            }
        ]);
        CRUD::column('author_details.name')->label('Author')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("author-details/" . $entry->author_id . "/show");
            }
        ]);
        CRUD::column('course_topics.name')->label('Course Topics')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("course-topics/" . $entry->course_id . "/show");
            }
        ]);
        CRUD::column('title')->label('title');
        CRUD::column('description')->label('Description');

        CRUD::setOperationSetting('lineButtonsAsDropdown', true);

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
        CRUD::setValidation(CoursesRequest::class);
        
        CRUD::field('user_id')->type('select')->label('Added By')->entity('users')->modal(Users::class)->attribute('name')
            ->options(function ($query) {
                return $query->orderBy('id', 'ASC')->where('role_id', '!=', 2)->get();
            });

        CRUD::field('author_id')->type('select')->label('Author')->entity('author_details')->modal(AuthorDetails::class)->attribute('name');
        CRUD::field('course_id')->type('select')->label('Course')->entity('course_topics')->modal(CourseTopics::class)->attribute('name');
        CRUD::field('title')->label('Title');
        CRUD::field('description')->label('Description');

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
        CRUD::column('title')->label('Title');
        CRUD::column('users.name')->label('Added By')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("users/" . $entry->user_id . "/show");
            }
        ]);
        CRUD::column('author_details.name')->label('Author')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("author-details/" . $entry->author_id . "/show");
            }
        ]);
        CRUD::column('course_topics.name')->label('Course Topics')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("course-topics/" . $entry->course_id . "/show");
            }
        ]);
        CRUD::column('description')->label('Description');
        CRUD::column('created_at')->label('Created');
        CRUD::column('updated_at')->label('Updated');
    }
}
