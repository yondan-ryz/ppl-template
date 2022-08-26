@extends('component.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Laravel 8 Post CRUD Tutorial</h2>
                        </div>

                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('sma.create') }}"> Create New Post</a>
                        </div>
                    </div>
                </div>


                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
<div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <th>Logo</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Alamat</th>
                        <th>Sejarah</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($smasActives as $post)
                        <tr>
                            <td>{{ $post->nama}}</td>
                            <td><img src="{{ Storage::url('public/images/').$post->logo }}" class="rounded"
                                     style="width: 150px"></td>
                            <td>{{ $post->visi}}</td>
                            <td>{{ $post->misi}}</td>
                            <td>{{ $post->alamat}}</td>
                            <td>{{ $post->sejarah}}</td>
                            <td>
                                    <button class="btn btn-success">Active</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
</div>

<h1>Other</h1>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <th>Logo</th>
                            <th>Visi</th>
                            <th>Misi</th>
                            <th>Alamat</th>
                            <th>Sejarah</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($smas as $post)
                            <tr>
                                <td>{{ $post->nama}}</td>
                                <td><img src="{{ Storage::url('public/images/').$post->logo }}" class="rounded"
                                         style="width: 150px"></td>
                                <td>{{ $post->visi}}</td>
                                <td>{{ $post->misi}}</td>
                                <td>{{ $post->alamat}}</td>
                                <td>{{ $post->sejarah}}</td>
                                <td>
                                    <form action="{{ route('sk.delete',$post->id) }}" method="POST">

                                        <a class="btn btn-primary" href="{{ route('sk.edit',$post->id) }}">Edit</a>
                                        <a class="btn btn-primary" href="{{ route('sma.change',$post->id)}}">Active</a>
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
