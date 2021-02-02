@extends('Elearning.layout')
@section('content')
<div class="body">
    <div class="new">
        <a class="href" href="{{route('elearning.create')}}">Create new User</a>
        @if(session()->has('change') || session()->has('success'))
        <div class="alert alert-success">
            <p>{{session()->get('success')}}</p>
            <p>{{session()->get('change')}}</p>
        </div>
        @endif
        <a class="href" href="{{route('elearning.index')}}">Other action</a>
    </div>

    <div class="title usernavige">
        <p>All user</p>

    </div>
    <div class="contenu">
        <table>
            <thead>
                <th class="d"></th>
                <th class="id">id</th>
                <th>name</th>
                <th>email</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th></th>
                <th class="tb"></th>
            </thead>
            <tbody>
                <script>
                    let pagination = (totalLists, idMin, idMAX, numPages) => {

                    }
                    let a = Array()
                    let totalLists
                </script>

                @foreach($listsAll as $lis)
                <script>
                    a.push({{ $lis-> id}})
                    totalLists = {{ ceil(count($listsAll) / 10) }}
                </script>
                @endforeach
                <script>
                    let idMax = -Infinity;
                    let maxIDs = (array) => {
                        for (let i = 0; i < array.length; i++) {
                            if (array[i] > idMax) {
                                idMax = array[i]
                            }
                        }
                        return idMax
                    }
                    let idMin = Infinity;
                    let minIDs = (array) => {
                        for (let i = 0; i < array.length; i++) {
                            if (array[i] < idMin) {
                                idMin = array[i]
                            }
                        }
                        return idMin
                    }
                    console.log(minIDs(a));

                    console.log(maxIDs(a));    
                </script>
                @foreach($lists as $list)
                @if($list->isconnected)
                <tr class="connect e" id="{{$list->id}}">
                    <td class='d'><input type="checkbox" onClick="event.preventDefault();
                            document.getElementById('connect{{$list->id}}').submit();" name="{{$list->id}}"
                            id="{{$list->id}}" checked>
                    </td>

                    <td class='id'>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->email}}</td>
                    <td>{{$list->created_at}}</td>
                    <td>{{$list->updated_at}}</td>
                    <td><button class=" btn-go"><a href="{{route('elearning.edit', $list->id)}}">Modifier</a> </button>
                    </td>
                    <td>
                        <input type="button" onClick="event.preventDefault();
                            if(confirm('Are you sure to delete {{$list->name}}')) {
                            document.getElementById('delete{{$list->id}}').submit();}" name="{{$list->id}}"
                            id="{{$list->id}}" class="btn btn-annuler" value="Delete">
                        <form action="{{route('id.delete',$list->id)}}" method="post" id="delete{{$list->id}}">
                            @csrf
                            @method('delete')

                        </form>

                    </td>
                    <form action="{{route('id.disconnected',$list->id)}}" method="post" id='connect{{$list->id}}'>
                        <input type="hidden" class="listCourant" name="listCourant" value="">
                        @csrf
                        @method('patch')

                    </form>
                </tr>
                @else
                <tr class="noconnect e" id="{{$list->id}}">
                    <td class='id'><input type="checkbox"
                            onClick="event.preventDefault(); document.getElementById('noconnect{{$list->id}}').submit();"
                            name="{{$list->id}}" id="{{$list->id}}"></td>

                    <td class='id'>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->email}}</td>
                    <td>{{$list->created_at}}</td>
                    <td>{{$list->updated_at}}</td>
                    <td><button class=" btn-go"><a href="{{route('elearning.edit',$list->id)}}">Modifier</a> </button>
                    </td>
                    <td>
                        <form action="{{route('id.delete',$list->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn-annuler" value="Delete">
                        </form>
                    </td>
                </tr>
                <form action="{{route('id.connected',$list->id)}}" method="post" id='noconnect{{$list->id}}'>
                    <input type="hidden" class="listCourant" name="listCourant" value="">

                    @csrf
                    @method('put')

                </form>
                @endif
                @endforeach
            </tbody>
            <tfoot>

                <tr>
                    <td class="tb">

                    </td>
                    <td class="tb"><button class="btn" id="prevpage" onClick="prev()">Previous</button>

                        <form action="{{route('elearning.prev', ['page'=>2])}}" id="prev" method="post">
                            <input type="hidden" name="id" id="id_prev" value="">
                            @csrf
                            @method('post')
                        </form>
                    </td>
                    <td class="tb">
                        <button id="modifieall" style="display:none" class="btn btn-go"
                            onClick="event.preventDefault(); document.getElementById('m_all').submit();">Modifier
                            Selected</button>
                        <form action="{{route('elearning.m_all')}}" id="m_all" method="post">
                            <input type="hidden" name="m_all" id="m_groupeobject" value="">
                            <input type="hidden" class="listCourant" name="listCourant" value="">
                            @csrf
                            @method('post')
                        </form>
                    </td>

                    <td class="tb">
                        <button id="connectedall" style="display:none" class="btn btn-go"
                            onClick="event.preventDefault(); document.getElementById('c_all').submit();">Connected
                            all</button>
                        <form action="{{route('elearning.c_all')}}" id="c_all" method="post">
                            <input type="hidden" name="dc_all" id="dc_groupeobject" value="">
                            <input type="hidden" class="listCourant" name="listCourant" value="">
                            @csrf
                            @method('post')
                        </form>
                    </td>

                    <td class="tb">
                        <input type="button" id="disconnectedall" style="display:none" class="btn btn-annuler"
                            onClick="event.preventDefault(); document.getElementById('dc_all').submit();"
                            value=" Disconneted all Selected">
                        <form action="{{route('elearning.dc_all')}}" id="dc_all" method="post">
                            <input type="hidden" name="c_all" id="c_groupeobject" value="">
                            <input type="hidden" class="listCourant" name="listCourant" value="">
                            @csrf
                            @method('post')
                        </form>

                    </td>
                    <td class="tb">
                        <button id="deleteall" style="display:none" class="btn btn-annuler"
                            onClick="event.preventDefault(); if(confirm('Are sure delete you selected')) {document.getElementById('del_all').submit();}">Delete
                            Selected</button>
                        <form action="{{route('elearning.del_all')}}" id="del_all" method="post">
                            <input type="hidden" name="del_all" id="del_groupeobject" value="">
                            @csrf
                            @method('post')
                        </form>
                    </td>
                    <td class="tb"><button class="btn" id="nextpage" onClick="next()">Next</button>
                        <form action="{{route('elearning.next',['page'=>2])}}" id="next" method="post">
                            <input type="hidden" name="id" id="id_next" value="">
                            @csrf
                            @method('post')
                        </form>
                    </td>
                    <td><span id="page">1</span> / <span id="perpages">{{ceil(count($listsAll)/10)}}</span> </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
</div>
<script>
    let af = document.querySelectorAll('.e')
    let listCourantID = Array()
    let grand = -Infinity
    let petit = Infinity
    for (let i = 0; i < af.length; i++) {
        listCourantID.push(af[i].getAttribute('id'));
        if (parseInt(af[i].getAttribute('id')) > grand) {
            grand = parseInt(af[i].getAttribute('id'))
        }
        if (parseInt(af[i].getAttribute('id')) < petit) {
            petit = parseInt(af[i].getAttribute('id'))
        }
    }
    localStorage.setItem('listCourant', [grand, petit])
</script>
@endsection