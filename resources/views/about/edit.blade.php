<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                                                   @foreach ($posts as $post)
                                <form action="{{ route('sk.update', ["id" => $post->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Sekolah</label>
                                        <input type="text" class="form-control" value="{{$post->nama}}" name="nama" placeholder="Nama Sekolah">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Logo</label>
                                        <input type="file" class="form-control" name="logo">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Visi Sekolah</label>
                                        <input type="text" class="form-control" value="{{$post->visi}}" name="visi" placeholder="Visi Sekolah">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Misi Sekolah</label>
                                        <input type="text" class="form-control" value="{{$post->misi}}" name="misi" placeholder="Misi Sekolah">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Alamat Sekolah</label>
                                        <input type="text" class="form-control" value="{{$post->alamat}}" name="alamat" placeholder="Alamat Sekolah">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Sejarah Sekolah</label>
                                        <input type="text" class="form-control" value="{{$post->sejarah}}" name="sejarah" placeholder="Sejarah Sekolah">
                                    </div>
                                    <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>
