@extends('layout')

@section('content')
    @include('header')

    <style>
        /* Styles existants */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .custom-table th {
            background-color: #f2f2f2;
        }

        .custom-table td.etat-en-cours {
            background-color: #f2f2f2;
        }

        .custom-table td.etat-traite button {
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        #bodyReclamation {
            padding: 40px;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-12" id="bodyReclamation">
                <div class="mb-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Succès!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erreur!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                </div>
                <h1>Liste des réclamations</h1>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Intitulé de réclamation</th>
                            <th>Club name</th>
                            <th>Contenu</th>
                            <th>État</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reclamations as $item)
                            <tr>
                                <td>{{ $item->title }}</td>

                                <td>{{ $item->club->name }}</td>
                                <td>{{ $item->CorpReclamation }}</td>
                                @if ($item->etat == 0)
                                    <td class="etat-en-cours">En cours de traitement</td>
                                @else
                                    @foreach ($item->feedbacks as $feedback)
                                        <td class="etat-traite"><button type="button" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal{{ $feedback->id }}"
                                                data-feedback="Le problème de livraison a été résolu.">Traité</button></td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $feedback->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Feedback de
                                                            réclamation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p id="modal-text">Feedback de l'administrateur.</p>
                                                        <p id="modal-text">{{ $feedback->response }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <td>
                                    @if (!$item->etat)
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteReclamationModal{{ $item->NumReclamation }}">
                                            Supprimer
                                        </button>
                                    @endif
                                    @if ($item->etat)
                                        Tu n'a pas le droit de supprimer la réclamation
                                    @endif
                                    <div class="modal" id="deleteReclamationModal{{ $item->NumReclamation }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirmation de suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Êtes-vous sûr de vouloir supprimer cette réclamation ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                    <form
                                                        action="{{ route('reclamation.destroy', ['reclamation' => $item->NumReclamation]) }}"
                                                        method="post" id="deleteForm-{{ $item->NumReclamation }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('footer')
@endsection
