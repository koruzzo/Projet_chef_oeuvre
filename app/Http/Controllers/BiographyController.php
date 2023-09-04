<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\User;
use App\Http\Requests\StoreBiographyRequest;
use App\Http\Requests\EditBiographyRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Point;
use Illuminate\Http\Request;


class BiographyController extends Controller
{
    public function indexApifan(Request $request)
    {
        $query = User::where('role', 'apifan');
        $role = $request->input('role');

        if ($role === 'apiculteur') {
            return redirect()->route('biographies.indexApiculteur');
        }
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('ville', 'like', '%' . $search . '%');
            });
        }
    
        $biographies = $query->paginate(9);
    
        return view('biographies.indexApifan', compact('biographies'));
    }

    public function indexApiculteur(Request $request)
    {
        $query = User::where('role', 'apiculteur');
        $role = $request->input('role');

        if ($role === 'apifan') {
            return redirect()->route('biographies.indexApifan');
        }

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('ville', 'like', '%' . $search . '%');
            });
        }
    
        $biographies = $query->paginate(9);
    
        return view('biographies.indexApiculteur', compact('biographies'));
    }

    public function create()
    {
        return view ('biographies.create');
    }
    
    public function store(StoreBiographyRequest $request)
    {
        $imageName = $request->file('picture')->store('biographies');

        $biography = new Biography([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'picture' => $imageName,
            'secret' => $request->input('secret'),
            'user_id' => auth()->id()
        ]);
    
        $biography->save();
    
        return redirect()->route('biographies.show', ['biography' => $biography])
            ->with('success', 'Votre post a été créé');
    }

    public function show(Biography $biography)
    {
        return view('biographies.show', compact('biography'));
    }

    public function edit(Biography $biography)
    {
        $this->authorize('isThatYourBiography', $biography);
        return view('biographies.edit', compact('biography'));
    }

    public function update(EditBiographyRequest $request, Biography $biography)
    {
        $this->authorize('isThatYourBiography', $biography);

        $validatedData = $request->validated();

        $arrayUpdate = [
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'secret' => $validatedData['secret'],
        ];

        if ($request->hasFile('picture')) {
            $imageName = $validatedData['picture']->store('biographies');

            $arrayUpdate['picture'] = $imageName;
        }

        $biography->update($arrayUpdate);

        return redirect()->route('biographies.show', compact('biography'))->with('success', 'Votre post a été modifié');
    }


    public function addpoint(Biography $biography)
{
    $user = auth()->user();

    if (!$biography->userWithPoint->contains($user)) {
        $point = new Point([
            'biography_id' => $biography->id,
            'user_id' => $user->id,
        ]);
        $point->save();
    }

    return back();
}

public function delpoint(Biography $biography)
{
    $user = auth()->user();

    if ($biography->userWithPoint->contains($user)) {
        $biography->userWithPoint()->detach($user);
    }

    return back();
}
}
