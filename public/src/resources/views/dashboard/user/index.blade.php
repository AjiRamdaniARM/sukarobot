<x-panel.app>
    <x-slot name="title">
        Manage User
    </x-slot>

    <a href="{{ route('user.create') }}" class="btn btn-success mb-3">Create</a>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                {{-- table --}}
                <table class="table datatables" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-capitalize">No</th>
                            <th class="text-capitalize">Name</th>
                            <th class="text-capitalize">Email</th>
                            <th class="text-capitalize">Phone</th>
                            <th class="text-capitalize">Community</th>
                            <th class="text-capitalize">Role</th>
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
                ajax: '{!! route('user.index') !!}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'community', name: 'community' },
                    { data: 'roles', name: 'roles.name', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
    @endpush
</x-panel.app>