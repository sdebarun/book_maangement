@extends('layouts.master')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body"><h3>Add New Bookmark</h3></div>
    </div>    
    <hr/>
    @if(session('status'))
        @if(session('status')==0)
            <div class="alert alert-danger">Bookmark could not be added </div>
        @endif
        @if(session('status')==1)   
            <div class="alert alert-success">Bookmark successfully added </div>
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

    <form action="/bookmarks/doaddmark" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="publisherName">Name of the Bookmark</label>
            <input type="file" class="form-control" id="bookMarkIMage" name='bookMarkIMage'>
        </div>
        <div class="form-group">
            <label for="bookname">Attached with</label>
            <select id="bookname" name="bookname" class="form-control">
                <option value="-1">---Select Book---</option> 
                @foreach($books as $book)
                    <option value="{{$book->id}}">{{$book->bookName}}</option>           
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection