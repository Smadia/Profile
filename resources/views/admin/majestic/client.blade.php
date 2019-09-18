@extends('layouts.admin.majestic.app')

@section('title', $menu->name)

@section('content')
    <form action="{{ url()->current() }}" style="display: none" id="form-search">
        <input type="hidden" name="q" value="{{ $q }}" id="q">
    </form>
    <div class="card card-body">
        <form action="{{ route('admin.client.store') }}" method="post" enctype="multipart/form-data">
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
            <label>Description</label>
            <textarea class="form-control" name="desc"></textarea>
            <br>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
    <br>
    <div class="card card-body">
        <h4 class="card-title">Our Clients</h4>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Project</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $client)
                    <tr>
                        <td>{{ ($data->currentpage() * $data->perpage()) + $loop->iteration - $data->perpage()  }}</td>
                        <td>
                            @if(asset_exists($client->image))
                                <img src="{{ asset($client->image) }}" alt="{{ $client->image }}">
                            @else
                                <img src="{{ asset('img/etc/img-not-found.png') }}" alt="{{ $client->image }}">
                            @endif
                        </td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->getPortofolios()->count() }}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm" onclick="$('#row-{{ $client->id }}').toggle()">
                                    Detail/Edit
                                </button>
                                <a onclick="if (confirm('Are you sure?')) { $(this).parent().next().submit() }" class="btn btn-danger btn-sm text-white">Delete</a>
                            </div>
                            <form action="{{ route('admin.client.delete', ['client' => $client->id]) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                            </form>
                        </td>
                    </tr>
                    <tr id="row-{{ $client->id }}" style="display: none">
                        <td colspan="5">
                            <div class="card card-body">
                                <form action="{{ route('admin.client.update', ['client' => $client->id]) }}"
                                      method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('patch') }}
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ $client->name }}">
                                        </div>
                                        <div class="col-6">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <br>
                                    <label>Description</label>
                                    <textarea class="form-control" name="desc">{{ $client->desc }}</textarea>
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

@endpush

@push('js')
    <script>
        $('#search-input').keydown(function(event){
            var keyCode = (event.keyCode ? event.keyCode : event.which);
            if (keyCode == 13) {
                $('#q').val($('#search-input').val())
                $('#form-search').submit()
            }
        })

        $('#search-input').val('{{ $q }}')
    </script>
@endpush