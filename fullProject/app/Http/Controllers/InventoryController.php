<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Inventory;
use Illuminate\Http\Request;

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
        Inventory::create($request->all());

        return redirect()->route('home')->with('success', 'Inventory created successfully.');
    }

    public function edit(Inventory $inventory)
    {
        $employees = Employee::query()->get();

        return view('inventory.update', compact('inventory','employees'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $inventory->update($request->all());

        return redirect()->route('home')->with('success', 'Inventory updated successfully.');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('home')->with('success', 'Inventory deleted successfully.');
    }
}
