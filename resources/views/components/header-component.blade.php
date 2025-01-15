
<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
    <x-adminlte-small-box title="528" text="User Registrations" icon="fas fa-user-plus text-teal"
    theme="primary" url="#" url-text="View all users"/>
    </div>
    <div class="col-sm">
    {{-- Layout Classic / Minimal --}}
    <x-adminlte-profile-widget name="User Name" layout-type="classic"/>
    </div>
    <div class="col-sm">
      One of three columns
    </div>
  </div>
</div>



@push('js')
<script>

    $(document).ready(function() {

        let sBox = new _AdminLTE_SmallBox('sbUpdatable');

        let updateBox = () =>
        {
            // Stop loading animation.
            sBox.toggleLoading();

            // Update data.
            let rep = Math.floor(1000 * Math.random());
            let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
            let text = 'Reputation - ' + ['Basic', 'Silver', 'Gold'][idx];
            let icon = 'fas fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
            let url = ['url1', 'url2', 'url3'][idx];

            let data = {text, title: rep, icon, url};
            sBox.update(data);
        };

        let startUpdateProcedure = () =>
        {
            // Simulate loading procedure.
            sBox.toggleLoading();

            // Wait and update the data.
            setTimeout(updateBox, 2000);
        };

        setInterval(startUpdateProcedure, 10000);
    })

</script>
@endpush