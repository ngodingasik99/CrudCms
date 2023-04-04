@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Kategori
                </button>
            <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th>Foto</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $p=1 ?>
                    @foreach ($data as $item)
                  <tr>
                    <th scope="row">{{$p++}}</th>
                    <td>{{$item->namakategori}}</td>
                    <td><img src="{{asset('storage/' . $item->fotokategori)}}" width="150px"></td>
                    <td>
                        <a href="/kategori/{{$item->id}}" class="btn btn-danger">Delete</a>
                        <a href="/kategori/{{$item->id}}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}">Update Kategori</a>
                    </td>
                  </tr>
                  {{-- Modal Update --}}
                  <div class="modal fade" id="modal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Update Kategori</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="/kategori/{{$item->id}}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                              <label for="namakategori" class="form-label">Nama Kategori</label>
                              <input type="text" value="{{$item->namakategori}}" class="form-control @error('namakategori') is-invalid @enderror" name="namakategori" id="namakategori" placeholder="nama kategori">
                              @error('namakategori')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="fotokategori" class="form-label">Foto Kategori</label>
                              <input type="file" value="{{$item->fotokategori}}" class="form-control @error('namakategori') is-invalid @enderror" name="fotokategori" id="fotokategori"><img src="{{asset('storage/' . $item->fotokategori)}}" width="150px">
                              @error('fotokategori')
                              <div class="invalid-feedback">{{ $message }}</div>
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
                </tbody>
              </table>
            </div>
        </div>
   
    <!-- Modal Form Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/kategori/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="namakategori" class="form-label">Nama Kategori</label>
                      <input type="text" class="form-control @error('namakategori') is-invalid @enderror" name="namakategori" id="namakategori" placeholder="nama kategori">
                      @error('namakategori')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="fotokategori" class="form-label">Foto Kategori</label>
                      <input type="file" class="form-control @error('namakategori') is-invalid @enderror" name="fotokategori" id="fotokategori">
                      @error('fotokategori')
                      <div class="invalid-feedback">{{ $message }}</div>
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
  </div>
@endsection