@extends('layouts.master')
@section('content')
    <div class="container">
        @if(session('status'))
            @if(session('status')==0)
                <div class="alert alert-danger">Publisher could not be Updated. </div>
            @endif
            @if(session('status')==1)   
                <div class="alert alert-success">Publisher successfully Updated. </div>
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
        <div class="panel-body"><h3>Publisher Details</h3></div>
        <hr/>
        <form action="/publisher/doedit/{{$retval['id']}}" method='POST'>
            @csrf
            <input type="hidden" class="form-control" name='id' value="{{$retval['id']}}">
            <div class="form-group">
                <label for="publisherName">Name of the Author</label>
                <input type="text" class="form-control" id="publisherName" name='publisherName' value="{{$retval['publisherName']}}">
            </div>
            <div class="form-group">
                <label for="publisherDescription">Description (optional):</label>
                <textarea class="form-control" rows="5" id="publisherDesription" name='publisherDesription'>{{$retval['publisherDesription']}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
         </form>

    </div>
@endsection