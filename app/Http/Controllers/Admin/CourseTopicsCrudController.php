<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseTopicsRequest;
use App\Models\CourseFields;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CourseTopicsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseTopicsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\CourseTopics::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course-topics');
        CRUD::setEntityNameStrings('course topics', 'course topics');
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
        // CRUD::setFromDb(); // set columns from db columns.
        CRUD::column('course_image')->label('course image')->type('image')->prefix('storage/');
        CRUD::column('name')->label('name');
        CRUD::column('course_fields.title')->label('course heading')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("course-fields/" . $entry->course_field_id . "/show");
            }
        ]);

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
        CRUD::setValidation(CourseTopicsRequest::class);
        CRUD::field('course_image')->label('Image')->type('upload')
            ->prefix('course_images')
            ->withFiles();
        CRUD::field('name')->label('Name');
        CRUD::field('course_field_id')->type('select')->label('Course Headings')->entity('course_fields')->modal(CourseFields::class)->attribute('title')->default(3);

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
        CRUD::column('course_image')->label('Course Image')->type('image')->prefix('storage/');
        CRUD::column('name')->label('Name');
        CRUD::column('course_fields.title')->label('Course Heading')->wrapper([
            'href' => function($crud, $column, $entry) {
                return backpack_url("course-fields/" . $entry->course_field_id . "/show");
            }
        ]);
        CRUD::column('created_at')->label('Created');
        CRUD::column('updated_at')->label('Updated');
    }
}
