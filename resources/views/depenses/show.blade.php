
    @extends('layouts.app') {{-- Assumes you have a basic layout set up--}}

     @section('content')
       <div class="container">
           <h1>Depense details</h1>
             <ul class="list-group">
              <li class="list-group-item">
                    <strong>Date:</strong> {{ $depense->date }}
                </li>
               <li class="list-group-item">
                   <strong>Description:</strong> {{ $depense->description }}
                </li>
               <li class="list-group-item">
                    <strong>Montant:</strong> {{ $depense->montant }}
                </li>
             </ul>
           <a href="{{ route('depenses.index') }}" class="btn btn-secondary">Back to list</a>
      </div>
    @endsection
   