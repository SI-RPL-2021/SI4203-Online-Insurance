<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{

    /** Customer-only */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        return view('pages.agents.detail', ['agent' => $agent]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $agents = Agent::all();
        return view('pages.agents.index', ['agents' => $agents]);
    }



    /** Admin-only */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();
        $admins = User::where('role', 'admin')->get();

        return view('dashboard.agents.index', ['agents' => $agents, 'admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forUser = $request->only(['email', 'name', 'role']);
        $forUser['verified'] = true;
        $forUser['password'] = Hash::make($request->password);

        $user = User::create($forUser);

        if ($request->role === 'agent') {
            $forAgent = $request->except(['email', 'password', 'name', 'role']);
            $forAgent['user_id'] = $user->id;
            Agent::create($forAgent);
        }

        return redirect()->route('dashboard.agents.index')->with('message', 'Berhasil menambahkan user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        $users = User::whereNull("agent_id")->where('role', 'customer')->get();
        $customers = User::where("agent_id", Auth::user()->id)->get();
        return view('dashboard.agents.edit', ['agent' => $agent, 'users' => $users, 'customers' => $customers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->update($request->only(['role', 'name']));
        }
        $agent->update($request->only(['phone', 'status']));

        return redirect()->route('dashboard.agents.index')->with('message', 'Berhasil mengupdate user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        Agent::destroy($agent->id);
        return redirect()->route('dashboard.agents.index')->with('message', 'Berhasil menghapus user');
    }

    public function addCustomer(Request $request)
    {
        $customer_id = $request->get('customer_id');
        $agent_id = $request->get('agent_id');

        $user = User::find($customer_id);
        $user->update(['agent_id' => $agent_id]);

        $agent = Agent::find($agent_id);
        $agent->customers()->save($user);

        return redirect()->back();
    }

    public function removeCustomer($id)
    {
        // $agent = Agent::where('user_id', $request->get('agent_id'))->get();
        $user = User::find($id);
        if ($user) {
            $user->update(['agent_id' => null]);
        }
        return redirect()->back();
    }
}
