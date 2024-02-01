

hello this is page to add a new ffedback for the reclamation :

<form method="POST" action="{{ route('Club.store') }}" enctype="multipart/form-data">

    @csrf

    Name of club: <input type="text" name="club_name"> <br>

    Description: <textarea name="description" id="" cols="30" rows="10"></textarea> <br>
    <input type="file" name="image" id=""><br>
    
    CHOOSE THE ADMIN :
        <select name="admin_id"class="form-select" aria-label="Default select example">
            <option selected>choose the amdin of the club</option>
            @foreach ($admins as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
      </select>

    <button class="btn btn-primary" type="submit">Submit</button>
</form>
