<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\TodoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class Todo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //     // $users= new User();
    //     // // dd($users);
    //     // $users->name="USE FOR USER NAMAE";
    //     // $users->email="akory abddddzedddddddyyhdhyy";
    //     // $users->password= bcrypt("USE FOR USER NAMAEbbbbbcc");
        $data=[
            'name'=>'rakoto be',
            'email'=>'rakoto be dia tena tsra ahhhnjjjhhnannaahhhmhhou aty an',
            'password'=> 'rakoto be bloh'

        ];
        // if(session()->has('image')){
        //    dd(session()->get('image'));
        // }
        // User::create($data);

    //     // $users->save();
    //     User::where('id', 7)->update(['name'=>"deo ahelklkelkjfeomjfhb"]);
    //     // User::where('id', 5)->delete();
    // //     DB::update('update users set name=?, email =? where id= 1', ['Sarobidy', 'saorbidy@bd.com']);
    // //    $userss= DB::select('select * from users');
    // //     // DB::insert('insert into users (name, email, password) values (?,?,?)', ['tokihery', 'tokihery@gmail', 'balalalalalala']);
    //     $userss= User::all();

        return view('showless');
    }
    public function uploadFile(Request $request){
        // $file =$request->file('image');
        if($request->hasFile('image')){
            User::uploadFileImage($request->image);
            // session()->put('image', $request->image->getClientOriginalName());
            return redirect()->back()->with('image', $request->image->getClientOriginalName());// message success

        }
        return redirect()->back();
        // dd($request->image);
    }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response  
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoModel  $todoModel
     * @return \Illuminate\Http\Response
     */
    public function show(TodoModel $todoModel)
    {
        
    }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\TodoModel  $todoModel
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(TodoModel $todoModel)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\TodoModel  $todoModel
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, TodoModel $todoModel)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\TodoModel  $todoModel
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(TodoModel $todoModel)
//     {
//         //
//     }
}
