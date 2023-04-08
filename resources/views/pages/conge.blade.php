@extends('base')

@section('content')
    <div class="content-page" style="background-image:url('../storage/images/oxfambg.png');background-repeat: no-repeat;
background-size: contain;
background-attachment: fixed;background-position: center">
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
                                    <li class="breadcrumb-item active">Congé</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Congés</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-2 fw-bolder">Listes des congés</h5>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#bs-example-modal-sm"><i class="icofont icofont-plus"></i>Ajouter un congé
                                        </button>

                                    </div>
                                </div>
                            </div>
                                <div class="card-body">

                                    <div class="responsive-table-plugin">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="table_conge" class="table table-striped  data-table">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>date_conge</th>
                                                        <th>Periode</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                  {{--  @foreach($conges as $conge)
                                                        <tr>
                                                            <td>{{$conge->id}}</td>
                                                            <td>{{$conge->date_conge}}</td>
                                                            <td>{{$conge->periode->heure_debut}} {{$conge->periode->heure_fin}}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{route('conge_edit',['id'=>$conge->id])}}" type="button" class="btn btn-outline-success btn-sm"><i class="icon icon-pencil"></i>
                                                                </a>
                                                                <button  onclick="getItem({{$conge->id}})" type="button" class="btn btn-outline-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#bs-delete-modal-sm"><i class="icon icon-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    @endforeach--}}
                                                    </tbody>
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
                    <h4 class="modal-title" id="mySmallModalLabel">Ajouter un congé</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('conge')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="mb-3">
                                <label for="name" class="form-label">date_conge</label>
                                <input class="form-control" name="date_conge" type="date" id="name" required="" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="inputState" class="form-label">Periode</label>
                                <select name="periode_id" id="inputState" class="form-select">
                                    <option>Choose</option>
                                    @foreach($periodes as $periode)
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
                    <p>Le conge n° <span id="periode_id"></span> doit etre supprimer definitivement</p>
                    <form>
                        {{csrf_field()}}

                        <div class="mb-3 d-grid text-center">
                            <button class="btn btn-danger" type="button" id="delete_btn_conge"> Supprimer </button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
@push('scripts')


@endpush

