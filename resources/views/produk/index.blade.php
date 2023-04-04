@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
              <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Produk
            </button>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <?php $p=1; ?>
                @foreach ($produk as $produks)
                <tbody>
                  <tr>
                    <th scope="row">{{ $p++ }}</th>
                    <td>{{$produks->namaproduk}}</td>
                    <td>{{$produks->harga}}</td>
                    <td>{{$produks->deskripsi}}</td>
                    <td> <img src="{{asset('storage/'. $produks->fotoproduk)}}" width="150px" alt=""> </td>
                    <td>
                        <a href="/produk/{{$produks->id}}" class="btn btn-danger">Delete</a>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#update{{$produks->id}}">
                          Update Produk
                      </button>
                    </td>
                  </tr>
                </tbody>
                {{-- modal update --}}
                  <div class="modal fade" id="update{{$produks->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/produk/{{$produks->id}}" method="post" enctype="multipart/form-data">
                              @method('put')
                              @csrf
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                                <input type="text" value="{{$produks->namaproduk}}" name="namaproduk" class="form-control @error('namaproduk') is-invalid @enderror" id="exampleInputEmail1">
                                @error('namaproduk')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Harga</label>
                                <input type="text" value="{{$produks->harga}}" name="harga" class="form-control @error('harga') is-invalid @enderror" id="exampleInputPassword1">
                                @error('harga')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                                <input type="text" value="{{$produks->deskripsi}}" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleInputPassword1">
                                @error('deskripsi')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Foto</label>
                                <input type="file" value="{{$produks->fotoproduk}}" name="fotoproduk" class="form-control @error('fotoproduk') is-invalid @enderror" id="exampleInputPassword1"><br>
                                <img src="{{asset('storage/'. $produks->fotoproduk)}}" width="100px" alt="">
                                @error('fotoproduk')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="mb-3">
                                  <select class="form-select" aria-label="Default select example" name="id_kategori">
                                      <option selected>Pilih kategori</option>
                                      @foreach ($kategori as $item)
                                          <option value="{{ $item->id }}" {{$produks->id_kategori == $item->id ? 'selected' : ''}}>{{ $item->namakategori }}</option>
                                      @endforeach
                                    </select><br>
                                    @error('id_kategori')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                    @enderror
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/produk/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                  <input type="text" name="namaproduk" class="form-control @error('namaproduk') is-invalid @enderror" id="exampleInputEmail1">
                  @error('namaproduk')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Harga</label>
                  <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="exampleInputPassword1">
                  @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                  <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleInputPassword1">
                  @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Foto</label>
                  <input type="file" name="fotoproduk" class="form-control @error('fotoproduk') is-invalid @enderror" id="exampleInputPassword1">
                  @error('fotoproduk')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="id_kategori">
                        <option selected>Pilih kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->namakategori }}</option>
                        @endforeach
                      </select><br>
                      @error('id_kategori')
                      <div class="invalid-tooltip">{{ $message }}</div>
                      @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
        </div>
      </div>
    </div>
</div>


@endsection