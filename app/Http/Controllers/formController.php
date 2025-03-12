<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\storeFormRequest;
use App\Models\formModel;
use App\Models\Form;
use Inertia\Inertia;
class formController extends Controller
{
    //
    public function index() {

        return Inertia::render('Test', [
            'forms' => Form::all(),
        ]);
        
    }
    public function show($id) {
       
    }

    public function store(storeFormRequest $request)  {

        $form= Form::create($request->validated());
         
        // return Inertia::render('Test', $form);
        return to_route('test');
    }
    public function destroy()
    {

        return to_route('test');
    }
}
