<?php

namespace App\Http\Controllers;

use App\Core\BaseController;
use App\Repositories\VendedorRepository;
use App\Http\Requests\VendedorRequest;
use Carbon\Carbon;

class VendedorController extends BaseController
{
    public function __construct(VendedorRepository $vendedorRepository) {
        $this->vendedorRepository = $vendedorRepository; 
    }

    public function index()
    {
        $vendedores = $this->vendedorRepository->all();

        return view('vendedor.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedor.create');
    }

    public function store(VendedorRequest $request)
    {
        try {
            $data = $request->all();
            $vendedor = $this->vendedorRepository->create($data);
            
            if (!$vendedor) {
                // send flash message error
                return redirect()->back()->withInput($request->all());
            }

            // send flash message success
            return redirect()->route('vendedores.index');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            }
            // send flash message custom error
            return redirect()->route('vendedores.index');
        }
    }

    public function edit($id)
    {
        $vendedor = $this->vendedorRepository->find($id);
            
        if (!$vendedor) {
            // send flash message error
            return redirect()->back();
        }
 
        return view('vendedor.edit', compact('vendedor'));
    }

    public function update(VendedorRequest $request, $id)
    {
        try {
            $data = $this->vendedorRepository->find($id);

            if (!$data) {
                // send flash message error
                return redirect()->back()->withInput($request->all());
            }

            if (!$this->vendedorRepository->update($request->all(), $data->ven_id, 'ven_id')){
                // send flash message error
                return redirect()->back()->withInput($request->all());
            }

            // send flash message success
            return redirect()->route('vendedores.index');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                 // send flash message custom error
                return redirect()->back();
            }
        }

    }

    public function destroy($id)
    {
        try {
            if ($this->vendedorRepository->delete($id)) {
                // send flash message success
            } else {
                // send flash message error
            }
            return redirect()->back();
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                // send flash message custom error
                return redirect()->back();
            }
        }
    }
}
