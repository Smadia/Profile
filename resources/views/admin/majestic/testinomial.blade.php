@extends('layouts.admin.majestic.app')

@section('title', menu('testimonial')->name)

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
        <form action="{{ route('admin.testimonial.store') }}" method="post" enctype="multipart/form-data">
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
            <div class="row">
                <div class="col-6">
                    <label>Job Title</label>
                    <input type="text" name="jobtitle" class="form-control">
                </div>
                <div class="col-6">
                    <label>{{ menu('portofolio')->name }}</label>
                    <select class="select2" style="width: 100%" name="portofolio_id">
                        <option value="">Choose</option>
                        @foreach($portofolios as $portofolio)
                            <option value="{{ $portofolio->id }}">{{ $portofolio->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <label>Content</label>
            <textarea class="form-control" name="content"></textarea>
            <br>
            <label>Helper</label>
            <textarea class="form-control" name="helper"></textarea>
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
                    <th>Job Title</th>
                    <th>{{ menu('portofolio')->name }}</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $testi)
                    <tr>
                        <td>{{ ($data->currentpage() * $data->perpage()) + $loop->iteration - $data->perpage()  }}</td>
                        <td>
                            @if(asset_exists($testi->image))
                                <img src="{{ asset($testi->image) }}" alt="{{ $testi->image }}">
                            @else
                                <img src="{{ asset('img/etc/img-not-found.png') }}" alt="{{ $testi->image }}">
                            @endif
                        </td>
                        <td>{{ $testi->name }}</td>
                        <td>{{ $testi->jobtitle }}</td>
                        <td>{{ $testi->getPortofolio(false)->name ?? '-' }}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm" onclick="$('#row-{{ $testi->id }}').toggle()">
                                    Detail/Edit
                                </button>
                                <a onclick="if (confirm('Are you sure?')) { $(this).parent().next().submit() }" class="btn btn-danger btn-sm text-white">Delete</a>
                            </div>
                            <form action="{{ route('admin.testimonial.delete', ['testimonial' => $testi->id]) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                            </form>
                        </td>
                    </tr>
                    <tr id="row-{{ $testi->id }}" style="display: none">
                        <td colspan="6">
                            <div class="card card-body">
                                <form action="{{ route('admin.testimonial.update', ['testimonial' => $testi->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('patch') }}
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $testi->name }}">
                                        </div>
                                        <div class="col-6">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Job Title</label>
                                            <input type="text" name="jobtitle" class="form-control" value="{{ $testi->jobtitle }}">
                                        </div>
                                        <div class="col-6">
                                            <label>{{ menu('portofolio')->name }}</label>
                                            <select class="select2" style="width: 100%" name="portofolio_id">
                                                <option value="">Choose</option>
                                                @foreach($portofolios as $portofolio)
                                                    <option @if($portofolio->id == $testi->portofolio_id) selected @endif value="{{ $portofolio->id }}">{{ $portofolio->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <label>Content</label>
                                    <textarea class="form-control" name="content">{{ $testi->content }}</textarea>
                                    <br>
                                    <label>Helper</label>
                                    <textarea class="form-control" name="helper">{{ $testi->helper }}</textarea>
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