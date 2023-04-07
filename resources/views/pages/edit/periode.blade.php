@extends('base')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box page-title-box-alt">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Accueil</a></li>
                                    <li class="breadcrumb-item">Periode</li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Modifier le periode {{$periode->heure_debut}}</h4>
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
                                <form method="POST" action="{{route('periode_edit',['id'=>$periode->id])}}">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Heure de debut</label>
                                            <input value="{{$periode->heure_debut}}" class="form-control" name="heure_debut" type="time" id="name" required="" placeholder="Enter your name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Heure de fin</label>
                                            <input value="{{$periode->heure_fin}}" class="form-control" name="heure_fin" type="time" id="name" required="" placeholder="Enter your name">
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


