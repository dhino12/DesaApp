<table class="table-fixed min-w-full border border-gray-300 divide-y divide-slate-100 dark:divide-slate-700 data-table capitalize" border="2">
    <thead class="bg-slate-200 dark:bg-slate-700">
        <tr>
            {{-- Loop through columns and exclude unwanted columns --}}
            <th scope="col" class="table-th break-words uppercase">
                PROVINSI NAMA
            </th>
            @foreach (array_keys($columns[$tab][0]) as $key => $column)
                @if (str_contains($column, 'id') || str_contains($column, 'kode_provinsi') || str_contains($column, 'created') || str_contains($column, 'updated'))
                    {{-- Skip certain columns --}}
                @else
                    <th scope="col" class="table-th break-words uppercase">
                        {{ str_replace('_', ' ', $column) }}
                    </th>
                @endif
            @endforeach
            <th scope="col" class="table-th break-words capitalize">
                Action
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
        {{-- Loop through indicators --}}
        @foreach ($indicators as $indicator)
            <tr>
                {{-- Display name_provinsi --}}
                <td class="table-td">{{ $indicator->name_provinsi }}</td>

                {{-- Display dynamic columns based on the current tab --}}
                @foreach (array_keys($columns[$tab][0]) as $column)
                    @if (str_contains($column, 'id') || str_contains($column, 'kode_provinsi') || str_contains($column, 'created') || str_contains($column, 'updated'))
                        {{-- Skip certain columns --}}
                    @else
                        <td class="table-td">
                            {{-- Dynamically access values based on column name and current tab --}}
                            {{ $indicator[$tab]->{$column} ?? '' }}
                        </td>
                    @endif
                @endforeach

                {{-- Action buttons --}}
                <td class="table-td">
                    <div class="flex space-x-3 rtl:space-x-reverse">
                        <button class="action-btn" type="button">
                            <iconify-icon icon="heroicons:eye"></iconify-icon>
                        </button>
                        <button class="action-btn" type="button">
                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                        </button>
                        <button class="action-btn" type="button">
                            <iconify-icon icon="heroicons:trash"></iconify-icon>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
