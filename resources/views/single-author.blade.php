@extends('layouts.master')
@section('content')
    <div class="container">
        @if(session('status'))
            @if(session('status')==0)
                <div class="alert alert-danger">User could not be Updated. </div>
            @endif
            @if(session('status')==1)   
                <div class="alert alert-success">User successfully Updated. </div>
            @endif 
        @endif 

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="panel panel-default">
        <div class="panel-body"><h3>Author Details</h3></div>
        <hr/>
        <form action="/author/doedit/{{$retval['id']}}" method='POST'>
            @csrf
            <input type="hidden" class="form-control" name='id' value="{{$retval['id']}}">
            <div class="form-group">
                <label for="authorName">Name of the Author</label>
                <input type="text" class="form-control" id="authorName" name='authorName' value="{{$retval['authorName']}}">
            </div>
            <div class="form-group">
                <label for="authorDescription">Description (optional):</label>
                <textarea class="form-control" rows="5" id="authorDescription" name='authorDescription'>{{$retval['authorDescription']}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection