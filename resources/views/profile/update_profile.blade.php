this is for updating the profile of a user
authentication!!!!!!!!!!!!!!!!!!!


<form action="{{route('profile.update',['profile'=>$user->id])}}" method="Post">
    @csrf
    @method('put')
    
   
  <input type="text" name="name" id="" value="{{$user->name}}" placeholder="name"><br>
  <input type="text" name="age" id="" value="{{$user->age}}" placeholder="age"><br>
  <input type="text" name="sexe" id="" value="{{$user->Sexe}}" placeholder="sexe"><br>
  <input type="text" name="Profession" id="" value="{{$user->Profession}}" placeholder="profession"><br>
  <input type="date" name="DateNaissance" id="" value="{{$user->DateNaissance}}" placeholder="datenasisance"><br>

    <button class="btn btn-primary" type="submit">Submit</button>
</form>