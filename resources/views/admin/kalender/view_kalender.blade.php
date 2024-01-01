@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Pengaturan Kalender</h1>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
        <div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="event_name">Event name</label>
                                        <input type="text" name="event_name" id="event_name" class="form-control"
                                            placeholder="Enter your event name">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveBtn">Save Event</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var cuti = @json($events);
            var form = document.getElementById('event_entry_modal');
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap',
                selectable: true,

                navLinks: true,
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,today,next',
                    center: 'title',
                    right: 'dayGridWeek,dayGridMonth,timeGridDay,listWeek' // user can switch between the two
                },


                dayMaxEventRows: true, // for all non-TimeGrid views
                timeGrid: {
                    dayMaxEventRows: 3 // adjust to 6 only for timeGridWeek/timeGridDay
                },
                events: cuti,
                select: function(start, end, allDays) {
                    $('#event_entry_modal').modal('toggle');
                    $('#saveBtn').click(function() {
                        var title = $('#event_name').val();
                        var start = moment(start).format('YYYY-MM-DD');
                        var end = moment(end).format('YYYY-MM-DD');

                        $.ajax({
                            url: "{{ route('calendar.store') }}",
                            type: "POST",
                            dataType: 'json',
                            data: {
                                title,
                                start,
                                end
                            },
                            success: function(response) {
                                $('#event_entry_modal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent', {
                                    'title': response.title,
                                    'start': response.start,
                                    'end': response.end
                                });

                            },
                            error: function(error) {
                                if (error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors
                                        .title);
                                }
                            },
                        });
                    });

                },

            });
            calendar.render();
        });
    </script>
@endpush
