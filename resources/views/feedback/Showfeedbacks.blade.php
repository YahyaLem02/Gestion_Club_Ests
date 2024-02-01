ajouter feedback :
{{-- initialiser un variabel dans session --}}
{{session(['reclamation' => $reclamation])}}
{{session('reclamation')}}
<a href="{{route('feedback.create')}}">ajouter</a>

<br>
this is feedbacks: <br>
 @foreach ($feedbacks as $feedback)
     {{ $feedback->response}}
     
     <a class="dropdown-item" href="{{route('feedback.edit',['feedback'=>$feedback->id ])}}">Edit</a>
     <form action="{{route('feedback.destroy',['feedback'=>$feedback->id ])}}" method="post">
        @csrf
        @method('delete')
        <button>Suppr</button>
      </form>
      <br>
      {{-- {{$feedback->id}} --}}
        
 @endforeach
{{-- {{dd($feedbacks)}} --}}