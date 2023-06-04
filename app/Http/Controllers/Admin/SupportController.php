<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(
        protected SupportService $service
    ){}


    public function index(Request $request)
    {
        // $supports = $support->all();
        
        $supports = $this->service->paginate(
            pages: $request->get('page', 1),
            totalPerPages: $request->get('per_page', 2),
            filter: $request->filter
        );

        $filters = ['filter' => $request->get('filter', '')];
        // dd($supports->items());
       
        return view('admin/supports/index', compact('supports', 'filters'));
    }

    public function show(string $id)
    {
        // Support::where('id', =",$id)->fisrt()

        // if(!$support = $supports->find($id)){
        //     return redirect()->back();
        // }
        
        if(!$support = $this->service->findOne($id)){
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
        $this->service->new(CreateSupportDTO::makeFromRequest($request));
        
        return redirect()->route('supports.index');
    }

    public function edit(string $id)
    {   
        // if(!$support = $supports->find($id)){
        //     return redirect()->back();
        // }

        if(!$support = $this->service->findOne($id)){
            return redirect()->back();
        }

        
        return view('admin/supports/edit', compact("support"));
    }

    public function update(StoreUpdateSupport $request, Support $supports, string $id)
    {

        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));
       
        if(!$support){
            return redirect()->back();
        }

        return redirect()->route('supports.index');

    }
    
    public function delete(string|int $id, Support $supports)
    {   
        if(!$support = $this->service->findOne($id)){
            return redirect()->back();
        }

        return view('admin/supports/delete', compact("support"));
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
