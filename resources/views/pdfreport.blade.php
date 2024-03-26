<link rel="stylesheet" href="{{ URL::to('css/bootstrap.mins.css')}}">
<div class="container">
<h2 class="text-center">
    TESHIE ORPHANAGE CHILDRENS HOME<br>
    {{ strtoupper($report_type) }} REPORT
</h2>

<hr>

@if($report_type == "Orphan")
<div class="card-body table-responsive p-0">
    <table class="table table-hover table-table table-head-fixed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Date of birth</th>
                <th>Gender</th>
                <th>Entry date</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $report->lastname }} {{ $report->firstname }}</td>
                <td>{{ $report->date_of_birth}}</td>
                <td>{{ $report->gender }}</td>
                <td>{{ $report->entry_date }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2"></td>
            <td ><a href="/admin/settings/generatereport" class="btn btn-success">Back</a></td>
            <td colspan="2"><a href="/report-download/{{$from_date}}/{{$to_date}}/{{$report_type}}" class="btn btn-info" target="_blank">Print</a></td>
        </tr>
        </tbody>
    </table>

@elseif($report_type == "Donations")

<table class="table table-hover table-table table-head-fixed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sponsor name</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $report->sponsor?->full_name }}</td>
                <td>Ghc{{ $report->amount}}</td>
                <td>{{ $report->donation_date}}</td>
                <td>{{ $report->notes }}</td>
            </tr>
        @endforeach
            <tr>
            <td colspan="2"></td>
            <td ><a href="/admin/settings/generatereport" class="btn btn-success">Back</a></td>
            <td colspan="2"><a href="/report-download/{{$from_date}}/{{$to_date}}/{{$report_type}}" class="btn btn-info" target="_blank">Print</a></td>
        </tr>
        </tbody>
    </table>


@else

 <table class="table table-hover table-table table-head-fixed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $report->title }}</td>
                <td>Ghc{{ $report->amount}}</td>
                <td>{{ $report->expense_date}}</td>
            </tr>
        @endforeach
            <tr>
            <td colspan="2"></td>
            <td><a href="/admin/settings/generatereport" class="btn btn-success">Back</a></td>
            <td><a href="/report-download/{{$from_date}}/{{$to_date}}/{{$report_type}}" class="btn btn-info" target="_blank">Print</a></td>
        </tr>
        </tbody>
    </table>

@endif


</div>
</div>