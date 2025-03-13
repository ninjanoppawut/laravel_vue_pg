<?php
namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Test;
class TestController extends Controller
{
    public function index() {
        return Inertia::render('TestIndex',[
            'tests' =>  Test::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Test');
    }

    public function show($id) {
    }

    public function store(Request $request)  {
        //
        $test= Test::create($request->all());

        return redirect()->route('test.index')->with('success', 'Form submitted successfully!');
    }
    public function destroy($id) {
        $test = Test::findOrFail($id);
        $test->delete();

        return redirect()->route('test.index')->with('success', 'Deleted successfully!');
    }
    public function edit(Test $test)
    {
        return Inertia::render('TestEdit', ['test' => $test]);
    }
    public function update(Request $request, Test $test) {
        $test->update($request->all());

        return redirect()->route('test.index')->with('success', 'Updated Successfully!');
    }
}
