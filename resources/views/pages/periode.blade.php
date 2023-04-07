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
                                    <li class="breadcrumb-item active">Periodes</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Periodes</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-2 fw-bolder">Listes des periode</h5>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bs-example-modal-sm"><i class="icofont icofont-plus"></i>Ajouter une periode
                                        </button>

                                    </div>
                                </div>
                            <div class="card-body">

                                <div class="responsive-table-plugin">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>heure de debut</th>
                                                    <th>heure de fin</th>
                                                    <th>Actions</th>
                                                </tr>
                                                <tbody>
                                                @foreach($periodes as $conge)
                                                    <tr>
                                                        <td>{{$conge->id}}</td>
                                                        <td>{{$conge->heure_debut}} </td>
                                                        <td>{{$conge->heure_fin}}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{route('periode_edit',['id'=>$conge->id])}}" type="button" class="btn btn-outline-success btn-sm"><i class="icon icon-pencil"></i>
                                                                </a>
                                                                <button onclick="getItem({{$conge->id}})"  data-bs-toggle="modal" data-bs-target="#bs-delete-modal-sm" type="button" class="btn btn-outline-danger btn-sm"><i class="icon icon-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Ajouter une periode</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('periode')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="mb-3">
                                <label for="name" class="form-label">Heure de debut</label>
                                <input class="form-control" name="heure_debut" type="time" id="name" required="" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Heure de fin</label>
                                <input class="form-control" name="heure_fin" type="time" id="name" required="" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="mb-3 d-grid text-center">
                            <button class="btn btn-success" type="submit"> Enregistrer </button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="bs-delete-modal-sm" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Supprimer le congé</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>La periode n° <span id="periode_id"></span>doit etre supprimer definitivement</p>
                    <form>
                        {{csrf_field()}}

                        <div class="mb-3 d-grid text-center">
                            <button class="btn btn-danger" type="button" id="delete_btn"> Supprimer </button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

