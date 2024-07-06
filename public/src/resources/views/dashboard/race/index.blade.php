<x-panel.app>
    <x-slot name="title">
        Manage Race
    </x-slot>

    <a href="{{ route('race.create') }}" class="btn btn-success mb-3">Create</a>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                {{-- table --}}
                <table class="table datatables" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-capitalize">No</th>
                            <th class="text-capitalize">Name</th>
                            <th class="text-capitalize">Point</th>
                            <th class="text-capitalize">Session</th>
                            <th class="text-capitalize">Price</th>
                            <th class="text-capitalize">Image</th>
                            <th class="text-capitalize">Team</th>
                            <th class="text-capitalize">Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>

    @push('extra-script')
    <script>
        $(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('race.index') !!}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'point', name: 'point' },
                    { data: 'session', name: 'session' },
                    { data: 'price', name: 'price' },
                    { data: 'image', name: 'image', orderable: false, searchable: false },
                    { data: 'team', name: 'team', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });

            $('#editCategory').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                $("#formEditCategory").attr('action', $(location).attr('href')+'/'+button.data('id'));
                $("#nameEdit").val(button.data('name'));
            });
        });
    </script>
    @endpush
</x-panel.app>