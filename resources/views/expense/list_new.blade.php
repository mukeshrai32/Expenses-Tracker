<!DOCTYPE html>
<html>

<head>
    <title>Step-by-Step Tutorial: Implementing Yajra Datatables in Laravel 10 - CodeAndDeploy.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Expenses List </h1>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>SN </th>
                    <th>Title </th>
                    <th>Expense Amt.</th>
                    <th>Quantity </th>
                    <th>Category </th>
                    <th>Added By </th>
                    <th>Created Date </th>
                    <th>Updated Date </th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
                {{-- loads data here...  --}}
            </tbody>
        </table>
    </div>

</body>

<script type="text/javascript" defer>
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('expense.list') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    // orderable: false,
                    // searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'expense_amount',
                    name: 'expense_amount'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'category_id',
                    name: 'category_id'
                },
                {
                    data: 'creator.name',
                    name: 'creator.name'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });
</script>

</html>
