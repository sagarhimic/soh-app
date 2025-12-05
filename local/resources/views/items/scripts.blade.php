@push('scripts')
<script>
function filters() {
	var search_key = $("#search_key").val().trim();
	var category   = $("#category").val();
    return { search_key: search_key, category: category };
}

function search(page) {
	$.ajax({
		url: "{{ url('/items') }}?page=" + page,
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

    $('#category, #search_key').on('change', function() {
        search(1);
    });

    search(1);

    $('#search_key').keypress(function (event) {
        if (event.keyCode == 13) {
            search(1);
            event.preventDefault();
        }
    });

    $('#search_key').keyup(function () {
        if ($(this).val().trim().length === 0 ) {
            search(1);
        }
    });

    $("#sform").on('reset',function(e){
        setTimeout(function(){
            $("#search_key").val('');
            search(1);
            $(".input_search_icon").removeClass("input_clear_icon");
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