@if (\Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {!! \Session::get('success') !!}
        <a href="#" class="close" data-dismiss="alert" aria-label="close" style="float: right;">&times;</a>
    </div>
@endif
@if (\Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <strong>error!</strong> {!! \Session::get('error') !!}
        <a href="#" class="close" data-dismiss="alert" aria-label="close" style="float: right;">&times;</a>
    </div>
@endif