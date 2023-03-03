<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AgentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AgentController extends Controller
{
    public function index(AgentDataTable $dataTable)
    {
        return $dataTable->render('admin.agents.index');
    }

    public function show(Agent $agent)
    {
        return view('admin.agents.show', compact('agent'));
    }

    public function edit(Agent $agent)
    {
        return view('admin.agents.edit', compact('agent'));
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();

        return redirect()->route('admin.agents.index')->with('success', 'Agent Deleted Successfully');
    }

    public function updateStatus(Request $request, Agent $agent)
    {
        $agent->update(['status'=>!$agent->status]);
        
        $request->session()->flash('success', 'Status Update Successfully');

        return redirect()->route('admin.agents.index');
    }

    public function updatePassword(Request $request, Agent $agent)
    {
        $request->validate([
            'password' => [
                'required','string','confirmed',
                Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
            ],
        ]);

        $agent->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return redirect()->route('admin.agents.index');
    }
}
