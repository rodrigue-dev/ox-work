<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}} | Gestion benevole</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icons.min.css')}}">
</head>
<body  class="loading" data-layout-mode="horizontal" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
<!-- Begin page -->
<div id="wrapper">
@include('_partials._header')
    @yield('content')
@include('_partials._footer')
</div>
@stack('scripts')
<script src="{{asset('js/vendor.min.js') }}"></script>
<script src="{{asset('js/databases/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/databases/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{asset('js/app.min.js') }}"></script>
<script>
    var configs={
        routes:{
            index: "{{\Illuminate\Support\Facades\URL::to('/')}}",
            reportcalandar: "{{\Illuminate\Support\Facades\URL::route('reportcalandar')}}",
            sendmail: "{{\Illuminate\Support\Facades\URL::route('sendmail')}}",
            ajaxdeleteconge: "{{\Illuminate\Support\Facades\URL::route('delete_conge')}}",
            ajaxdeleteperiode: "{{\Illuminate\Support\Facades\URL::route('delete_periode')}}",
        }
    }
</script>
<script src="{{asset('js/script.js') }}"></script>
<script type="text/javascript">
    $(function () {

        var table = $('#table_conge').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('conge') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'date_conge', name: 'date_conge'},
                {data: 'periode', name: 'periode'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        var table = $('#table_connexion').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('connexion') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'datecreation', name: 'datecreation'},
                {data: 'email', name: 'email'},
                {data: 'ip', name: 'ip'},
                {data: 'status', name: 'status'},
            ]
        });
        var table = $('#table_user').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users') }}",
            columns: [
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'lastname', name: 'lastname'},
                {data: 'phone', name: 'phone'},
                {data: 'adresse', name: 'adresse'},
                {data: 'adressepostal', name: 'adressepostal'},
                {data: 'commune', name: 'commune'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},
            ]
        });

    });
</script>
</body>

</html>
