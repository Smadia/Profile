@extends('layouts.admin.majestic.app')

@section('title', menu('user')->name)

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
        <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
            <div class="row">
                <div class="col-4">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-4">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-4">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
            </div>
            <br>
            <label>{{ menu('role')->name }}</label>
            <select name="roles[]" class="select2" style="width: 100%" multiple>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <div class="row">
                <div class="col-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" minlength="8" required>
                </div>
                <div class="col-6">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" minlength="8" required>
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
                    <th>{{ menu('role')->name }}</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $user)
                    <tr>
                        <td>{{ ($data->currentpage() * $data->perpage()) + $loop->iteration - $data->perpage()  }}</td>
                        <td>
                            @if(asset_exists($user->image))
                                <img src="{{ asset($user->image) }}" alt="{{ $user->image }}">
                            @else
                                <img src="{{ asset('img/etc/img-not-found.png') }}" alt="{{ $user->image }}">
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @foreach($user->getRoles(false) as $role)
                                <span class="badge badge-info">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm" onclick="$('#row-{{ $user->id }}').toggle()">
                                    Detail/Edit
                                </button>
                                <a onclick="if (confirm('Are you sure?')) { $(this).parent().next().submit() }" class="btn btn-danger btn-sm text-white">Delete</a>
                            </div>
                            <form action="{{ route('admin.user.delete', ['user' => $user->id]) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                            </form>
                        </td>
                    </tr>
                    <tr id="row-{{ $user->id }}" style="display: none">
                        <td colspan="5">
                            <div class="card card-body">
                                <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('patch') }}
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <br>
                                    <label>{{ menu('role')->name }}</label>
                                    <select name="roles[]" class="select2" style="width: 100%" multiple>
                                        @foreach($roles as $role)
                                            <option @if($user->hasRole($role)) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <br>
                                    <label>{{ menu('menu')->name }}</label>
                                    <select name="menus[]" class="select2" style="width: 100%" multiple>
                                        @foreach($user->getAllowedMenus(false) as $menu)
                                            <option @if($user->hasMenu($menu)) selected @endif value="{{ $menu->id }}">{{ $menu->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <br>
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                    <br>
                                    <label>Confirm Password</label>
                                    <input type="password" name="password" class="form-control">
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
        $('.select2').select2()

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