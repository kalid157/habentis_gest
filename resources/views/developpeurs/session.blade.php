</head>
  <body>
  <div class="container">
      <h1>Session: {{ $session }}</h1>

    <table class="table table-striped">
      <thead>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Formation</th>
            <th>Montant</th>
        </tr>
      </thead>
      <tbody>
      @foreach($sessionData as $record)
          <tr>
            <td>{{$record->name}}</td>
            <td>{{$record->surname}}</td>
            <td>{{$record->email}}</td>
            <td>{{$record->address}}</td>
            <td>{{$record->phone}}</td>
            <td>{{$record->formation}}</td>
            <td>{{$record->montant}}</td>
          </tr>
      @endforeach
      </tbody>
    </table>
      <a href="{{route('data.index')}}" >Back to sessions</a>
  </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </html>
  ```
   This view displays the data corresponding to the provided `session`.