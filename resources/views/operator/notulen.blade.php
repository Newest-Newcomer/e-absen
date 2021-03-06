@extends('layout.header')

<title>Riwayat Rapat</title>

@section('bca')

<div class="bg">
    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">List OPD</li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/opr/drrapat/{{$meeting->id_rapat}}">Riwayat Rapat</a></li>
        <li class="breadcrumb-item active" aria-current="page">Download Notulen Rapat</li>
    </ol>

@endsection

@section('bc')

<div class="bg">
    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/operator">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/operator/drrapat/{{$meeting->id_rapat}}">Riwayat Rapat</a></li>
        <li class="breadcrumb-item active" aria-current="page">Download Notulen Rapat</li>
    </ol>

@endsection

@section('container')

    @foreach ($notulen as $notul)
        @if (Auth::user('operator'))
            <form action="/operator/drrapat/{{ $notul->id_notulen }}/download" method="get" enctype="multipart/form-data">
        @else
            <form action="/admin/opr/drrapat/{{ $notul->id_notulen }}/download" method="get" enctype="multipart/form-data">
        @endif
            @csrf
                <table id="w0" class="table table-borderless">
                    <tr>
                        <th style="width: 44px;height: 38px;">
                            <label for="file_input" style="cursor: pointer; color: Dodgerblue;" class="fas fa-file-download fa-2x" width="100px"></label>
                            <input type="submit" name="notulen" id="file_input" value="{{ $notul->notulen }}"/>
                        </th>
                        <td>
                            <p>{{ $notul->notulen }}</p>
                        </td>
                    </tr>
                </table>
            </form>
    @endforeach


    <script>
        $('#file_input').change(function() {
            $('#selected_filename').text($('#file_input')[0].files[0].name);
        });
    </script>

@endsection
