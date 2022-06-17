<?php


namespace App\Http\Controllers;


use App\Souvenir;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class SouvenirController extends Controller
{
    public function index()
    {
        $souvenirs=auth()->user()->souvenir()->get();
        return view('souvenirs.index', ['souvenirs' => $souvenirs]);
    }

    public function AddSouvenir()
    {
        return view('souvenirs.add-souvenir');
    }

    public function show($id){
    $souvenir= Souvenir::find($id);
    if ($souvenir != null){
        return view('souvenirs.show-details',['souvenir' => $souvenir]);

    }
    else return back();

    }

    public function edit(Souvenir $souvenir)
    {
        return view('souvenirs.edit-souvenir',['souvenir' => $souvenir]);
    }

    public function Save(Request $request)
    {
 

        $validator = Validator::make($request->all(), [

            'name' => ['required', 'string', 'max:255'],
            'souvenir_date' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return back()->with(['errors' => $validator->errors()]);
        }
        $path = '';
        
        if($request->file){
           
            $path = Storage::putFile('images', $request->file);
        }
        
        
        $souvenir = Souvenir::create([
            'name' => $request->name,
            'description' => $request->description,
            'souvenir_date' => $request->souvenir_date,
            'path' => $path               

        ]);
            if ($souvenir) {
                $user = auth()->user();
                //$souvenir->User()->save($user);
                $user->souvenir()->save($souvenir);
                return redirect()->route('souvenirs.index')
                    ->with('success', 'Souvenir added successfully');
            } else {
                return response()->json([
                    'error' => true
                ], 200);
            }

    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => ['required', 'string', 'max:255'],
            'souvenir_date' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return back()->with(['errors'=>$validator->errors()]);
        }

        $souvenir =Souvenir::find($request->id);
        
        if($souvenir){
            $souvenir->update($request->all());

            if($request->file){
                //$fileName = time().'.'.$request->file->extension(); 
                //$request->file->move(public_path('images'), $fileName);
                $path = Storage::putFile('images', $request->file);
                //$path = 'images/'.$fileName;
                $souvenir->update(['path'=> $path]);
            }

            return redirect()->route('souvenirs.index')
                ->with('success','Souvenir updated successfully');
        }else{
            return response()->json([
                'error' => true
            ], 200);
        }
       
    }

   

    public function destroy(Souvenir $souvenir)
    {
        $souvenir->delete();

        return redirect()->route('souvenirs.index')
            ->with('success','Souvenir deleted successfully');
    }


 //Show Note's image by note id
 public function ShowSouvenirImage($souvenirId){
    $souvenir=Souvenir::find($souvenirId);
    if ($souvenir)

        return response()->file(storage_path('app/'.$souvenir->path));

    else return  response()->json([
        'error' => "error"
    ],200);
}


}
