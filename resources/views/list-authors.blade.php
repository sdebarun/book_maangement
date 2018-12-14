@extends('layouts.master')
@section('additional_styles')
    <link rel="stylesheet" href="{{asset('css/datatable.min.css')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
@endsection
   
@section('additional_scripts')
    <script src="{{asset('js/datatable.min.js')}}" defer ></script>
    <script src="{{asset('js/script.js')}}" defer></script>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
    <div class="panel-body"><h3>Authors</h3></div>
    <hr/>
    @if(session('status'))
        @if(session('status')==0)
            <div class="alert alert-danger">User could not be Deleted </div>
        @endif
        @if(session('status')==1)   
            <div class="alert alert-success">User successfully Deleted </div>
        @endif 
    @endif 
    </div>
    <table id="allauthors" class="table table-striped table-bordered hover" style="width:100%">
        <thead>
            <tr align="center">
                <th>Sr.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $sr = 1; ?>
        @foreach($retval as $val)
            <tr align="center" class='test'>
                <td>{{$sr++}}</td>
                <td>{{$val['authorName']}}</td>
                <td>{{$val['authorDescription']}}</td>
                <td> 
                    <a href="/author/edit/{{$val['id']}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <form action="{{route('author.delete', ['id' => $val['id']])}}" method="POST" id='formTodel'>
                        @csrf
                        <button type='submit' class="btn btn-primary btn-sm del" data-id="{{$val['id']}}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> 
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>  
</div>
          
@endsection