@extends('base')

@section('content')
    <div class="content-page">
        <div class="content">
        @include("_partials.errors-and-messages")
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box page-title-box-alt">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Accueil</a></li>
                                    <li class="breadcrumb-item">Congé</li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Modifier le congé {{$conge->date_conge}}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-2 fw-bolder"></h5>
                            </div>
                                <div class="card-body">
                                    <form method="POST" action="{{route('conge_edit',['id'=>$conge->id])}}">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">date_conge</label>
                                                <input class="form-control" value="{{ $conge->date_conge}}" name="date_conge" type="date" id="name" required="" placeholder="Enter your name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputState" class="form-label">Periode</label>
                                                <select name="periode_id" id="inputState" class="form-select">
                                                    <option>Choose</option>
                                                    @foreach($periodes as $periode)
                                                        @if($periode->id===$conge->periode_id)
                                                        <option selected="" value="{{$periode->id}}">{{$periode->heure_debut}} {{$periode->heure_fin}}</option>
                                                        @endif
                                                        <option value="{{$periode->id}}">{{$periode->heure_debut}} {{$periode->heure_fin}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-grid text-center">
                                            <button class="btn btn-success" type="submit"> Enregistrer </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

