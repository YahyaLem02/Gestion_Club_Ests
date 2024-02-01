hello this is page to add a new ffedback for the reclamation :


<form action="{{route('feedback.store')}}" method="Post" >
    @csrf
    {{-- @method('put') --}}

    titre<input type="text">    
    
    
  <textarea name="response" id="" cols="30" rows="10"></textarea>
  {{-- <input type="hidden" name="reclamation" value="{{$reclamation}}"> --}}
  {{session('reclamation')}}lkklkl
    <button class="btn btn-primary" type="submit">Submit</button>
  </form>