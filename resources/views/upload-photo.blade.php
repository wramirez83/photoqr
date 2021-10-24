@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Subir Foto') }}</div>

                <div class="card-body">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div>
                            <form action="{{Route('goingUp')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Foto A Subir*</label>
                                    <input class="form-control" type="file" id="photo" name="photo" accept="image/*" required>
                                </div>
                                <div class="mb-3">
                                    <label for="author" class="form-label">Nombre del Autor*</label>
                                    <input type="text" class="form-control" id="author" name="author" aria-describedby="Nombre Completo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" id="description" name="description" aria-describedby="Nombre Completo">
                                </div>
                                <div class="row">
                                    <div class="col-12 d-grid ">
                                        <button type="submit" class="btn btn-primary block">Subir</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection