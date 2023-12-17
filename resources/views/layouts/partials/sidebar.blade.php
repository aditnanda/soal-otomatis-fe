<x-maz-sidebar :href="route('koperasi.dashboard')">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('koperasi.dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Bank Soal" :link="route('question')" icon="bi bi-box"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Generate Otomatis" :link="route('generate_result')" icon="bi bi-kanban"></x-maz-sidebar-item>


    {{-- <li class="sidebar-title">Manajemen</li> --}}





</x-maz-sidebar>
