<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InventoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inventories = Inventory::query()->orderBy('status')->with('employee')->get();
        return view('inventory.index',compact('inventories'));
    }

    public function create()
    {
        $employees = Employee::query()->get();

        return view('inventory.create',compact('employees'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'employee_id' => 'required|exists:employees,id',
            'status' => 'required|in:opened,closed',
        ]);

        try {
            Inventory::query()->create($validatedData);

            return redirect()->route('home')->with('success', 'Inventory created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Error creating inventory: ' . $e->getMessage());
        }
    }

    public function edit(Inventory $inventory)
    {
        $employees = Employee::query()->get();

        return view('inventory.update', compact('inventory','employees'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'employee_id' => [
                'required',
                Rule::exists('employees', 'id')->where(function ($query) {
                    $query->where('id', $this->input('employee_id'));
                }),
            ],
            'status' => 'required|in:opened,closed',
        ]);

        try {
            $inventory->update($validatedData);

            return redirect()->route('home')->with('success', 'Inventory updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Error updating inventory: ' . $e->getMessage());
        }
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('home')->with('success', 'Inventory deleted successfully.');
    }
}
