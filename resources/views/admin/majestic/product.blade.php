@extends('layouts.admin.majestic.app')

@section('title', menu('product')->name)

@section('content')
    <form action="{{ url()->current() }}" style="display: none" id="form-search">
        <input type="hidden" name="q" value="{{ $q }}" id="q">
    </form>

    <div class="btn-group">
        <button class="btn btn-primary" onclick="$('#add-data').hide(); $('#list-data').show()">
            List
        </button>
        <button class="btn btn-primary" onclick="$('#add-data').show(); $('#list-data').hide()">
            Add
        </button>
    </div>

    <div class="card card-body" id="add-data" style="display: none">
        <h4 class="card-title">Add</h4>
        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
            <div class="row">
                <div class="col-6">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-6">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
            <br>
            <label>By</label>
            <select class="select2" name="users_products[]" multiple style="width: 100%">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <div class="row">
                <div class="col-5">
                    <label>Demo</label>
                    <textarea class="form-control" name="demo"></textarea>
                </div>
                <div class="col-7">
                    <label>Description</label>
                    <textarea class="form-control" name="desc"></textarea>
                </div>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>

    <div class="card card-body" id="list-data">
            <h4 class="card-title">List</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Demo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $product)
                        <tr>
                            <td>{{ ($data->currentpage() * $data->perpage()) + $loop->iteration - $data->perpage()  }}</td>
                            <td>
                                @if(asset_exists($product->image))
                                    <a href="{{ asset($product->image) }}" target="_blank">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->image }}">
                                    </a>
                                @else
                                    <img src="{{ asset('img/etc/img-not-found.png') }}" alt="{{ $product->image }}">
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->demo ?? '-' }}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm" onclick="$('#row-{{ $product->id }}').toggle()">
                                        Detail/Edit
                                    </button>
                                    <a onclick="if (confirm('Are you sure?')) { $(this).parent().next().submit() }"
                                       class="btn btn-danger btn-sm text-white">Delete</a>
                                </div>
                                <form action="{{ route('admin.product.delete', ['product' => $product->id]) }}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                </form>
                            </td>
                        </tr>
                        <tr id="row-{{ $product->id }}" style="display: none">
                            <td colspan="5">
                                <div class="card card-body">
                                    <form action="{{ route('admin.product.update', ['product' => $product->id]) }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('patch') }}
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                            </div>
                                            <div class="col-6">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>
                                        </div>
                                        <br>
                                        <label>By</label>
                                        <select class="select2" name="users_products[]" multiple style="width: 100%">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" @if($product->hasUser($user)) selected @endif>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-5">
                                                <label>Demo</label>
                                                <textarea class="form-control" name="demo"></textarea>
                                            </div>
                                            <div class="col-7">
                                                <label>Description</label>
                                                <textarea class="form-control" name="desc"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
@endsection

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>
        $('.select2').select2();

        $('#search-input').keydown(function (event) {
            var keyCode = (event.keyCode ? event.keyCode : event.which);
            if (keyCode == 13) {
                $('#q').val($('#search-input').val())
                $('#form-search').submit()
            }
        })

        $('#search-input').val('{{ $q }}')
    </script>
@endpush