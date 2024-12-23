<!-- BEGIN: Step Form Horizontal -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<style>
    [x-cloak] {
        display: none;
    }

    [type="checkbox"] {
        box-sizing: border-box;
        padding: 0;
    }

    .form-checkbox,
    .form-radio {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
        display: inline-block;
        vertical-align: middle;
        background-origin: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        flex-shrink: 0;
        color: currentColor;
        background-color: #fff;
        border-color: #e2e8f0;
        border-width: 1px;
        height: 1.4em;
        width: 1.4em;
    }

    .form-checkbox {
        border-radius: 0.25rem;
    }

    .form-radio {
        border-radius: 50%;
    }

    .form-checkbox:checked {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
        border-color: transparent;
        background-color: currentColor;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    .form-radio:checked {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
        border-color: transparent;
        background-color: currentColor;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<div class="wizard card">
    <div x-data="app()" x-cloak>
        @if (session()->has("error-indikator"))
            <div class="py-[18px] px-6 font-normal text-sm rounded-md bg-danger-500 text-white">
                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                    <iconify-icon class="text-2xl flex-0" icon="heroicons:exclaimation-triangle"></iconify-icon>
                    <p class="flex-1 font-Inter">
                        {{ session("error-indikator") }}
                    </p>
                    <div class="flex-0 text-xl cursor-pointer">
                        <iconify-icon icon="line-md:close"></iconify-icon>
                    </div>
                </div>
            </div>
        @endif

        <form action="/dashboard/form-indikator-desa" method="post">
        @csrf
		<div class="max-w-3xl mx-auto px-4 py-10">

			<div x-show.transition="step === 'complete'">
				<div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
					<div>
						<svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

						<h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registration Success</h2>

						<div class="text-gray-600 mb-8">
							Thank you. We have sent you an email to demo@demo.test. Please click the link in the message to activate your account.
						</div>

						<button
							@click="step = 1"
							class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
						>Back to home</button>
					</div>
				</div>
			</div>

			<div x-show.transition="step != 'complete'">	
				<!-- Top Navigation -->
				<div class="border-b-2 py-4">
					<div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight" x-text="`Step: ${step} of 5`"></div>
					<div class="flex flex-col md:flex-row md:items-center md:justify-between">
						<div class="flex-1">
							<div x-show="step === 1">
								<div class="text-lg font-bold text-gray-700 leading-tight">Desa Profile</div>
							</div>
							<div x-show="step === 2">
								<div class="text-lg font-bold text-gray-700 leading-tight">Status Desa</div>
							</div>
							<div x-show="step === 3">
								<div class="text-lg font-bold text-gray-700 leading-tight">Regulasi Desa</div>
							</div>
							<div x-show="step === 4">
								<div class="text-lg font-bold text-gray-700 leading-tight">Kelembagaan Aparatur</div>
							</div>
							<div x-show="step === 5">
								<div class="text-lg font-bold text-gray-700 leading-tight">Penghargaan Desa</div>
							</div>
						</div>

						<div class="flex-1 items-center lg:w-62">
							<div class="w-full bg-white rounded-full mr-2">
								<div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white" :style="'width: '+ parseInt(step / 5 * 100) +'%'"></div>
							</div>
							<div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 5 * 100) +'%'"></div>
						</div>
					</div>
				</div>
				<!-- /Top Navigation -->

				<!-- Step Content -->
				<div class="pt-5 pb-10">	
                        <div x-show.transition.in="step === 1" id="indikator-1">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Masukan data yang dibutukan form 🙏</h4>
                                    <select name="kode_provinsi" id="select2basic" class="select2 form-control w-full mt-2 py-2">
                                        <option selected="Selected" disabled="disabled" value="" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                        @foreach ($provinces as $provinsi)
                                            <option value="{{ $provinsi->kode_provinsi }}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $provinsi->kode_provinsi }} - {{ $provinsi->name_provinsi }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input id="indikator" type="number" class="form-control" placeholder="kode provinsi" name="kode_provinsi" value="11" readonly> --}}
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label" style="font-size: 1.04em; font-weight: 500">Jumlah Desa <strong style="color: red">*</strong></label>
                                    <div class="text-gray-600 mt-2 mb-4 text-xs">> Desa dalam wilayah Kabupaten/Kota</div>
                                    <input id="indikator" type="number" class="form-control" placeholder="Jumlah Desa" name="jumlah_desa" required value="{{ old('jumlah_desa') }}">
                                    @error('jumlah_desa')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Profil desa harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label" style="font-size: 1.04em; font-weight: 500">Jumlah RT <strong style="color: red">*</strong></label>
                                    <div class="text-gray-600 mt-2 mb-4 text-xs">> RT Desa dalam wilayah Kabupaten/Kota</div>
                                    <input id="indikator" type="number" class="form-control" placeholder="Jumlah RT" name="jumlah_rt" required value="{{ old('jumlah_rt') }}">
                                    @error('jumlah_rt')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah RT harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label" style="font-size: 1.04em; font-weight: 500">Jumlah RW <strong style="color: red">*</strong></label>
                                    <div class="text-gray-600 mt-2 mb-4 text-xs">> RW Desa dalam wilayah Kabupaten/Kota</div>
                                    <input id="indikator" type="number" class="form-control" placeholder="Jumlah RW" name="jumlah_rw" value="{{ old('jumlah_rw') }}">
                                    @error('jumlah_rw')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah RW harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label" style="font-size: 1.04em; font-weight: 500">Jumlah LAD <strong style="color: red">*</strong></label>
                                    <div class="text-gray-600 mt-2 mb-4 text-xs">> LAD yang telah ditetapkan <br><br></div>
                                    <input id="indikator" type="number" class="form-control" placeholder="Jumlah LAD" name="jumlah_lad" value="{{ old('jumlah_lad') }}">
                                    @error('jumlah_lad')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah LAD harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label" style="font-size: 1.04em; font-weight: 500">Jumlah Aparatur Pemerintahan Desa <strong style="color: red">*</strong></label>
                                    <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div>
                                    <input id="indikator" type="number" class="form-control" placeholder="Jumlah Aparatur Pemerintahan Desa" name="jumlah_aparatur_pemerintahan_desa" value="{{ old('jumlah_aparatur_pemerintahan_desa') }}">
                                    @error('jumlah_aparatur_pemerintahan_desa')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Aparatur Pemerintahan Desa harus diisi</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div x-show.transition.in="step === 2" id="indikator-2">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Masukan data yang dibutukan form 🙏</h4>
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa swadaya <strong style="color: red">*</strong></label>
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa swadaya" name="jumlah_desa_swadaya" value="{{ old('jumlah_desa_swadaya') }}">
                                    @error('jumlah_desa_swadaya')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Desa Swadaya harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa swakarya <strong style="color: red">*</strong></label>
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa swakarya" name="jumlah_desa_swakarya" value="{{ old('jumlah_desa_swakarya') }}">
                                    @error('jumlah_desa_swakarya')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Desa Swakarya harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa swasembada <strong style="color: red">*</strong></label>
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa swasembada" name="jumlah_desa_swasembada" value="{{ old('jumlah_desa_swasembada') }}">
                                    @error('jumlah_desa_swasembada')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Desa Swasembada harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa rumah tidak layak huni <strong style="color: red">*</strong></label>
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa rumah tidak layak huni" name="jumlah_desa_rumah_tidak_layak_huni" value="{{ old('jumlah_desa_rumah_tidak_layak_huni') }}">
                                    @error('jumlah_desa_rumah_tidak_layak_huni')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Desa Rumah Tidak Layak Huni harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa sanitasi kurang bagus<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa sanitasi kurang bagus" name="jumlah_desa_sanitasi_kurang_bagus" value="{{ old('jumlah_desa_sanitasi_kurang_bagus') }}">
                                    @error('jumlah_desa_sanitasi_kurang_bagus')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Desa Sanitasi Tidak Layak harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa menyewa kantor desa<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa menyewa kantor desa" name="jumlah_desa_menyewa_kantor_desa" value="{{ old('jumlah_desa_menyewa_kantor_desa') }}">
                                    @error('jumlah_desa_menyewa_kantor_desa')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Desa Menyewa Kantor Desa harus diisi</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div x-show.transition.in="step === 3" id="indikator-3">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Masukan data yang dibutukan form 🙏</h4>
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah peraturan desa<strong style="color: red">*</strong></label>
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah peraturan desa" name="jumlah_peraturan_desa" required value="{{ old('jumlah_peraturan_desa') }}">
                                    @error('jumlah_peraturan_desa')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Peraturan Desa harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah peraturan kepala desa<strong style="color: red">*</strong></label>
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah peraturan kepala desa" name="jumlah_peraturan_kepala_desa" value="{{ old('jumlah_peraturan_kepala_desa') }}">
                                    @error('jumlah_peraturan_kepala_desa')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Peraturan Kepala Desa harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah peraturan bersama kepala desa<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> RW Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah peraturan bersama kepala desa" name="jumlah_peraturan_bersama_kepala_desa" value="{{ old('jumlah_peraturan_bersama_kepala_desa') }}">
                                    @error('jumlah_peraturan_bersama_kepala_desa')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Peraturan Kepala Desa harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah keputusan kepala desa<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> LAD yang telah ditetapkan <br><br></div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah keputusan kepala desa" name="jumlah_keputusan_kepala_desa" value="{{ old('jumlah_keputusan_kepala_desa') }}">
                                    @error('jumlah_keputusan_kepala_desa')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Keputusan Kepala Desa harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa memiliki sop spm<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa memiliki sop spm" name="jumlah_desa_memiliki_sop_spm" value="{{ old('jumlah_desa_memiliki_sop_spm') }}">
                                    @error('jumlah_desa_memiliki_sop_spm')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Desa Memiliki SOP SPM harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa memiliki peraturan kerjasama antar desa<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa memiliki peraturan kerjasama antar desa" name="jumlah_desa_memiliki_peraturan_kerjasama_antar_desa" value="{{ old('jumlah_desa_memiliki_peraturan_kerjasama_antar_desa') }}">
                                    @error('jumlah_desa_memiliki_peraturan_kerjasama_antar_desa')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon> Jumlah Desa Memiliki Peraturan Kerjasama Antar Desa harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa memiliki peraturan kerjasama pihak ketiga<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa memiliki peraturan kerjasama pihak ketiga" name="jumlah_desa_memiliki_peraturan_kerjasama_pihak_ketiga" value="{{ old('jumlah_desa_memiliki_peraturan_kerjasama_pihak_ketiga') }}">
                                    @error('jumlah_desa_memiliki_peraturan_kerjasama_pihak_ketiga')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah Desa Memiliki Peraturan Kerjasama Pihak Ketiga harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa melaksanakan kerjasama bkad bumdes<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa melaksanakan kerjasama bkad bumdes" name="jumlah_desa_melaksanakan_kerjasama_bkad_bumdes" value="{{ old('jumlah_desa_melaksanakan_kerjasama_bkad_bumdes') }}">
                                    @error('jumlah_desa_melaksanakan_kerjasama_bkad_bumdes')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah Desa Memiliki Peraturan Kerjasama Pihak Ketiga harus diisi</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div x-show.transition.in="step === 4" id="indikator-4">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Masukan data yang dibutukan form 🙏</h4>
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah anggota bpd<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah anggota bpd" name="jumlah_anggota_bpd" value="{{ old('jumlah_anggota_bpd') }}">
                                    @error('jumlah_anggota_bpd')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah Anggota BPD harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah anggota bpd perempuan<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> RT Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah anggota bpd perempuan" name="jumlah_anggota_bpd_perempuan" value="{{ old('jumlah_anggota_bpd_perempuan') }}">
                                    @error('jumlah_anggota_bpd_perempuan')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah Anggota BPD Perempuan harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah lkd<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> RW Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah lkd" name="jumlah_lkd" value="{{ old('jumlah_lkd') }}">
                                    @error('jumlah_lkd')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah LKD harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah lkd dasar hukum sah<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> LAD yang telah ditetapkan <br><br></div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah lkd dasar hukum sah" name="jumlah_lkd_dasar_hukum_sah" value="{{ old('jumlah_lkd_dasar_hukum_sah') }}">
                                    @error('jumlah_lkd_dasar_hukum_sah')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah LKD Dasar Hukum Sah harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa menetapkan kepengurusan posyandu<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa menetapkan kepengurusan posyandu" name="jumlah_desa_menetapkan_kepengurusan_posyandu" value="{{ old('jumlah_desa_menetapkan_kepengurusan_posyandu') }}">
                                    @error('jumlah_desa_menetapkan_kepengurusan_posyandu')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah Desa Menetapkan Kepengurusan Poyandu harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah aparatur desa pelatihan kapasitas<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah aparatur desa pelatihan kapasitas" name="jumlah_aparatur_desa_pelatihan_kapasitas" value="{{ old('jumlah_aparatur_desa_pelatihan_kapasitas') }}">
                                    @error('jumlah_aparatur_desa_pelatihan_kapasitas')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah aparatur desa pelatihan kapasitas harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa aktif pkk<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa aktif pkk" name="jumlah_desa_aktif_pkk" value="{{ old('jumlah_desa_aktif_pkk') }}">
                                    @error('jumlah_desa_aktif_pkk')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah desa aktif pkk harus diisi</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div x-show.transition.in="step === 5" id="indikator-5">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Masukan data yang dibutukan form 🙏</h4>
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa menerima penghargaan kecamatan<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa menerima penghargaan kecamatan" name="jumlah_desa_menerima_penghargaan_kecamatan" value="{{ old('jumlah_desa_menerima_penghargaan_kecamatan') }}">
                                    @error('jumlah_desa_menerima_penghargaan_kecamatan')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah desa menerima penghargaan kecamatan harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa menerima penghargaan kabupaten<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> RT Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa menerima penghargaan kabupaten" name="jumlah_desa_menerima_penghargaan_kabupaten" value="{{ old('jumlah_desa_menerima_penghargaan_kabupaten') }}">
                                    @error('jumlah_desa_menerima_penghargaan_kabupaten')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah desa menerima penghargaan kabupaten harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa menerima penghargaan provinsi<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> RW Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa menerima penghargaan provinsi" name="jumlah_desa_menerima_penghargaan_provinsi" value="{{ old('jumlah_desa_menerima_penghargaan_provinsi') }}">
                                    @error('jumlah_desa_menerima_penghargaan_provinsi')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah desa menerima penghargaan provinsi harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa menerima penghargaan nasional<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> LAD yang telah ditetapkan <br><br></div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa menerima penghargaan nasional" name="jumlah_desa_menerima_penghargaan_nasional" value="{{ old('jumlah_desa_menerima_penghargaan_nasional') }}">
                                    @error('jumlah_desa_menerima_penghargaan_nasional')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah desa menerima penghargaan nasional harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa menerima penghargaan internasional<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa menerima penghargaan internasional" name="jumlah_desa_menerima_penghargaan_internasional" value="{{ old('jumlah_desa_menerima_penghargaan_internasional') }}">
                                    @error('jumlah_desa_menerima_penghargaan_internasional')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah desa menerima penghargaan internasional harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa musrenbang tertib<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa musrenbang tertib" name="jumlah_desa_musrenbang_tertib" value="{{ old('jumlah_desa_musrenbang_tertib') }}">
                                    @error('jumlah_desa_musrenbang_tertib')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah desa musrenbang tertib harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa rpjmdes tepat waktu<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa rpjmdes tepat waktu" name="jumlah_desa_rpjmdes_tepat_waktu" value="{{ old('jumlah_desa_rpjmdes_tepat_waktu') }}">
                                    @error('jumlah_desa_rpjmdes_tepat_waktu')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah desa rpjmdes tepat waktu harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa rkpdes tepat waktu<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa rkpdes tepat waktu" name="jumlah_desa_rkpdes_tepat_waktu" value="{{ old('jumlah_desa_rkpdes_tepat_waktu') }}">
                                    @error('jumlah_desa_rkpdes_tepat_waktu')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah desa rkpdes tepat waktu harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah desa sertifikat kantor<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah desa sertifikat kantor" name="jumlah_desa_sertifikat_kantor" value="{{ old('jumlah_desa_sertifikat_kantor') }}">
                                    @error('jumlah_desa_sertifikat_kantor')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah desa sertifikat kantor harus diisi</span>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="username" class="form-label capitalize" style="font-size: 1.04em; font-weight: 500">jumlah pades<strong style="color: red">*</strong></label>
                                    {{-- <div class="text-gray-600 mt-2 mb-4 text-xs">> Seluruh Kepala Desa dan Perangkat Desa dalam wilayah Kabupaten/Kota</div> --}}
                                    <input id="indikator" type="number" class="form-control" placeholder="jumlah pades" name="jumlah_pades" value="{{ old('jumlah_pades') }}">
                                    @error('jumlah_pades')
                                        <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="heroicons:exclaimation-triangle"></iconify-icon>Jumlah pades harus diisi</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
				</div>
				<!-- / Step Content -->
                
                <button 
                    @click="if (confirm('Yakin menambahkan data?')) { step = 'complete'; } else {event.preventDefault()}"
                    x-show="step === 5"
                    class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" 
                    {{-- onclick="return confirm('yakin menambahkan data ?')" --}}
                >Complete</button>
			</div>
		</div>
        </form>

		<!-- Bottom Navigation -->	
		<div class="lg:fixed lg:ltr:ml-[248px] lg:rtl:mr-[248px] bottom-0 left-0 right-0 py-5 bg-white shadow-md" x-show="step != 'complete'">
			<div class="max-w-3xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="w-1/2">
						<button
							x-show="step > 1"
							@click="step--"
							class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
						>Previous</button>
					</div>

					<div class="w-1/2 text-right">
						<button
							x-show="step < 5"
							@click="validateForms(step) ? step++ : ''"
                            onclick=""
							class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" 
						>Next</button>
					</div>
				</div>
			</div>
		</div>
		<!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->	
	</div>

	<script>
        function validateForms(step) {
            console.log(step);
            
            let isValid = true;
            // console.log(document.querySelectorAll(`#indikator-${step}`)[0]);
            
            document.querySelectorAll(`#indikator-${step} input`).forEach(input => {
                // console.log(input);
                // Periksa hanya input yang memiliki atribut required
                if (input.hasAttribute('required') && !input.checkValidity()) {
                    input.setCustomValidity('Field ini wajib diisi!');
                    input.reportValidity();
                    isValid = false;
                }
                input.addEventListener('input', function (e) {
                    console.log(e.target.hasAttribute('required'));
                    console.log(e.target);
                    
                    e.target.setCustomValidity(''); // Bersihkan pesan kesalahan kustom
                    isValid = true; 
                });
            });

            if (isValid) {
                console.log('Form valid!');
            } else {
                console.log('Form invalid!');
            }
            return isValid;
        }

		function app() {
			return {
				step: 1, 
				passwordStrengthText: '',
				togglePassword: false,

				image: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAAAAAAAD/4QBCRXhpZgAATU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAAkAAAAMAAAABAAAAAEABAAEAAAABAAAAAAAAAAAAAP/bAEMACwkJBwkJBwkJCQkLCQkJCQkJCwkLCwwLCwsMDRAMEQ4NDgwSGRIlGh0lHRkfHCkpFiU3NTYaKjI+LSkwGTshE//bAEMBBwgICwkLFQsLFSwdGR0sLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLP/AABEIAdoB2gMBIgACEQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMDAgQDBQUEBAAAAX0BAgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUmJygpKjQ1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8/T19vf4+fr/xAAfAQADAQEBAQEBAQEBAAAAAAAAAQIDBAUGBwgJCgv/xAC1EQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/APTmZsnmk3N60N1NJTELub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lJQA7c3rSbm9aSigBdzetG4+tJRQAZPrRuPrSUUALub1/lRub1pKSgBdzUbm9aSigBdzetG5vX+VJSUALub1/lUu5qhqXj1oAG6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooASiiigAooooAKSiigAooo+lACUZoooAKKKSgAo/rRSUALUlRVJz60AObqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACkoooAKKKKACiikoAKSlooASiiigA+lHpRQaACkoooATmilpPegBP/ANdS5HrUdSfL7UAObqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKSiigAooooAKKKKAEooooASij60UAFFFHpQAUmaKPxoAKSlpPWgA/wAmk/pS/Sk47dqADpUvPvUXrUn4H8qAHt1NJSt1NJQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFISFBJIAHUk4FAC0VTlv4EyEBc+3C/nVSS9uX6MEHonX8zQBrEqvLEAe5A/nUTXVqvWVfwyf5VjFmY5Ykn3JP86SmBrG/tB3c/RTTf7QtvST8hWXRQBqi/te+8f8AAc09by0b/loB/vAiseigDeV43+66t9CDTq5/p04+lTJdXMfSQkej/MP1oA2qKoR6gpwJUK/7Scj8utXEkjkG5GDD2P8AMUgH0UUUAFFFJQAUUUUAFFFJQAtJRRQAUlFFABR2oo+lAB1pKKP60AFFFFACUHjNH/66KAEpaSj/APVQAc0/I9KZUufpQA5uppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACimsyopZiAo5JNZlxePLlI8rH0J/ib60AWp72KLKph3/wDHR9TWdLNNMcuxPoOij6Co6KYBRRRQAUUUUAFFFFABRRRQAUUUUAFKruhDIxUjuDikooA0IL/os4/4Gv8AUVfBVgCpBB6Ecg1gVLBcSwH5eUP3lPQ/SgDaoqOKaOZdyH/eB6qfepKQBRRRQAlFFFABSUUUAFFFFABRRSf5NABxR6e1FJQAcUUUnP6UALSf5/GjvRz+FAB06d6KT6UGgA96kyf8mo//ANdP59P1oAlbqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACmu6RqzucKvJNKSACScADJJ7Csi6uDO2BkRqflHr7mgBLi5edu4QH5V/qagoopgFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFACUUUUAPjkkiYOhwR+RHoa14J0nTI4YffX0NYtPileJ1dDyOoPQj0NAG7SUyKVJkDr36juD6U+kAUhoooAKKKKACij/JpKACj/PNFFABScUelFACUdqP8mj+dABn9KMjij60d+tACf5FH5Uf59qOOlACfhUn40zmn4oAlbqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKhuJhDEz/xfdQerGgCpfXGT5CHgf6w+/8AdqhQSSSScknJPqTRTAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACkoooAKKKKACiiigCe2nMEnP+rbhx6e9bHoQevT3zXP1p2M+9DE33k5X/AHf/AK1AF2koNFIAoopKAFpKKPSgApPX0pf8mkoAKKTPP1paAE+lFFIT/ntQAelHAoz0oz/hQAd6T155oooAKk2+wqLPt/8AWqTj1P5GgCZuppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArJvpd8uwH5Y+P+BHrWnK4jjkc/wAKkj69qwiSSSepJJ+ppgFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSUUUAFFFFABRRSUAFFFFABT4pDFIkg/hPPuO4plFAG8CGAYchgCD7HmlqpYy74dp6xnH4HkVapALSUUUAH+NFFJQAc0f5+tHFJQAUUUepoAP/r0nP/1sUH1ozQAUnOaPwo9OlAAcd6T60tJQAHn+lSZPotR/55qTJ/yKAJm6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAKWoPiNE/vtk/RazKt6g2Zgv9xB+Z5qpTAKKKKACiiigAooooAKKKKA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',
				password: '',
				gender: 'Male',

				checkPasswordStrength() {
					var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
					var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

					let value = this.password;

					if (strongRegex.test(value)) {
						this.passwordStrengthText = "Strong password";
					} else if(mediumRegex.test(value)) {
						this.passwordStrengthText = "Could be stronger";
					} else {
						this.passwordStrengthText = "Too weak";
					}
				}
			}
		}
	</script>
</div>
<!-- END: Step Form Horizontal -->
