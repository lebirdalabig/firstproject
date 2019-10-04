<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>E-Mail</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td>{{$user->fname}}</td>
                <td>{{$user->lname}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->username}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>