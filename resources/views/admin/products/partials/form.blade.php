@extends('layouts.admin')
@section('title', 'Un títol')
@section('description', 'Una descripció')
@section('content')

<div class="row my-3 mx-0">
    <div class="col-10 col-sm-10 col-md-6 mx-auto">
        <div class="card">
            <h5 class="card-header">Create new product</h5>
            <div class="card-body">
            @if($product->exists)
                {{Form::open(['route' => ['products.update',$product->id], 'files' => true, 'method' => 'PUT'])}}
            @else
                {{Form::open(['route' => ['products.index'],'files' => true])}}   
            @endif
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name',$product->name,['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description',$product->description,['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('characteristics', 'Characteristics')}}
                    {{Form::textarea('characteristics',$product->characteristics,['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Image')}}
                    {{Form::file('image',['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('categories[]', 'Categories')}}
                    <input class="form-control mb-2" id="myInput" type="text" placeholder="Search..">
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="chck">#</th>
                                    <th class="cat-name">Category</th>
                                    <th class="cat-desc">Description</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="chck">
                                            @if($product->exists && in_array($category->id, $old_cats))
                                                {{Form::checkbox('categories[]',$category->id,true)}}
                                            @else
                                                {{Form::checkbox('categories[]',$category->id)}}
                                            @endif
                                        </td>
                                        <td class="cat-name">
                                            {{$category->name}}
                                        </td>
                                        <td class="cat-desc">
                                            {{$category->description}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{Form::submit('Create product',['class' => 'btn btn-primary'])}}
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