@extends('layouts.admin.majestic.app')

@section('title', $menu->name)

@push('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css">
@endpush

@section('content')
    <div class="card card-body">
        <h4 class="card-title">Add Custom</h4>
        <form action="{{ route('admin.custom.store') }}" method="post">
            @csrf
            {{ method_field('put') }}
            <div class="row">
                <div class="col-6">
                    <label>Key</label>
                    <input type="text" class="form-control" name="key">
                </div>
                <div class="col-6">
                    <label>Type</label>
                    <select class="form-control" name="type">
                        @foreach($customs[0]::ALL as $type)
                            <option value="{{ $type }}">{{ strtoupper($type) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
    <br>
    <div class="card">
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(empty($currentCustom))
                    Choose Custom
                @else
                    {{ strtoupper($currentCustom->key) }}
                @endif
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($customs as $custom)
                    <a class="dropdown-item" href="{{ route('admin.custom.page', ['key' => $custom->key]) }}">
                        {{ strtoupper($custom->key) }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $menu->name }}{{ empty($currentCustom) ? '' : ' > '.$currentCustom->key }}</h4>
            @if(!empty($currentCustom))
                <form action="{{ route('admin.custom.update', ['custom' => $currentCustom->key]) }}" method="post"
                      enctype="multipart/form-data">
                    @if(in_array($currentCustom->type, $currentCustom::ALL))
                        @csrf
                        {{ method_field('patch') }}

                        @if($currentCustom->type == $currentCustom::TEXT)
                            <textarea rows="10" class="form-control" name="value">{{ $currentCustom->value }}</textarea>
                        @elseif($currentCustom->type == $currentCustom::HTML)
                            <textarea rows="10" class="form-control" name="value">{{ $currentCustom->value }}</textarea>
                        @elseif($currentCustom->type == $currentCustom::JSON)
                            <textarea class="form-control" id="text" style="display: none"
                                      name="value">{{ $currentCustom->value }}</textarea>
                            <button style="display: none" id='json_to_table_btn' type="button"
                                    class="btn btn-default btn-lg btn-block">JSON to Table
                            </button>
                            <div class="table-responsive" id='table_container'></div>
                            <button style="display: none" id='table_to_json_btn' type="button"
                                    class="btn btn-default btn-lg btn-block">Table to JSON
                            </button>
                        @elseif($currentCustom->type == $currentCustom::FILE)
                            <input type="file" class="form-control" name="value">
                        @elseif($currentCustom->type == $currentCustom::IMAGE)
                            <div class="text-center">
                                @if(asset_exists($currentCustom->value))
                                    <img src="{{ asset($currentCustom->value) }}" class="img-fluid"
                                         alt="{{ $currentCustom->value }}">
                                @else
                                    <img src="{{ asset('img/etc/img-not-found.png') }}" class="img-fluid"
                                         alt="{{ $currentCustom->value }}">
                                @endif
                            </div>
                            <input type="file" class="form-control-file" name="value" accept="image/*">
                        @elseif($currentCustom->type == $currentCustom::NUMBER)
                            <input type="number" name="value" class="form-control" value="{{ $currentCustom->value }}">
                        @endif

                        <br>
                        <div class="btn-group">
                            @if($currentCustom->type == $currentCustom::JSON)
                                <div id="table"></div>
                                <button class="btn btn-primary" type="button"
                                        onclick="$('#table_to_json_btn').click(); $(this).parent().parent().submit()">
                                    Save
                                </button>
                            @else
                                <button class="btn btn-primary" type="submit">Save</button>
                            @endif
                            @if($currentCustom->type == $currentCustom::FILE)
                                <a class="btn btn-info text-white" target="_blank"
                                   href="{{ asset($currentCustom->value) }}">Download</a>
                            @endif
                        </div>
                    @else
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error Type!</strong> You should check type in custom. It must be
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </form>
            @endif
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.ui.position.js"></script>
    <script src="{{ asset('jsoneditor/jsoneditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            jsonEditorInit('table_container', 'text', 'text', 'json_to_table_btn', 'table_to_json_btn');
            $('#json_to_table_btn').click()
        });

        $('#search-place').remove()
    </script>
@endpush