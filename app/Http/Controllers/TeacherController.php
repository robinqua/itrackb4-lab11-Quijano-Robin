<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller

{
    private function teachers()
{
    return [
        1 => ['id' => 1, 'name' => 'Prof. Reyes',  'department' => 'CICT',
              'subject' => 'Web Programming'],
        2 => ['id' => 2, 'name' => 'Prof. Santos', 'department' => 'CICT',
              'subject' => 'Database Systems'],
        3 => ['id' => 3, 'name' => 'Prof. Cruz',   'department' => 'CAS',
              'subject' => 'Mathematics'],
    ];
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return view('teachers.index', ['teachers' => $this->teachers()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teachers = $this->teachers();
 
    if (! isset($teachers[$id])) {
        abort(404);
    }
 
    return view('teachers.show', ['teacher' => $teachers[$id]]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function featured()
{
    $teachers = $this->teachers();
 
    return view('teachers.show', ['teacher' => $teachers[1]]);
}

}
