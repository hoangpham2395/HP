@if($entities->total())
    @php
        $totalRecord  = $entities->total();
        $currentPage = $entities->currentPage();
        $perPage = $entities->perPage();
        // paging info variables
        $fromRecord = (int)($currentPage - 1) * $perPage + 1;
        $toRecord = (($currentPage * $perPage) - $totalRecord) > 0 ? $totalRecord : ($currentPage * $perPage);
    @endphp
    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{$fromRecord}} to {{$toRecord}} of {{$entities->total()}} entries</div>
@endif

