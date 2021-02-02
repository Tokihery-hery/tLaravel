@extends('Elearning.layout')

@section('content')
<div class="body"> 
           
           <div class="title">
            <p>Create nex User</p>
           </div>
           @if(session()->has('success'))
           <div class="alert alert-success">
               <p>{{session()->get('success')}}</p>
           </div>
           @endif

           @if(session()->has('error'))
           <div class="alert alert-error">
               <p>{{session()->get('error')}}</p>
           </div>
           @endif

           @if($errors->any())
           <div class="alert alert-error">
               <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
               </ul>
              
           </div>
            @endif

           <div class="contenu">
               <div class="input-face">
                    @if(is_object($lists))
                        @foreach($lists as $id)
                        <form action="{{route('elearning.update', $id->id)}}" method="post"> 
                            
                            @csrf
                            @method('patch')
                            <label for="name">Name*:</label>
                            <input type="text" class="form-control" value=" {{$id->name}}" name="name">
                            <label for="email">Email*:</label>
                            <input type="email" class="form-control" value=" {{$id->email}}"  name="email">
                            <input type="hidden" class="form-control" value=" {{$id->password}}"  name="password">
                            <div class="action-all">
                                <button type="reset" name="" class="btn btn-annuler" ><a href="{{route('elearning.index')}}">Annuler Tous</a></button>
                                <input type="submit" name="" class="btn btn-go" value="Update  ">
                            </div>
                        </form>
                        @endforeach
                    @endif
                    @if($listSelect)
                    <form action="{{route('elearning.update_all')}}" id="modif_all" method="post" class="allform"> 
                    <input type="hidden" name="all_data" id="all_data" value="">
                        @csrf
                        @method('post')
                        @foreach($listSelect as $id)

                        <div class="form" id="id_{{$id->id}}">
                            <span class="fermer" onClick="fermer('id_'+{{$id->id}})" title="Fermer cette bloc">x</span>
                            <div class="formModifall">
                                <div class="input">
                                    <label for="name">Name*:</label>
                                    <input type="text" class="form-control" value=" {{$id->name}}" name="name">
                                </div>
                                <div class="input">
                                    <label for="email">Email*:</label>
                                    <input type="email" class="form-control" value=" {{$id->email}}"  name="email">
                                </div>
                                <div class="input">
                                    <input type="hidden" style="display:none" class="form-control"   name="password">
                                </div>
                            </div>                     
                       </div>   
                        @endforeach
                    </form>
                    @endif
               </div>
               @if(session()->has('allsuccess'))
               <div class="return">
                    <div class="alert alert-success">
                        <p>{{session()->get('allsuccess')}}</p>
                    </div>
                    <div class="action">
                        <button type="button" name="" class="btn btn-annuler" ><a href="{{route('elearning.index')}}">Aller à la list</a></button>
                    </div>
               </div>
               @endif
               @if(is_array($listSelect) && count($listSelect) > 1)
               <div class="action-all">
                        <button type="reset" name="" class="btn btn-annuler" ><a href="{{route('elearning.index')}}">Annuler Tous</a></button>
                        <input type="submit" name="" class="btn btn-go" value="Update Tous "
                        onClick="event.preventDefault();formAll()" 
                        >
                        <form action="{{route('elearning.update_all')}}" id="" method="">
                            <input type="hidden" name="all" id="all" value="">
                            @csrf
                            @method('post')
                        </form>
                </div>
                @endif
           </div>
</div>
@endsection