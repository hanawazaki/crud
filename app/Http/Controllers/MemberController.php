<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberStore;
use App\Http\Requests\MemberUpdate;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $members = Member::latest()->paginate($perPage);

        return inertia("Member/Index", [
            "members" => $members
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Member/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberStore $request)
    {
        // dd($request->all());
        $data = $request->validated();
        $member = Member::create($data);

        return redirect(route('member.index'))->with([
            'message' => 'Data Successfully Created!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return inertia('Member/View', [
            'member' => $member
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return inertia('Member/Edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberUpdate $request, Member $member)
    {
        // dd($request->all());

        $member->update($request->validated());

        return redirect(route('member.index'))->with([
            'message' => 'Data Successfully Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect(route('member.index'))->with([
            'message' => 'data deleted!'
        ]);
    }
}
