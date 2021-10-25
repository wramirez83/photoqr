@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Competencias') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container pb-5 mb-3 pl-4">
                        <form action="{{Route('saveVote')}}" method="post" class="justify-content-center form-group">
                            @csrf
                            <div class="mb-3 form-check">
                                <div class="mb-3">
                                    <label for="competence" class="form-label">Nueva Competencia</label>
                                    <input type="text" class="form-control" name="competence" id="competence" required>
                                  </div>
                            </div>
                            <div class="pl-5 mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                <label class="form-check-label" for="exampleCheck1">Seguro de Crear la Competencia</label>
                              </div>
                            <div class="pl-4">
                                <button type="submit" class="btn btn-primary">Guardar Nueva Competencia</button>
                            </div>
                        </form>
                    </div>


                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Nombre Competencia</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($votes as $vt)
                                <tr>
                                    <th>{{$vt->id}}</th>
                                    <th>{{$vt->created_at}}</th>
                                    <th>{{$vt->competence}}</th>
                                    <th>{{$vt->status}}</th>
                                    <th>
                                        @if ($vt->status == 'Activo')
                                        <form action="{{Route('updatevote')}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$vt->id}}">
                                            <div>
                                                <input type="checkbox" id="scales" name="scales"
                                                       required>
                                                <label for="scales">Seguro Inactivar</label>
                                              </div>  
                                            <button type="submit" name=""class="btn btn-danger">
                                                Inactivar <img class="text-white" src="{{ (url('/logo/trash-2.svg')) }}">
                                            </button>
                                        </form>
                                        @endif

                                    </th>
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