<!-- Desktop Sidebar -->
<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4 shadow-sm border-r border-gray-200">
        <!-- Logo -->
        <div class="flex h-16 shrink-0 items-center">
            <h1 class="text-xl font-semibold text-gray-900">Klinik App</h1>
        </div>

        <!-- Navigation -->
        <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        @php
                            $role = auth()->user()->role;
                            $currentRoute = request()->route()->getName();
                        @endphp

                        @switch($role)
                            @case('admin')
                                <li>
                                    <a href="{{ route('master.users.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'users') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'users') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>
                                        Users
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('master.wilayah.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'wilayah') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'wilayah') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                        Wilayah
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('master.pegawai.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'pegawai') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'pegawai') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                        </svg>
                                        Pegawai
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('master.tindakan.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'tindakan') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'tindakan') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                                        </svg>
                                        Tindakan
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('master.obat.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'obat') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'obat') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                                        </svg>
                                        Obat
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('laporan.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'laporan') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'laporan') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                        </svg>
                                        Laporan
                                    </a>
                                </li>
                            @break

                            @case('petugas')
                                <li>
                                    <a href="{{ route('master.pasien.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'pasien') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'pasien') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Pasien
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('transaksi.kunjungan.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'kunjungan') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'kunjungan') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                        Kunjungan
                                    </a>
                                </li>
                            @break

                            @case('dokter')
                                <li>
                                    <a href="{{ route('transaksi.kunjungan.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'kunjungan') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'kunjungan') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                        Kunjungan
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('transaksi.tindakan.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'tindakan') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'tindakan') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                                        </svg>
                                        Transaksi Tindakan
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('transaksi.obat.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'obat') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'obat') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                                        </svg>
                                        Transaksi Obat
                                    </a>
                                </li>
                            @break

                            @case('kasir')
                                <li>
                                    <a href="{{ route('pembayaran.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'pembayaran') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'pembayaran') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                        </svg>
                                        Pembayaran
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('laporan.index') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-medium {{ str_contains($currentRoute, 'laporan') ? 'bg-gray-100 text-primary-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                                        <svg class="h-5 w-5 shrink-0 {{ str_contains($currentRoute, 'laporan') ? 'text-primary-600' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                        </svg>
                                        Laporan
                                    </a>
                                </li>
                            @break
                        @endswitch
                    </ul>
                </li>

                <!-- User Profile & Logout -->
                <li class="mt-auto">
                    <div class="flex items-center gap-x-4 px-2 py-3 text-sm font-medium leading-6 text-gray-900">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-100">
                            <span
                                class="text-sm font-medium text-gray-600">{{ substr(auth()->user()->nama, 0, 1) }}</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ auth()->user()->nama }}</p>
                            <p class="text-xs text-gray-500 capitalize">{{ auth()->user()->role }}</p>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="-mx-2">
                        @csrf
                        <button type="submit"
                            class="group flex w-full gap-x-3 rounded-md p-2 text-sm leading-6 font-medium text-gray-700 hover:text-red-600 hover:bg-red-50">
                            <svg class="h-5 w-5 shrink-0 text-gray-400 group-hover:text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</div>
