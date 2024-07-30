<div id="error-modal" class="alert alert-danger">
    <ul style="padding: 0; margin:0">
        @foreach ($errors->all() as $error)
            <li style="list-style-type: none">{{ $error }}</li>
        @endforeach
    </ul>
</div>


