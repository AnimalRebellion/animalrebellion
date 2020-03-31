<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ItemTagRequest as StoreRequest;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ItemTagRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\CrudPanel;

/**
 * Class ItemTagCrudController.
 *
 * @property CrudPanel $crud
 */
class ItemTagCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ItemTag');
        $this->crud->setRoute(config('backpack.base.route_prefix').'/item_tag');
        $this->crud->setEntityNameStrings('item_tag', 'item_tags');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn('name');

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Name',
            'attributes' => [
                'placeholder' => 'Tag name',
            ],
        ]);

        // add asterisk for fields that are required in ItemTagRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
