@push('scripts')
<script>
function filters() {
	var filter_date = $("#filter_date").val();
	var category   = $("#category").val();
	var district   = $("#district").val();
    return { filter_date: filter_date, category: category, district: district };
}

function search(page) {
	$.ajax({
		url: "{{ url('/dashboard') }}?page=" + page,
		type: "GET",
		beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
            if (token) {
                xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: filters(),
        success: function(data) {
            $('.search-results').html(data);
            $("#preloader").hide();
        },
        error: function() {
            $("#preloader").hide();
		}
	});
}

$(document).ready(function() {
    search(1);
    $("#sform").on('reset',function(e){
        setTimeout(function(){
            search(1);
        },500);
    });

    $('.onX').on('click', function() {
        search(1);
    });

    $(document).on('click', '.search-results .pagination a', function (e) {
        e.preventDefault();
        search($(this).attr('href').split('page=')[1]);
    });
});

</script>
@endpush
