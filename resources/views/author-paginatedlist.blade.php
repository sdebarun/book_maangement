@extends('layouts.app')
@section('additional_styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
@endsection
   
@section('additional_scripts')
    <script src="{{asset('js/script.js')}}" defer></script>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
    <div class="panel-body"><h3>Authors</h3></div>
    <hr/>
    @if(session('status'))
        @if(session('status')==0)
            <div class="alert alert-danger">{{Lang::get('messages.failure.delete')}} Author</div>
        @endif
        @if(session('status')==1)   
            <div class="alert alert-success">Author {{Lang::get('messages.success.delete')}} </div>
        @endif 
    @endif 
    @if(session('msg'))
        <div class="alert alert-danger"><b>{{Lang::get('messages.failure.delete')}}</b> {{session('msg')}} book(s) are linked with this author.</div>
    @endif
    </div>
    <div class='text-right datefilterWrapper'>
        <form action='/paginated/filteredAuthor' method="POST" class="form-inline">
            @csrf
            <div class="form-group">
                <label for="dateFilter">Select Data</label>
                <select id='dateFilter' class='form-control' name='startDate'>
                    <option value="{{date('Y-m-d')}}">Today</option>
                    <option value="{{date('Y-m-d', strtotime('-7 days'))}}">Last 7 days</option>
                    <option value="{{date('Y-m-d', strtotime('-29 days'))}}">Last 30 days</option>
                    <option value="custom">Custom</option>
                </select>
            </div> 
            <div id='custom_picker' class='form-group'>
                <div class="form-group">
                    <label>Start Date</label>
                    <input type='date' class='form-control'name='customStartDate' placeholder='Select Strat Date'>
                </div>
                <div class="form-group">  
                    <label>End Date:</label>  
                    <input type='date' class='form-control'name='customEndDate' placeholder='Select End Date'>
                </div>
            </div>
            <button class='btn btn-success' type='submit'>Filter</button>
        </form>   
    </div>
    <table class="table table-striped table-bordered hover" style="width:100%">
        <thead>
            <tr align="center">
                <th>Sr.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Added On</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $sr = 1; ?>
        @foreach($retval as $val)
            <tr align="center" class='test'>
                <td>{{$sr++}}</td>
                <td>{{$val->authorName}}</td>
                <td>@if(empty($val->authorDescription))
                        N/A
                    @else
                        {{$val->authorDescription}}
                    @endif    
                </td>
                <td>{{date('d-m-Y',strtotime($val->created_at))}}</td>
                <td> 
                    <span class='anchor-wrapper'><a href="/author/edit/{{$val->id}}" class="btn btn-primary btn-sm">
                        Edit<i class="fa fa-pencil" aria-hidden="true"></i>
                    </a></span>
                    <form action="{{route('author.delete', ['id' => $val->id])}}" method="POST" id='formTodel'>
                        @csrf
                        <button type='submit' class="btn btn-danger btn-sm del" data-id="{{$val->id}}">
                            Delete<i class="fa fa-trash-o" aria-hidden="true"></i> 
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr align="center">
                <th>Sr.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Added On</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>  
    {!!$retval->appends([Request::only(['startDate'=> 'startDate', 'customStartDate'=>'customStartDate', 'customEndDate'=> 'customEndDate'])])->render() . 'Pages'!!}
</div>

@endsection
