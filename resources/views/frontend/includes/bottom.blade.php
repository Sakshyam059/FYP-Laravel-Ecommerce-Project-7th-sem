<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    let timeout;
    $('#search').on('keyup', function() {
        clearTimeout(timeout);
        let query = $(this).val();

        if (query.length === 0) {
            $('#results').empty(); 
            $('#results').hide(); 
            return; 
        } else {
            $('#results').show(); 
        }

        timeout = setTimeout(function() {
            $.ajax({
                url: "{{ route('items.search') }}",
                type: "GET",
                data: { query: query },
                success: function(data) {
                    $('#results').empty();
                    if (data.length > 0) {
                        $.each(data, function(index, item) {
                            $('#results').show();
                            var routeUrl = '{{ route("product.show", ":id") }}';
                            routeUrl = routeUrl.replace(':id', item.id); 
                            $('#results').append('<li class="px-4 py-2"><a href="' + routeUrl + '">' + item.name + '</a></li>');
                        });
                    } else {
                        $('#results').show();
                        $('#results').append('<li class="px-4 py-2">No items found.</li>');
                    }
                }
            });
        }, 300); // Adjust timeout as needed
    });
});

</script>