<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('admin/majestic/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/majestic/vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/majestic/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/majestic/css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css">
</head>
<body>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $custom->key }}</h4>
        <form action="{{ route('admin.custom.update', ['custom' => $custom->key]) }}" method="post"
              enctype="multipart/form-data">
            @if(in_array($custom->type, $custom::ALL))
                @csrf
                {{ method_field('patch') }}

                @if($custom->type == $custom::TEXT || $custom->type == $custom::HTML)
                    <textarea class="form-control" name="value">{{ $custom->value }}</textarea>
                @elseif($custom->type == $custom::JSON)
                    <textarea class="form-control" id="text" style="display: none"
                              name="value">{{ $custom->value }}</textarea>
                    <button style="display: none" id='json_to_table_btn' type="button"
                            class="btn btn-default btn-lg btn-block">JSON to Table
                    </button>
                    <div id='table_container'></div>
                    <button style="display: none" id='table_to_json_btn' type="button"
                            class="btn btn-default btn-lg btn-block">Table to JSON
                    </button>
                @elseif($custom->type == $custom::FILE)
                    <input type="file" class="form-control" name="value">
                @elseif($custom->type == $custom::IMAGE)
                    @if(asset_exists($custom->value))
                        <img src="{{ asset($custom->value) }}" class="img-fluid"
                             alt="{{ $custom->value }}">
                    @else
                        <img src="{{ asset('img/etc/img-not-found.png') }}" class="img-fluid"
                             alt="{{ $custom->value }}">
                    @endif
                    <input type="file" class="form-control" name="value" accept="image/*">
                @elseif($custom->type == $custom::NUMBER)
                    <input name="value" class="form-control" value="{{ $custom->value }}">
                @endif

                <br>
                <div class="btn-group">
                    @if($custom->type == $custom::JSON)
                        <div id="table"></div>
                        <button class="btn btn-primary" type="button"
                                onclick="$('#table_to_json_btn').click(); $(this).parent().parent().submit()">
                            Save
                        </button>
                    @else
                        <button class="btn btn-primary" type="submit">Save</button>
                    @endif
                    @if($custom->type == $custom::FILE)
                        <a class="btn btn-info text-white" target="_blank"
                           href="{{ asset($custom->value) }}">Download</a>
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
    </div>
</div>
<script src="{{ asset('admin/majestic/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('admin/majestic/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/majestic/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/majestic/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('admin/majestic/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/majestic/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/majestic/js/template.js') }}"></script>
<script src="{{ asset('admin/majestic/js/dashboard.js') }}"></script>
<script src="{{ asset('admin/majestic/js/data-table.js') }}"></script>
<script src="{{ asset('admin/majestic/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/majestic/js/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.ui.position.js"></script>
<script src="{{ asset('jsoneditor/jsoneditor.js') }}"></script>
<script>
    $(document).ready(function () {
        jsonEditorInit('table_container', 'text', 'text', 'json_to_table_btn', 'table_to_json_btn');

        $('#json_to_table_btn').click()
    });

</script>
</body>

</html>

