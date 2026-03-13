<?php

namespace App\Services;

use App\Models\Contact;

class ContactService extends Services
{
    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }

    public function getAll($pagination = 10)
    {
        return $this->model->first();
    }

    public function store($request)
    {
        $data = $request->except('_token');

        $this->model->create($data);

        return true;
    }

    public function update($id, $request)
    {
        $contact = $this->model->findOrFail($id);

        $data = $request->except('_token', '_method');

        $contact->update($data);

        return true;
    }
}