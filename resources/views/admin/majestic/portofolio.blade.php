@extends('layouts.admin.majestic.app')

@section('title', menu('portofolio')->nama)

@section('content')
    <form action="{{ url()->current() }}" style="display: none" id="form-search">
        <input type="hidden" name="client" value="{{ $client }}">
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
        <h4 class="card-title">Add {{ menu('portofolio')->name }}</h4>
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

    <div class="card" id="list-data">
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle btn-block" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ empty($client) ? 'Choose Client' : $client }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($clients as $client)
                    <a class="dropdown-item"
                       href="{{ route('admin.portofolio.page', ['client' => $client->name, 'q' => $q]) }}">
                        {{ $client->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="card-body table-responsive">
            <h4 class="card-title">{{ ($data->total() > 1) ? $data->total().' projects' : $data->total().' project' }}</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>{{ menu('client')->name }}</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $portofolio)
                    <tr>
                        <td>{{ ($data->currentpage() * $data->perpage()) + $loop->iteration - $data->perpage()  }}</td>
                        <td>
                            @if(asset_exists($portofolio->image))
                                <img src="{{ asset($portofolio->image) }}" alt="{{ $portofolio->image }}">
                            @else
                                <img src="{{ asset('img/etc/img-not-found.png') }}" alt="{{ $portofolio->image }}">
                            @endif
                        </td>
                        <td>
                            {{ $portofolio->name }}
                        </td>
                        <td>
                            {{ $portofolio->getClient(false)->name ?? '-' }}
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm" onclick="$('#edit-{{ $portofolio->id }}').toggle()">
                                    Edit/Detail
                                </button>
                                <button onclick="if (confirm('Are you sure?')) { $(this).parent().next().submit() }" class="btn btn-danger btn-sm">Delete</button>
                            </div>
                            <form action="{{ route('admin.portofolio.delete', ['portofolio' => $portofolio->id]) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                            </form>
                        </td>
                    </tr>
                    <tr id="edit-{{ $portofolio->id }}" style="display: none">
                        <td colspan="5">
                            <div class="card card-body">
                                <form action="{{ route('admin.portofolio.update', ['portofolio' => $portofolio->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('patch') }}
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $portofolio->name }}" required>
                                    <br>
                                    <label>{{ menu('service')->name }}</label>
                                    <select name="portofolios_services[]" class="select2" style="width: 100%" multiple>
                                        @foreach($services as $service)
                                        <option @if($portofolio->hasService($service)) selected @endif value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <br>
                                    <label>{{ menu('client')->name }}</label>
                                    <select class="form-control" name="client_id">
                                        <option value="">Pilih</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" {{ ($client->id == $portofolio->getClient(false)->id) ? 'selected' : '' }}>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label>Image</label>
                                    <input type="file" class="form-control-file" name="image">
                                    <br>
                                    <label>Content</label>
                                    <textarea name="desc" id="editor{{ $portofolio->id }}" rows="10" class="editor">{{ $portofolio->desc }}</textarea>
                                    <br>
                                    <label>Demo</label>
                                    <textarea name="demo" class="form-control">{{ $portofolio->demo }}</textarea>
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
    <script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>
    <script>
        $('.select2').select2()

        @foreach($data as $portofolio)
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