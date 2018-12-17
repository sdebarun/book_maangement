@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body"><h3>Details of the Book</h3></div>
        </div>    
        <hr/>
        @if(session('status'))
            @if(session('status')==0)
                <div class="alert alert-danger">Book could not be updated </div>
            @endif
            @if(session('status')==1)   
                <div class="alert alert-success">Book successfully updated </div>
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

        <form action="/books/doedit/{{$bookDetails['id']}}" method='POST'>
            @csrf
            <div class="form-group">
                <label for="bookName">Name of the Book</label>
                <input type="text" class="form-control" id="bookName" name='bookName' value="{{$bookDetails['bookName']}}">
            </div>
            <div class="form-group">
            <label for="authors">Author(s) of the Book</label>
            <select multiple name="authors[]" class="form-control" id="authors">
                
                @foreach($authorlist as $author)
                    @if(array_key_exists($author['id'],$bookDetails["authors"]))
                        <?php $selected1 = 'selected'; ?>
                    @else 
                        <?php $selected1 = ''; ?>   
                    @endif 
                    <option value="{{$author['id']}}" {{$selected1}}>{{$author['authorName']}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="publisher_id">Name of the Publisher</label>
            <select name="publisher_id" class="form-control" id="publisher_id">
                @foreach($publisherlist as $publisher)
                        @if($publisher['id'] == $bookDetails['publisher_id'])
                            <?php $selected = 'selected'; ?>
                        @else
                            <?php $selected = ''; ?>
                        @endif
                    <option value="{{$publisher['id']}}" {{$selected}} data-id="{{$bookDetails['publisher_id']}}">{{$publisher['publisherName']}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                <label for="bookDescription">Description (optional):</label>
                <textarea class="form-control" rows="5" id="bookDescription" name='bookDescription'>{{$bookDetails['bookDescription']}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection