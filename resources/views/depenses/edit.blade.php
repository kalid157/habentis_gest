


@extends('layouts.app') {{-- Assumes you have a basic layout set up--}}

 @section('content')
  <div class="container">
       <h1>Editer une Depense</h1>
      <form action="{{ route('depenses.update', $depense) }}" method="POST">
           @csrf
           @method('PUT')
           <div class="mb-3">
               <label for="date" class="form-label">Date</label>
               <input type="date" name="date" id="date" class="form-control" required value="{{ $depense->date }}">
          </div>
           <div class="mb-3">
               <label for="description" class="form-label">Description</label>
               <input type="text" name="description" id="description" class="form-control" required value="{{ $depense->description }}">
           </div>
           <div class="mb-3">
               <label for="montant" class="form-label">Montant</label>
               <input type="number" name="montant" id="montant" class="form-control" required value="{{ $depense->montant }}">
           </div>
           <button type="submit" class="btn btn-primary">Save Changes</button>
       </form>
  </div>
@endsection
```