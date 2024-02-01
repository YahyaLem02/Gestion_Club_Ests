{{-- <form action="{{route('reclamation.store')}}" method="Post" enctype="multipart/form-data">
    @csrf



    titre<input type="text" name="title">    
    
  <textarea name="CorpReclamation" id="" cols="30" rows="10"></textarea>
    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
  @extends('layout') --}}

 @extends('layout')
@section('content')
@include('header')
    <style>
        .custom-form {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .custom-form:hover {
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #10a6e2;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        input[type="text"] {
            outline: none;
            border-color: #10a6e2;
        }

        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
            resize: vertical;
            /* Permettre le redimensionnement vertical */
        }

        textarea:focus {
            outline: none;
            border-color: #10a6e2;
        }

        button {
            padding: 10px 20px;
            background-color: #10a6e2;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0d8ac9;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
              <form action="{{route('reclamation.store')}}" method="Post">
                    @csrf
                    <div class="form-group">
                        <label for="titre">Intitulé du réclamation</label>
                        <input type="text" id="titre" name="title" placeholder="Entrez l'intitulé" required>
                    </div>
                    <select name="club_id"class="form-select" aria-label="Default select example">
                        <option selected>Select a club</option>
                        @foreach ($clubs as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select><br> <br>
                    <div class="form-group">
                        <label for="reclamation">Le contenu du réclamation</label>
                        <textarea name="CorpReclamation" id="reclamation" cols="30" rows="10" placeholder="Entrez votre réclamation"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('footer')
@endsection
