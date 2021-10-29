@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Resumen') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <p class="h5">Autor:</p> {{ $photo->author }}
                        </div>
                        <div class="col">
                            <p class="h5">Descripción:</p> {{ $photo->description }}
                        </div> 
                        <div class="col">
                            <img src="{{ asset('storage/img/'. $photo->url) }}" width="250px" alt="{{$photo->author}}" srcset="">
                        </div>
                    </div>
                   <div class="row">
                       <div class="col-12">
                           <h3>Información QR</h3>
                           <div>
                            <div class="text-center">
                                <img src="data:image/png;base64, {!! base64_encode($photo->getSvg()) !!} " width="250">
                                {{-- <img src="data:image/png;base64, {!! base64_encode($qr) !!} "> --}}
                                <p>Código para la Imagen y Su Votación.</p>
                            </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
