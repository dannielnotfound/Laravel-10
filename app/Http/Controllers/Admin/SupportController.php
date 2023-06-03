<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();
        return view('admin/supports/index', compact('supports'));
    }

    public function show(Support $supports, string|int $id)
    {
        // Support::where('id', =",$id)->fisrt()

        if(!$support = $supports->find($id)){
            return redirect()->back();
        }
        
        return view('admin/supports/show', compact("support"));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $request = $request->only(['subject', 'body']);
        $support->create($request);
        
        return redirect()->route('supports.index');
    }

    public function edit(string|int $id, Support $supports)
    {   
        if(!$support = $supports->find($id)){
            return redirect()->back();
        }
        
        return view('admin/supports/edit', compact("support"));
    }

    public function update(StoreUpdateSupport $request, Support $supports, string|int $id)
    {
       
        if(!$support = $supports->find($id)){
            return redirect()->back();
        }
        
        $data = $request->only(['subject', 'body']);
        $support->update($data);

        return redirect()->route('supports.index');

        
    }
    
    public function delete(string|int $id, Support $supports)
    {   

        if(!$support = $supports->find($id)){
            return redirect()->back();
        }

        
        return view('admin/supports/delete', compact("support"));
    }

    public function destroy(string|int $id, Support $supports)
    {
        if(!$support = $supports->find($id)){
            return redirect()->back();
        }

        $support->destroy($id);

        return redirect()->route('supports.index');
    }
}
