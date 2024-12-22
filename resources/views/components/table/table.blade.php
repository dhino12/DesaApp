{{-- @dd($indicators[7][$tab]->created_at) --}}
<table class="table-auto min-w-full border border-gray-800 divide-y divide-slate-100 dark:divide-slate-700 data-table capitalize" border="2">
    <thead class="bg-slate-200 dark:bg-slate-700">
        <tr>
            {{-- Loop through columns and exclude unwanted columns --}}
            <th scope="col" class="table-th break-words uppercase">
                PROVINSI NAMA
            </th>
            @foreach (array_keys($columns[$tab][0]) as $key => $column)
                @if (str_contains($column, 'id') || str_contains($column, 'kode_provinsi') || str_contains($column, 'created_at') || str_contains($column, 'updated'))
                    {{-- Skip certain columns --}}
                @else
                    <th scope="col" class="table-th break-words uppercase">
                        {{ str_replace('_', ' ', $column) }}
                    </th>
                @endif
            @endforeach
            <th scope="col" class="table-th break-words capitalize">
                TANGGAL TERISI
            </th>
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
                    @if (str_contains($column, 'id') || str_contains($column, 'kode_provinsi') || str_contains($column, 'updated'))
                        {{-- Skip certain columns --}}
                    @else
                        <td class="table-td">
                            {{-- Dynamically access values based on column name and current tab --}}
                            {{ $indicator[$tab]->{$column} ?? '' }}
                        </td>
                    @endif
                @endforeach

                {{-- Action buttons --}}
                <td class="table-td !px-0">
                    <div class="flex justify-center space-x-1 rtl:space-x-reverse">
                        {{-- @dd($indicator[$tab]->id ?? '') --}}
                        <a href="/dashboard/form-indikator-desa/{{ $indicator[$tab]->id ?? '' }}" class="btn inline-flex justify-center btn-success !px-2 !py-1 rounded-[25px] capitalize !text-sm">
                            <span class="flex items-center">
                                <span>DETAIL</span>
                            </span>
                        </a>
                        <a href="/dashboard/form-indikator-desa/{{ $indicator[$tab]->id ?? '' }}/edit" class="btn inline-flex justify-center btn-warning !px-2 !py-1 rounded-[25px] capitalize !text-sm">
                            <span class="flex items-center">
                                {{-- <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="heroicons:pencil-square"></iconify-icon> --}}
                                <span>EDIT</span>
                            </span>
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#dangerModal-{{ $indicator[$tab]->id ?? ''}}" class="btn inline-flex justify-center btn-danger !px-2 !py-1 rounded-[25px] capitalize !text-sm cursor-pointer">
                            <span class="flex items-center">
                                <span>DELETE</span>
                            </span>
                        </a>
                        {{-- <button class="action-btn" type="button">
                            
                        </button> --}}
                    </div>
                </td>
            </tr>

            {{-- BEGIN MODAL DELETE --}}
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="dangerModal-{{ $indicator[$tab]->id ?? '' }}" tabindex="-1" aria-labelledby="dangerModalLabel" aria-hidden="true">
                <div class="modal-dialog relative w-auto pointer-events-none">
                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md overflow-hidden outline-none text-current">
                        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-danger-500">
                            <h3 class="text-base font-medium text-white dark:text-white capitalize">
                                <b>PERHATIAN: menghapus salah satu baris di table ini akan berpengaruh terhadap tab / table lain {{ $indicator[$tab]->created_at ?? 0 }}</b>
                            </h3>
                            <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                        11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-4">
                                <h6 class="text-base text-slate-900 dark:text-white leading-6">
                                    Contoh.
                                </h6>
                                <p class="text-base text-slate-600 dark:text-slate-400 leading-6">
                                    Anda menghapus <b>baris 1 (pertama)</b>  pada suatu tab <br/>(misal tab Desa Profile) maka <b>baris 1 (pertama)</b> pada <br/> tab Status Desa, Regulasi Desa, dan lain-lain juga akan terhapus
                                </p>
                                <p><b>SARAN: </b>Jika memang ada yang tidak benar <b>hanya salah satu tab saja</b>, ada baiknya di ubah saja daripada menghapusnya</p>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                <form action="/dashboard/form-indikator-desa/{{ $indicator[$tab]->created_at ?? 0 }}" method="POST">
                                    @method("delete")
                                    @csrf
                                    <input type="hidden" name="kode_provinsi" value="{{ $indicator->kode_provinsi }}">
                                    <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-danger-500">Accept</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END MODAL DELETE --}}
        @endforeach
    </tbody>
</table>