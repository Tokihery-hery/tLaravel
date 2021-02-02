
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
                    <form action="{{route('elearning.create')}}" method="post">
                    @csrf
                        <div class="form">
                            <div class="formModifall">
                                <div class="input">
                                    <label for="name">Name*:</label>
                                    <input type="text" class="form-control"  name="name">
                                </div>
                                <div class="input">
                                    <label for="email">Email*:</label>
                                    <input type="email" class="form-control"  name="email">
                                </div>
                                <div class="input">
                                <label for="password">Password*:</label>
                                    <input type="password"  class="form-control"   name="password">
                                </div>
                            </div>                     
                        </div> 
                        <div class="action-all">
                            <button type="reset" name="" class="btn btn-annuler" ><a href="{{route('elearning.index')}}">Annuler </a></button>
                            <input type="submit" name="" class="btn btn-go" value="Enregistrer">
                        </div>
                    </form>
               </div>
           </div>
       </div>
     
@endsection