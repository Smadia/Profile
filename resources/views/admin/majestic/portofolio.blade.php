@extends('layouts.admin.majestic.app')

@section('title', $menu->name)

@push('css')
    <link href="//www.tinymce.com/css/codepen.min.css" rel="stylesheet" />
@endpush

@section('content')
    <form action="{{ url()->current() }}" style="display: none" id="form-search">
        <input type="hidden" name="client" value="{{ $client }}">
        <input type="hidden" name="q" value="{{ $q }}" id="q">
    </form>
    <div class="row">
        <div class="col-5">
            <div class="card card-body">
                <h4 class="card-title">Add Portofolio</h4>
                <form action="{{ route('admin.portofolio.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" required>
                    <br>
                    <label>Client</label>
                    <select class="form-control" name="client_id" required>
                        @foreach($clients as $_)
                            <option value="{{ $_->id }}">{{ $_->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label>Image</label>
                    <input type="file" class="form-control-file" name="image">
                    <br>
                    <label>Content</label>
                    <textarea id="add" name="desc" rows="10"></textarea>
                    <br>
                    <label>Demo</label>
                    <textarea name="demo" class="form-control"></textarea>
                    <br>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
        <div class="col-7">
            <div class="card">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ empty($client) ? 'Choose Client' : $client }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach($clients as $client)
                            <a class="dropdown-item" href="{{ route('admin.portofolio.page', ['client' => $client->name, 'q' => $q]) }}">
                                {{ $client->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ ($portofolios->total() > 1) ? $portofolios->total().' projects' : $portofolios->total().' project' }}</h4>
                    @foreach($portofolios as $portofolio)
                        <a class="btn btn-light btn-block" data-toggle="collapse" href="#collapse{{ $portofolio->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                            {{ $portofolio->name }} ({{ format_date($portofolio->created_at) }})
                        </a>
                        <div class="collapse" id="collapse{{ $portofolio->id }}">
                            <div class="card card-body">
                                <form action="{{ route('admin.portofolio.update', ['portofolio' => $portofolio->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('patch') }}
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $portofolio->name }}" required>
                                    <br>
                                    <label>Client</label>
                                    <select class="form-control" name="client_id">
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" {{ ($client->id == $portofolio->getClient(false)->id) ? 'selected' : '' }}>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label>Image</label>
                                    <div class="text-center">
                                        @if(asset_exists($portofolio->image))
                                            <img src="{{ asset($portofolio->image) }}" class="img-fluid"
                                                 alt="{{ $portofolio->name }}">
                                        @else
                                            <img src="{{ asset('img/etc/img-not-found.png') }}" class="img-fluid"
                                                 alt="{{ $portofolio->name }}">
                                        @endif
                                    </div>
                                    <input type="file" class="form-control-file" name="image">
                                    <br>
                                    <label>Content</label>
                                    <textarea name="desc" id="editor{{ $portofolio->id }}" rows="10" class="editor">{{ $portofolio->desc }}</textarea>
                                    <br>
                                    <label>Demo</label>
                                    <textarea name="demo" class="form-control">{{ $portofolio->demo }}</textarea>
                                    <br>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a onclick="return confirm('Are you sure?')" href="{{ route('admin.portofolio.delete', ['portofolio' => $portofolio->id]) }}" class="btn btn-danger">Delete</a>
                                </form>
                            </div>
                        </div>
                        <br>
                    @endforeach
                    {{ $portofolios->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>
    <script>
        @foreach($portofolios as $portofolio)
        CKEDITOR.replace('editor{{ $portofolio->id }}', {
            fullPage: true,
            extraPlugins: 'docprops',
            allowedContent: true,
            height: 320
        })
        @endforeach

        CKEDITOR.replace('add', {
            fullPage: true,
            extraPlugins: 'docprops',
            allowedContent: true,
            height: 320
        })

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