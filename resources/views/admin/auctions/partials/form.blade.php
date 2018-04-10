@extends('layouts.admin')
@section('title', 'Un títol')
@section('description', 'Una descripció')
@section('content')

<div class="row my-3 mx-0">
    <div class="col-10 col-sm-10 col-md-6 mx-auto">
        <div class="card">
        @if($auction->exists)
            <h5 class="card-header">Edit auction</h5>
                <div class="card-body">
                    {{Form::open(['route' => ['auctions.update',$auction->id], 'files' => true, 'method' => 'PUT'])}}
        @else
            <h5 class="card-header">Create new auction</h5>
                <div class="card-body">
                    {{Form::open(['route' => ['auctions.index'],'files' => true])}}   
        @endif
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title',$auction->title,['class' => 'form-control','required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description',$auction->description,['class' => 'form-control','required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::label('date_start', 'Date start')}}
                    <input class="form-control" type="datetime-local" name="date_start" min="{{date("Y-m-d\TH:i")}}" value="{{date('Y-m-d\TH:i:s',strtotime($auction->date_start))}}">
                </div>
                <div class="form-group">
                    {{Form::label('date_end', 'Date end')}}
                    <input class="form-control" type="datetime-local" name="date_end" min="{{date("Y-m-d\TH:i")}}" value="{{date('Y-m-d\TH:i:s',strtotime($auction->date_end))}}">
                </div>
                <div class="form-group">
                    {{Form::label('stock_id', 'Product to auction')}}
                    <input class="form-control mb-2" id="myInput" type="text" placeholder="Search..">
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="chck">#</th>
                                    <th class="cat-name">Name</th>
                                    <th class="cat-desc">Reference</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td class="chck">
                                            @if($auction->exists && $stock->id == $auction->stock_id)
                                                {{Form::radio('stock_id',$stock->id,['checked'=>'checked'])}}
                                            @else
                                                {{Form::radio('stock_id',$stock->id)}}
                                            @endif
                                        </td>
                                        <td class="cat-name">
                                            {{$stock->product($stock->product_id)->name}}
                                        </td>
                                        <td class="cat-desc">
                                            {{$stock->reference}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($auction->exists)
                    {{Form::submit('Edit auction',['class' => 'btn btn-primary'])}}
                @else
                   {{Form::submit('Create auction',['class' => 'btn btn-primary'])}}
                @endif
                {{Form::close()}}
            </div>
        </div><!-- /.card -->
    </div><!-- /.col -->
</div><!-- /.row -->
    <!-- JQuery -->
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<style>
    .table-responsive ::-webkit-scrollbar{
        visibility: hidden!important;
    }
    thead, tbody, tr, td, th { display: block; }
    tr:after {
        content: ' ';
        display: block;
        visibility: hidden;
        clear: both;
    }


    tbody {
        max-height: 200px;
        overflow-y: auto;
    }

    thead {
        /* fallback */
    }

    .chck{
        width: 10%;
        float: left;
    }

    tbody .cat-name, thead .cat-name {
        width: 30%;
        float: left;
    }
    tbody .cat-desc, thead .cat-desc {
        width: 60%;
        float: left;
    }
</style>
@endsection