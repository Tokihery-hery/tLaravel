<?php

namespace App\Http\Controllers;

use App\Models\Elearning;
use Illuminate\Http\Request;
use App\Http\Requests\ElearningRequest as eRequest;// generer l'erreur deu request
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ElearningController extends Controller
{

    public function all(){
        $listsAll= Elearning::orderBy('id', 'asc')->get();
        return $listsAll;
    }


    public function index()
    {
        $lists=DB::table('elearnings')->orderBy('id', 'asc')->paginate(10);
        // $lists= Elearning::orderBy('isconnected')->paginate(3)->get();
        // return view('elearning.index')->with(['lists'=>$lists]); // mety io fa misy methode hafa ko io ambani io
        $listsAll = $this->all();
        return view('elearning.index', compact('listsAll', 'lists'));
        // dd(compact('lists'));
    }



      public function api()
    {
        $lists= Elearning::orderBy('isconnected')->limit(10)->get();
        // return view('elearning.index')->with(['lists'=>$lists]); // mety io fa misy methode hafa ko io amboni io
        return $lists;
        
    }



    public function api_getId(Request $request)
    {
        $lists= Elearning::where('id', $request->id)->get();
        // return view('elearning.index')->with(['lists'=>$lists]); // mety io fa misy methode hafa ko io amboni io
        return $lists;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Elearning.create');
    }



    public function store(eRequest $request)
    {
        $rule=[
            'name'=>'required|max:191|min:3',
            'email'=>'required|max:191|min:12',
            'password'=>'required|max:191|min:8',
        ];
        // $request->validate([
        //     'name'=>'required|max:191|min:3',
        //     'email'=>'required|max:191|min:13',
        //     'password'=>'required|max:191|min:8',

        // ]);
        $message=[
            'name.required'=>'Name n\'est peut  pas vide obigatoire',
            'email.required'=>'Email n\'est peut  pas vide obigatoire',
            'password.required'=>'Password n\'est peut  pas vide obigatoire',
            'name.min'=>'Name au moins 3 character',
            'email.min'=>'Email au moinss 13 charctaire',
            'password.min'=>'Password ua moins 8 ',
            'name.max'=>'Votre name est plus long veuiller au plus 191 characters',
            'email.max'=>'Votre email est plus long veuiller au plus 191 characters',
            'password.max'=>'Votre mot de pass est plus long veuiller au plus 191 characters ',

        ];
        $v=Validator::make($request->all(), $rule, $message);
        if($v->fails()){
            return redirect()->back()
                    ->withErrors($v)
                    ->withInput();

        }
        if(!$request->name || !$request->email || !$request->password){
            return redirect()->back()->with(['error'=>'Please Give completed all']);

        }

           Elearning::create($request->all());
           return redirect()->back()->with(['success'=>'Successfull']);
    }




    public function show(Elearning $elearning)
    {
        //
    }



    public function edit(Elearning $id)
    {
        $users = Elearning::find($id); 
        return view('Elearning.edit')->with('lists', $users)->with('listSelect', '');

    }

    

    public function update(eRequest $request, Elearning $id)
    {
        $data =[
            'name'=>$request->name,
            'email'=>$request->email
        ];
        $old = Elearning::find($id->id);
        $success="";
        if($request->name ===$old->name && $request->email != $old->email)
        {
            $success = "Success  but name is no change";
            $change = 'Old email '.$old->email.'is change to '.$request->email;
        }
        if ($request->email=== $old->email && $request->name !=$old->name)
        {
            $success= 'Success update name but email is no change';
            $change = 'Old name '.$old->name.' is change to '.$request->name;
        }

        if($request->name ===$old->name && $request->email=== $old->email)
        {
            $success= 'Success but No change';
            $change="";
        }
        if($request->name !=$old->name && $request->email != $old->email)
        {
            $success= 'Successful all update';
            $change ='Old name '.$old->name.' is change to '.$request->name. ' and old email '.$old->email.' is change to '.$request->email;
        }

        $id->update($data);
        $listsAll = $this->all();

       return redirect(route('elearning.index', compact('listsAll')))
       ->with('success', $success)
       ->with('change', $change);
    }



    public function delete(Elearning $id){
        Elearning::where('id',$id->id)->delete();
        $listsAll = $this->all();
        return redirect(route('elearning.index', compact('listsAll')))->with('success', 'Deleted success');
    }


    public function connected(Request $request, Elearning $id){
        $list = explode(',',$request->listCourant);
        Elearning::where('id', $id->id)->update(['isconnected'=>true]);
        // dd($list);
        $lists= DB::select('select * from elearnings where id >=? AND id <=? order by id limit 10', [$list[1], $list[0]]);
        // dd($lists);
        $listsAll = $this->all();
        return view('elearning.index', compact('lists', 'listsAll'))->with('success', 'Update success '.$id->name. ' is connected');
    }


    public function disconnected(Request $request, Elearning $id){
        $list = explode(',',$request->listCourant);
        Elearning::where('id', $id->id)->update(['isconnected'=>false]);
        // dd($list);
        $lists= DB::select('select * from elearnings where id >=? AND id <=? order by id limit 10', [$list[1],$list[0]]);
        $listsAll = $this->all();
        return view('elearning.index', compact('lists', 'listsAll'))->with('success', 'Update success '.$id->name. ' is disconnected');
    }


    public function connectedAllSelected(Request $request){
        $data = explode(',',$request->dc_all);
        $list = explode(',',$request->listCourant);
        for($i=0; $i<=count($data)-1; $i++){
            Elearning::where('id', $data[$i])->update(['isconnected'=>true]);  
        }
        $lists= DB::select('select * from elearnings where id >=? and id <=? order by id', [$list[1], $list[0]]);
        $listsAll = $this->all();

        return view('elearning.index', compact('lists', 'listsAll'))->with('success', ' All is connected');
    }




     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function disconnectedAllSelected(Request $request)
    {
        $list = explode(',',$request->listCourant);
        $data = explode(',',$request->c_all);
        for($i=0; $i<=count($data)-1; $i++){
            Elearning::where('id', $data[$i])->update(['isconnected'=>false]);  
        }
        $lists= DB::select('select * from elearnings where id >=? and id <=? order by id', [$list[1], $list[0]]);
        $listsAll = $this->all();
        return view('elearning.index', compact('lists', 'listsAll'))->with('success', ' All is disconnected');
    }



    public function deleteAllSelected(Request $request)
    {
        $data = explode(',',$request->del_all);
        for($i=0; $i<=count($data)-1; $i++){
            Elearning::where('id', $data[$i])->delete();  
        }
        $lists= DB::select('select * from elearnings where id <? limit 10', [$data[count($data)-1]]);
        $listsAll = $this->all();
        return view('elearning.index', compact('lists', 'listsAll'))->with('success', ' All is deleted');
    }



    public function modifAllSelected(Request $request)
    {
        $handlers =array();
        $data = explode(',',$request->m_all);
        for($i=0; $i<=count($data)-1; $i++){
            $handler = Elearning::find($data[$i]);  
            array_push($handlers, $handler);
        } 
        $listsAll = $this->all();

        return view('Elearning.edit', compact('listsAll'))->with('listSelect', $handlers)->with('lists', '');
    }



    public function updateAllSelected(Request $request)
    {
        $list = explode(',',$request->listCourant);
        $lists = array();

        $data = explode(',', $request->all_data);// conversion string separer par virgule en array
        $idlist = array();
        for ($i=0; $i < count($data); $i+=3) { 
            $id= trim(str_replace('id_', '', $data[ $i ]));
            array_push($idlist, $id);
            $name = trim($data[$i+1]);
            $email = trim($data[$i+2]);
            Elearning::where('id', $id)->update(compact("name", "email"));
        }
        $lists = array();
        for ($i=0; $i < count($idlist); $i++) { 
            array_push($lists, Elearning::find($idlist[$i]));
        }
        $listsAll = $this->all();
        return view('elearning.index', compact('lists', 'listsAll'))
        ->with('success', 'update successfull');
    }



    public  function next(Request $request){
        $id =$request->id;
        $lists= DB::select('select * from elearnings where id >=? order by id asc limit 10', [$id]);
        // dd($lists);
        $listsAll = $this->all();
        return view('elearning.index', compact('lists', 'listsAll'));
    }



    public  function prev(Request $request){
        $id =$request->id;
        $id!='-Infinity' && !empty($id)?$lists=DB::select('select * from elearnings where id <=? order by id desc limit 10', [$id]):$lists=DB::select('select * from elearnings order by id desc limit 10');
        $listsAll = $this->all();
        return view('elearning.index', compact('lists', 'listsAll'));
    }
    
    
}


