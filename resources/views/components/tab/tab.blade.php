<div class="card">
    <div class="card-body flex flex-col p-6">
        <div class="card-text h-full">
            <div>
                <ul class="nav nav-pills flex items-center flex-wrap list-none pl-0 mb-6 space-x-4 "
                    id="pills-tabHorizontal" role="tablist">
                    <li class="nav-item text-center" role="presentation">
                        <a href="#pills-desaProfile"
                            class="nav-link block font-medium font-Inter text-sm leading-tight capitalize rounded-md px-6 py-3 focus:outline-none focus:ring-0 active dark:bg-slate-900 dark:text-slate-300"
                            id="pills-home-tabHorizontal" data-bs-toggle="pill" data-bs-target="#pills-desaProfile"
                            role="tab" aria-controls="pills-desaProfile" aria-selected="true">Desa Profile</a>
                    </li>
                    <li class="nav-item text-center" role="presentation">
                        <a href="#pills-statusDesa"
                            class="nav-link block font-medium font-Inter text-sm leading-tight capitalize rounded-md px-6 py-3 focus:outline-none focus:ring-0 dark:bg-slate-900 dark:text-slate-300"
                            id="pills-profile-tabHorizontal" data-bs-toggle="pill"
                            data-bs-target="#pills-statusDesa" role="tab" aria-controls="pills-statusDesa"
                            aria-selected="false">Status Desa</a>
                    </li>
                    <li class="nav-item text-center" role="presentation">
                        <a href="#pills-regulasiDesa"
                            class="nav-link block font-medium font-Inter text-sm leading-tight capitalize rounded-md px-6 py-3 focus:outline-none focus:ring-0 dark:bg-slate-900 dark:text-slate-300 "
                            id="pills-contact-tabHorizontal" data-bs-toggle="pill"
                            data-bs-target="#pills-regulasiDesa" role="tab" aria-controls="pills-regulasiDesa"
                            aria-selected="false">Regulasi Desa</a>
                    </li>
                    <li class="nav-item text-center" role="presentation">
                        <a href="#pills-kelembagaanAparatur"
                            class="nav-link block font-medium font-Inter text-sm leading-tight capitalize rounded-md px-6 py-3 focus:outline-none focus:ring-0 dark:bg-slate-900 dark:text-slate-300 "
                            id="pills-settings-tabHorizontal" data-bs-toggle="pill"
                            data-bs-target="#pills-kelembagaanAparatur" role="tab"
                            aria-controls="pills-kelembagaanAparatur" aria-selected="false">Kelembagaan Aparatur</a>
                    </li>
                    <li class="nav-item text-center" role="presentation">
                        <a href="#pills-penghargaanDesa"
                            class="nav-link block font-medium font-Inter text-sm leading-tight capitalize rounded-md px-6 py-3 focus:outline-none focus:ring-0 dark:bg-slate-900 dark:text-slate-300 "
                            id="pills-settings-tabHorizontal" data-bs-toggle="pill"
                            data-bs-target="#pills-penghargaanDesa" role="tab"
                            aria-controls="pills-penghargaanDesa" aria-selected="false">Penghargaan Desa</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContentHorizontal">
                    <div class="tab-pane fade show active" id="pills-desaProfile" role="tabpanel"
                        aria-labelledby="pills-home-tabHorizontal">
                        @include('components.table.table', ['indicators' => $indicators, 'columns' => $columns, 'tab' => 'desaProfile'])
                    </div>
                    <div class="tab-pane fade" id="pills-statusDesa" role="tabpanel"
                        aria-labelledby="pills-profile-tabHorizontal">
                        @include('components.table.table', ['indicators' => $indicators, 'columns' => $columns, 'tab' => 'statusDesa'])
                    </div>
                    <div class="tab-pane fade" id="pills-regulasiDesa" role="tabpanel"
                        aria-labelledby="pills-contact-tabHorizontal">
                        @include('components.table.table', ['indicators' => $indicators, 'columns' => $columns, 'tab' => 'regulasiDesa'])
                    </div>
                    <div class="tab-pane fade" id="pills-kelembagaanAparatur" role="tabpanel"
                        aria-labelledby="pills-settings-tabHorizontal">
                        @include('components.table.table', ['indicators' => $indicators, 'columns' => $columns, 'tab' => 'kelembagaanAparatur'])
                    </div>
                    <div class="tab-pane fade" id="pills-penghargaanDesa" role="tabpanel"
                        aria-labelledby="pills-settings-tabHorizontal">
                        @include('components.table.table', ['indicators' => $indicators, 'columns' => $columns, 'tab' => 'penghargaanDesa'])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('a[data-bs-target]');
        
        links.forEach(link => {
            console.log(link);
            
            link.addEventListener('click', function (event) {
                const url = new URL(window.location);
                // Update query parameter
                url.searchParams.set('indicator', event.target.text);
                // Push updated URL to the browser's history
                window.history.pushState({}, '', url);
            });
        });
    });

    </script>
</div>
