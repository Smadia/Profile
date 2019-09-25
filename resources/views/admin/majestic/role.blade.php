@extends('layouts.admin.majestic.app')

@section('title', menu('role')->name)

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
        <form action="{{ route('admin.role.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
            <label>Name</label>
            <input type="text" name="name" class="form-control">
            <br>
            <label>Menu</label>
            <select class="select2" name="roles_menus[]" multiple style="width: 100%">
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
            <br>
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
                    <th>Name</th>
                    <th>Users</th>
                    <th>Menu</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $role)
                    <tr>
                        <td>{{ ($data->currentpage() * $data->perpage()) + $loop->iteration - $data->perpage()  }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->getUsers()->count() }}</td>
                        <td>{{ $role->getMenus()->count() }}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm" onclick="$('#row-{{ $role->id }}').toggle()">
                                    Detail/Edit
                                </button>
                                <a onclick="if (confirm('Are you sure?')) { $(this).parent().next().submit() }"
                                   class="btn btn-danger btn-sm text-white">Delete</a>
                            </div>
                            <form action="{{ route('admin.role.delete', ['role' => $role->id]) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                            </form>
                        </td>
                    </tr>
                    <tr id="row-{{ $role->id }}" style="display: none">
                        <td colspan="5">
                            <div class="card card-body">
                                <form action="{{ route('admin.role.update', ['role' => $role->id]) }}"
                                      method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('patch') }}
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                                    <br>
                                    <label>Menu</label>
                                    <select class="select2" name="roles_menus[]" multiple style="width: 100%">
                                        @foreach($menus as $menu)
                                            <option @if($role->hasMenu($menu)) selected @endif value="{{ $menu->id }}">{{ $menu->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
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
        $('.select2').select2()

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