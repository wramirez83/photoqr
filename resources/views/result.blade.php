@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="" method="get" name="formVote">
                        
                        @csrf
                        <select name="vote_id" id="vote_id" onchange="getResult()" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach ($votes as $v)
                            <option value="{{$v->id}}">{{$v->competence}}</option>
                                
                            @endforeach
                        </select>
                    </form>

                    @if (isset($photos))
                        <div class="mt-3 pt-2">
                            <h3>Concurso: {{$vt->competence}}</h3>
                            <h4>Estado {{$vt->status}}</h4>
                        </div>
                   
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Autor</th>
                                        <th>Descripcion</th>
                                        <th>Total</th>
                                        
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
                                                {{ $photo->getTotal($vt->id)}}
                                              </td>
                                              
                                          </tr>
                                      @endforeach
                                  </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function getResult(){
        var id = document.getElementById('vote_id');
        if(id.length>0){
            document.formVote.submit();
        }
    }
</script>
@endsection
