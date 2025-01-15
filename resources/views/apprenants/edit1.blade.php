<!-- Edit Employee Modal 
<div class="modal fade" id="editEmployeeModal" tabindex="-1"> -->


<h1>Apprenant Details</h1>
<p>Name: {{ $apprenant->name }}</p>
<p>Prenom: {{ $apprenant->prenom }}</p>
<p>Email: {{ $apprenant->email }}</p>
<p>Address: {{ $apprenant->address }}</p>
<p>Phone: {{ $apprenant->phone }}</p>
<p>Formation: {{ $apprenant->formation->name }}</p>
<p>Session: {{ $apprenant->session }}</p>
<p>Montant: {{ $apprenant->montant }}</p>
<a href="{{ route('apprenants.index') }}" class="btn btn-secondary">Back to List</a>