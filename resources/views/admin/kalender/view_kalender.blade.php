@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Pengaturan Kalender</h1>
            </div>
        </div>
        {{-- awalkalender --}}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
        {{-- kalender --}}
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
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var booking = @json($events);

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                navLinks: true,
                events: booking,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays) {
                    console.log(start);
                    $('#event_entry_modal').modal('toggle');

                    $('#saveBtn').click(function() {
                        var start_event = moment(start).format('YYYY-MM-DD');
                        var title = $('#event_name').val();
                        var end_event = moment(end).format('YYYY-MM-DD');

                        $.ajax({
                            url: "{{ route('store.kalender') }}",
                            type: "POST",
                            dataType: 'json',
                            data: {
                                title,
                                start_event,
                                end_event
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
                // batas
                editable: true,
                eventDrop: function(event) {
                    var id = event.id;
                    console.log(id);
                    var start_event = moment(event.start).format('YYYY-MM-DD');
                    var end_event = moment(event.end).format('YYYY-MM-DD');

                    $.ajax({
                        url: "{{ route('kalender.update', '') }}" + '/' + id,
                        type: "PATCH",
                        dataType: 'json',
                        data: {
                            start_event,
                            end_event
                        },
                        success: function(response) {
                            swal("Good job!", "Event Updated!", "success");
                        },
                        error: function(error) {
                            console.log(error)
                        },
                    });
                },
                eventClick: function(event) {
                    var id = event.id;

                    if (confirm('Apakah kamu yakin menghapus data ini')) {
                        $.ajax({
                            url: "{{ route('kalender.destroy', '') }}" + '/' + id,
                            type: "DELETE",
                            dataType: 'json',
                            success: function(response) {
                                $('#calendar').fullCalendar('removeEvents', response);
                                // swal("Good job!", "Event Deleted!", "success");
                            },
                            error: function(error) {
                                console.log(error)
                            },
                        });
                    }
                }


            });


            $("#event_entry_modal").on("hidden.bs.modal", function() {
                $('#saveBtn').unbind();
            });




        });
    </script>
@endpush
