<?php

namespace App\Http\Controllers;

use App\Teammate;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Show the form to create a new teammate
     * GET /team
     */
    public function team()
    {
        $team = Teammate::all();
        return view('team.list')->with([
            'team' => $team,
            'newTeammate' => new Teammate()
        ]);
    }

    /**
     * Show the form to edit an existing teammate
     * GET /team/{team_id}/edit/
     */
    public function edit($id)
    {
        $teammate = Teammate::find($id);

        return view('team.edit')->with([
            'newTeammate' => $teammate
        ]);
    }

    /**
     * Process the form to create a new teammate
     * POST /team/create
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $team = new Teammate();
        $team->name = $request->name;
        $team->email = $request->email;
        $team->save();

        return redirect('/team')->with('alert', 'Teammate was created');
    }

    /**
     * Process the form to edit an existing teammate
     * PUT /team/{id}
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $teammate = Teammate::find($id);

        $teammate->name = $request->name;
        $teammate->email = $request->email;

        $teammate->save();

        return redirect('/team')->with('alert', 'Teammate was updated');
    }

    /*
    * Asks user to confirm they actually want to delete the teammate
    * GET /team/{id}/delete
    */
    public function delete($id)
    {
        $team = Teammate::find($id);
        if (!$team) {
            return redirect('/team')->with('alert', 'Teammate not found');
        }
        return view('team.delete')->with([
            'team' => $team,
        ]);
    }

    /*
    * Actually deletes the book
    * DELETE /books/{id}/delete
    */
    public function destroy($id)
    {
        $team = Teammate::find($id);
        # Before we delete the book we have to delete any tag associations
        $team->activities()->detach();
        $team->delete();
        return redirect('/team')->with([
            'alert' => '“' . $team->name . '” was removed.'
        ]);
    }
}
