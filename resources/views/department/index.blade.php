@extends('../layouts/teamplade')
@section('css')
@endsection
@section('content')
<div id="content">
  @include('department.ajax')
</div>
<div class="loading">
  <br>
  <span>Loading</span>
</div>
@endsection

@section('js')
<script src="{{ asset('js/ajaxcrud.js') }}"></script>
@endsection

