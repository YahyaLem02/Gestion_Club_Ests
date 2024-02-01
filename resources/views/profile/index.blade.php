hello this is me and

read profile

{{$profile->name}}
@if ($profile->isadmin)
    echo "admin";
@else
    echo user 
@endif
<a href="{{route('profile.edit',['profile'=>$profile->id])}}" >edit me </a>