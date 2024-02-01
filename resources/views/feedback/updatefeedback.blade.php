heelo here u can modify the feedback of u 


hello this for updating the feedback

<h1>{{$feedback->id}}</h1>
<form action="{{route('feedback.update',['feedback'=>$feedback->id])}}" method="Post">
    @csrf
    @method('put')
    
   
  <textarea name="response" id="" cols="30" rows="10" >{{$feedback->response}}</textarea>

    <button class="btn btn-primary" type="submit">Submit</button>
</form>