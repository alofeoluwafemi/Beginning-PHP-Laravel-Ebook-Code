<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventory;
use App\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public $inventory;

    public function __construct(Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    public function createInventory()
    {
        return view('new-inventory');
    }

    public function storeInventory(StoreInventory $storeInventory)
    {
        auth()->user()->inventories()->create($storeInventory->only('item','quantity'));

        return redirect()->route('inventory.all')->with('message','New inventory successfully added!');
    }

    public function viewInventories()
    {
        $inventories = $this->inventory->all();

        return view('view-inventories',compact('inventories'));
    }

    /**
     * @param Inventory $inventory
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function drop(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventory.all')->with('message','New inventory successfully added!');

    }

    public function viewTrash(Inventory $inventory)
    {
        $inventories = $inventory->onlyTrashed()->get();

        return view('trash',compact('inventories'));
    }

    public function restoreItem($inventory)
    {
        if($item = $this->inventory->withTrashed()->find($inventory)) {
            $item->restore();
        }

        return redirect()->route('inventory.all')->with('message','Inventory successfully restored!');
    }

    public function purgeItem($inventory)
    {
        if($item = $this->inventory->withTrashed()->find($inventory)) {
            $item->forceDelete();
        }

        return redirect()->route('inventory.all')->with('message','Inventory permanently deleted!');
    }

    public function editInventory(Inventory $inventory)
    {
        return view('edit-inventory',compact('inventory'));
    }

    /**
     * @param StoreInventory $storeInventory
     * @param Inventory $inventory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateInventory(StoreInventory $storeInventory, Inventory $inventory)
    {
        $inventory->update($storeInventory->only('item','quantity'));

        return redirect()->route('inventory.all')->with('message','Inventory successfully updated!');
    }
}