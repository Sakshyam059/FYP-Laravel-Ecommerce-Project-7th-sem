@extends('vendor.includes.main')
@section('content')
    <form action="{{route('vendor.verify')}}" method="post" class="px-3 py-4 space-y-4 " enctype="multipart/form-data">
        @csrf
            @include('vendor.profile.partials.profile-info')
            @include('vendor.profile.partials.address-info')
            @include('vendor.profile.partials.verification-info')
            @include('vendor.profile.partials.logo')
            @include('vendor.profile.partials.payment-info')
            <div>
                <button class="px-12 py-2 text-white bg-green-600 rounded">Submit </button>
            </div>
    </form>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#province').change(function() {
            var province_id = $(this).val();

            if (province_id) {
                $.ajax({
                    url: '/districts/' + province_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#district').empty();
                        $('#district').append('<option value="">Select District</option>');
                        $.each(data, function(key, value) {
                            $('#district').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#district').empty();
                $('#district').append('<option value="">Select District</option>');
            }
        });
    });
</script>
@endsection