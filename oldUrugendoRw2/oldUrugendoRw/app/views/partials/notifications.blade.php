@if (Session::has('notification.message'))

        <div class="alert alert-{{ Session::get('notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('notification.message') }}
        </div>
@endif