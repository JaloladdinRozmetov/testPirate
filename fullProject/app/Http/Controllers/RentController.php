<?php

namespace App\Http\Controllers;

use App\Models\CLient;
use App\Models\Inventory;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::query()->with('client','inventory.employee')->get();

        return view('rents.index', compact('rents'));
    }

    public function create()
    {
        $clients = Client::query()->get();
        $inventories = Inventory::query()->where('status','opened')->get();

        return view('rents.create', compact('clients', 'inventories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_date' => 'required|date',
            'last_date' => 'required|date|after_or_equal:first_date',
            'client_id' => 'required|exists:clients,id',
            'inventory_id' => 'required|exists:inventories,id',
            'rent_cost' => 'required|numeric|min:0',
        ]);

        Rent::query()->create($request->all());

        $this->changeStatusInventory($request->inventory_id);

        return redirect()->route('rents.index')->with('success', 'Rent created successfully!');
    }

    public function destroy(Rent $rent)
    {
        $rent->delete();

        return redirect()->route('rents.index')->with('success', 'Rent deleted successfully.');
    }

    public function changeStatusInventory($inventory_id)
    {
        $inventory = Inventory::query()->findOrFail($inventory_id);
        $inventory->update([
            'status'=>'closed'
        ]);
    }
}
