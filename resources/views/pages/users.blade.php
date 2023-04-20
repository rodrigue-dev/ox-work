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
                                    <li class="breadcrumb-item active">Utilisateurs</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Utilisateurs</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-2 fw-bolder">Listes des utilisateurs</h5>

                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-2">
                                            <button class="float-end btn btn-danger"  data-bs-toggle="modal" data-bs-target="#bs-mail-modal-sm">Envoyer les mails</button>

                                        </div>
                                     </div>
                                    <div class="responsive-table-plugin">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="table_user" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="selectAll"></th>
                                                        <th>#</th>
                                                        <th>Nom</th>
                                                        <th>Prenom</th>
                                                        <th>phone</th>
                                                        <th>adresse</th>
                                                        <th>adressepostal</th>
                                                        <th>commune</th>
                                                        <th>email</th>
                                                        <th>Role</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                               {{--     @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user->id}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->lastname}}</td>
                                                        <td>{{$user->phone}}</td>
                                                        <td>{{$user->adresse}}</td>
                                                        <td>{{$user->adressepostal}}</td>
                                                        <td>{{$user->commune}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->role}}</td>
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
    <div class="modal fade" id="bs-mail-modal-sm" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Envoyer le mail</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Subject</label>
                        <input class="form-control" name="suject" type="text" id="subject" required="" placeholder="Enter your subject">
                    </div>
                    <div class="mb-3">
                        <label for="message_mail" class="form-label">Message:</label>
                        <textarea class="form-control" name="message_mail" placeholder="Entrer le message"  id="message_mail">
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="mb-3 d-grid text-center">
                        <button class="btn btn-success" type="button" id="send_mail"> Envoyer </button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

