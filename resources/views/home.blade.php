@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Autor</th>
                                        <th>Descripcion</th>
                                        <th>QR</th>
                                        <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($photos as $photo)
                                          <tr>
                                              <td>
                                                <img src="{{ asset('storage/img/'. $photo->url) }}" width="250px" alt="{{$photo->author}}" srcset="">
                                              </td>
                                              <td>
                                                  {{$photo->author}}
                                              </td>
                                              <td>
                                                {{$photo->description}}
                                              </td>
                                              <td>
                                                <img src="data:image/png;base64, {!! base64_encode($photo->getSvg()) !!} " width="250">
                                              </td>
                                              <td>
                                                  <form action="{{Route('photoDelete')}}" method="POST">
                                                      @csrf
                                                      @method('delete')
                                                      <div>
                                                        <input type="checkbox" id="scales" name="scales"
                                                               required>
                                                        <label for="scales">Seguro Eliminar</label>
                                                      </div>
                                                      <input type="hidden" name="id" value="{{$photo->id}}">
                                                      <button type="submit" name=""class="btn btn-danger">
                                                          Eliminar <img class="text-white" src="{{ (url('/logo/trash-2.svg')) }}">
                                                      </button>
                                                  </form>
                                              </td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                            </table>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
