<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ResourceController extends Controller
{
    protected $services;

    public function __construct($services)
    {
        $this->services = $services;
    }

    public function viewsFolder()
    {
        return '';
    }

    public function getResourceNames()
    {
       return '';
    }

    public function storeValidationRequest()
    {
        return '';
    }

    public function getUrl()
    {
        return route($this->getResourceNames() . '.index');
    }

    public function getName()
    {
        return ucfirst($this->getResourceNames());
    }
 

    public function index()
    {
        try {
            $resources = $this->services->getAll(15);

            return view($this->viewsFolder() . '.index', ['resources' => $resources]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $data = $this->services->getCreateData();

            return view($this->viewsFolder() . '.create', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $validationRequestClass = $this->storeValidationRequest();

            if (!empty($validationRequestClass) && class_exists($validationRequestClass)) {
                $validator = new $validationRequestClass();

                $request->validate(
                    $validator->rules(),
                    $validator->messages() ?? [],
                    $validator->attributes() ?? []
                );
            }

            $response = $this->services->store($request);

            if (isset($response['error'])) {
                return redirect()->back()->withErrors(['error' => $response['error']]);
            }

            return redirect($this->getUrl())->with('success', $this->getName() . ' created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function edit(string $id)
    {
        try {
            $resource = $this->services->getById($id);

            if (!$resource) {
                return redirect($this->getUrl())->withErrors(['error' => $this->getName() . ' not found.']);
            }


            return view($this->viewsFolder() . '.edit', $resource)->render();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }


    public function update(Request $request, string $id)
    {
        try {
     
            $resource = $this->services->getById($id);

            if (!$resource) {
                return redirect($this->getUrl())
                    ->withErrors(['error' => $this->getName() . ' not found.']);
            }

            $validationRequestClass = $this->storeValidationRequest();

            if (!empty($validationRequestClass) && class_exists($validationRequestClass)) {
                $validator = new $validationRequestClass();
        
                $request->validate(
                    $validator->rules(),
                    $validator->messages() ?? [],
                    $validator->attributes() ?? []
                );
            }


            $response = $this->services->update($id, $request);

            if (isset($response['error'])) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['error' => $response['error']]);
            }

            return redirect($this->getUrl())->with('success', $this->getName() . ' updated successfully.');
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $resource = $this->services->getById($id);

            if (!$resource) {
                return redirect($this->getUrl())
                    ->withErrors(['error' => $this->getName() . ' not found.']);
            }

            $response = $this->services->delete($id);

            if (isset($response['error'])) {
                return redirect()
                    ->back()
                    ->withErrors(['error' => $response['error']]);
            }

            return redirect($this->getUrl())
                ->with('success', $this->getName() . ' deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withErrors(['error' => $th->getMessage()]);
        }
    }

}
