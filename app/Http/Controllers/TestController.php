<?php
namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Test;
class TestController extends Controller
{
    public function index() {}

    public function show($id) {}

    public function store(Request $request)  {
        //
        $test= Test::create($request->validated());

        return redirect()->route('test.index')->with('success', 'Form submitted successfully!');
    }

}
