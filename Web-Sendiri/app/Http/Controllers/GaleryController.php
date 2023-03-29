<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $request){
        if ($request->search){
            $image=Galery::where('name', 'LIKE', "%$request->search%")->get();
            return $image;
        }
        $image = Galery::all();
        return view ('galeries.index',
    compact('image'));
}

public function create() {
    return view('galeries.create');
}

public function store(ImageRequest $request) {
    Galery::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $request->file('image')->store('image'),
    ]);
    return redirect('/galeries');
}

public function edit($id) {
    $editGalery= Galery::where('id', $id)->first();
        return view('galeries.edit', compact('editGalery'));
}

public function update(Request $request, $id) {
    if(empty($request->file('image'))){
        Galery::where('id', $id)->update([
            'name'=>$request->name,
            'description' =>$request->description,
        ]);
        return redirect()->route('profile', $id);
    } else {
        Galery::where('id', $id)->update([
            'name'=>$request->name,
            'description' =>$request->description,
            'image' => $request->file('image')->store('image')
        ]);
    }
    return redirect('/galeries');
}

public function delete($id) {
    $deleteGalery= Galery::where('id', $id)->delete();
        return redirect('/galeries');

}
}
