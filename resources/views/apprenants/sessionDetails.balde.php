<h1>Session Details for {{ $apprenant->name }}</h1>

<p>Session: {{ $apprenant->session }}</p>
<p>Montant: {{ $apprenant->montant }}</p>

<!-- Add more session-specific details here -->
<!-- Example: -->
<!-- <p>Session Start Date: {{ $apprenant->session_start_date }}</p> -->
<!-- <p>Session Location: {{ $apprenant->session_location }}</p> -->

<a href="{{ route('apprenants.index') }}" class="btn btn-secondary">Back to List</a>