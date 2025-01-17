<!-- filepath: /C:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Ecommerce Store')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-200 flex flex-col min-h-screen">
    @include('components.header')
    <main class="container mx-auto p-4 flex-grow">
        @yield('content')
    </main>
    @include('components.footer')

    <script>
        $(document).ready(function() {
            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var id = form.data('id');
                var entity = form.data('entity'); // Get the entity type
                if(confirm `voulez vous vraiment supprimer ce ${entity}`){
                $.ajax({
                    url: form.attr('action'),
                    type: 'DELETE',
                    data: form.serialize(),
                    success: function(response) {
                        $('#' + entity + '-' + id).remove(); // Remove the row
                        // form.closest("tr").remove()
                    },
                    error: function(xhr) {
                        alert('An error occurred while deleting the item.');
                    }
                });
                }
            });
        });
    </script>
</body>
</html>