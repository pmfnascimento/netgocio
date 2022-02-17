<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>The League</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/pricing.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
</head>

<body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal"><img src="{{ asset('img/logo.png') }}" height="45px"> Football
            Legue</h5>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">The League</h1>
        <p class="lead">Show information on your favorite football league, just select the league a see more
            aboute historic and round results.</p>
    </div>

    <div class="container" style="margin-bottom: 5%;">
        <form class="mt-5 mb-5">
            <div class="form-row">
                <div class="col">
                    <select id="league" class="form-control">
                        <option value="">League...</option>
                    </select>
                    <div id="error-league" class="invalid-feedback text-center"></div>
                </div>
                <div class="col">
                    <select id="season" class="form-control">
                        <option value="">Season...</option>
                    </select>
                    <div id="error-season" class="invalid-feedback text-center"></div>
                </div>
                <div class="col">
                    <select id="rounds" class="form-control">
                        <option value="">Round...</option>
                    </select>
                    <div id="error-rounds" class="invalid-feedback text-center"></div>
                </div>
                <div class="col align-self-center">
                    <a id="submit" class="btn btn-primary btn-block mb-4 text-white">Show</a>
                </div>
            </div>
        </form>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Position</th>
                    <th scope="col">Team</th>
                    <th scope="col">Name</th>
                    <th scope="col">Played</th>
                    <th scope="col">Won</th>
                    <th scope="col">Drawn</th>
                    <th scope="col">Lost</th>
                    <th scope="col">Goal</th>
                    <th scope="col">Difference</th>
                    <th scope="col">Points</th>
                </tr>
            </thead>
            <tbody>




            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="teams" tabindex="1" role="dialog" aria-labelledby="teams" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document" data-backdrop="static"
                data-keyboard="false">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-2">
                            <span id="teamImg"></span>
                        </div>
                        <div class="col-10">
                            <h5 class="modal-title" id="teamTitle"></h5>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div id="players" class="row">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalPlayer" tabindex="2" role="dialog" aria-labelledby="modalPlayer"
            aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-2">
                            <span id="playerImg"></span>
                        </div>
                        <div class="col-10">
                            <h5 class="modal-title" id="playerName"></h5>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="col-12">
                                <div id="playerInfo" class="row">

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/holder.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });

        $(document).ready(function() {

            if ($.fn.dataTable.isDataTable('#myTable')) {
                var table = $('#myTable').DataTable();
                table.destroy();
            }
            $.ajax({
                url: "{{ route('home.leagues') }}",
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    for (let f = 0; f < response.leagues.length; f++) {

                        $('#league').append("<option value='" + response.leagues[f].id + "'>" + response
                            .leagues[f].name + "</option>");
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });


            $('#league').change(function() {

                let league = $(this).val();

                $('#error-league').html('');
                $('#league').removeClass('is-invalid').addClass('is-valid');

                $.ajax({
                    url: "{{ route('home.seasons') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        league: league,
                    },
                    success: function(response) {
                        for (f = 0; f < response.season.length; f++) {
                            $('#season').append('<option value="' + response.season[f].id +
                                '">' + response.season[f].name + '</option>');
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#season').change(function() {

                let season = $(this).val();

                $('#error-season').html('');
                $('#season').removeClass('is-invalid').addClass('is-valid');

                $.ajax({
                    url: "{{ route('home.rounds') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        season: season,
                    },
                    success: function(response) {
                        for (f = 0; f < response.rounds.length; f++) {
                            $('#rounds').append('<option value="' + response.rounds[f].id +
                                '">' + response.rounds[f].start + ' - ' + response.rounds[f]
                                .end + '</option>');
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#rounds').change(function() {
                $('#error-rounds').html('');
                $('#rounds').removeClass('is-invalid').addClass('is-valid');
            });

            $('#submit').click(function() {


                let error = 0;

                if ($('#league').val() == '') {
                    error = 1;
                    $('#league').addClass('is-invalid');
                    $('#error-league').html('* Required Field');
                }

                if ($('#season').val() == '') {
                    error = 1;
                    $('#season').addClass('is-invalid');
                    $('#error-season').html('* Required Field');

                }

                if ($('#rounds').val() == '') {
                    error = 1;
                    $('#rounds').addClass('is-invalid');
                    $('#error-rounds').html('* Required Field');
                }

                if (error == 0) {
                    $('#error-league').html('');
                    $('#error-season').html('');
                    $('#error-rounds').html('');
                    $('#league').removeClass('is-invalid').addClass('is-valid');
                    $('#season').removeClass('is-invalid').addClass('is-valid');
                    $('#rounds').removeClass('is-invalid').addClass('is-valid');

                    let league = $('#league').val();
                    let season = $('#season').val();
                    let rounds = $('#rounds').val();

                    if ($.fn.dataTable.isDataTable('#myTable')) {
                        tabela = $('#myTable').DataTable();
                        tabela.destroy();
                    }
                    var table = $('#myTable').DataTable({
                        processing: false,
                        serverSide: true,
                        pageLength: 50,
                        ajax: {
                            type: 'POST',
                            url: "{{ route('home.list') }}",
                            data: {
                                league: league,
                                season: season,
                                rounds: rounds,
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        },
                        columns: [{
                                data: 'position'
                            },
                            {
                                data: 'team_logo',
                                render: function(data, type, row, meta) {
                                    return '<img src="' + data + '" alt="' + data +
                                        '" height="60px" />';
                                },
                            },
                            {
                                data: 'team_name'
                            },
                            {
                                data: 'games_played'
                            },
                            {
                                data: 'won'
                            },
                            {
                                data: 'draw'
                            },
                            {
                                data: 'lost'
                            },
                            {
                                data: 'goals_scored'
                            },
                            {
                                data: 'goal_diff'
                            },
                            {
                                data: 'points'
                            },
                        ],
                        columnDefs: [{
                            className: "text-center",
                            targets: "_all"
                        }],
                        createdRow: function(row, data, dataIndex) {
                            $(row).attr('data-team', data.team_id);
                        },

                    });
                }
            });



            $('#myTable tbody').on('click', 'tr', function() {

                var id = $(this).attr('data-team');
                let season = $('#season').val();
                let rounds = $('#rounds').val();
                $('#teams').modal('show');

                $.ajax({
                    url: "{{ route('home.team') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        season: season,
                        rounds: rounds,
                    },
                    success: function(response) {
                        $("#teamTitle").html('');
                        $("#teamImg").html('');
                        $("#players").html('');

                        $("#teamTitle").html(response.team[0].name + ' <p><small>founded: ' +
                            response.team[0].founded + '</small></p>');
                        $("#teamImg").html('<img height="60px" src="' + response.team[0]
                            .logo_path + '" />');

                        $.each(response.players, function(index, value) {

                            $("#players").append(

                                '<div class="col-md-3 text-center">' +
                                '<a class="btnPlayer" data-player="' + value
                                .player_id + '"><img src="' + value.image_path +
                                '" height="60px" />' +
                                '<p><small class="text-center">' + value
                                .common_name + '</small></p></a>' +
                                '</div>'
                            );

                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            });

            //Watch for closing modals

            $('#teams').on('click', '.btnPlayer', function() {

                $('#modalPlayer').modal('show');
                setTimeout(function() {
                    $('#teams').modal('hide')
                }, 10)

                var id = $(this).data('player');


                $.ajax({
                    url: "{{ route('home.player') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        console.log(response);
                        $("#playerName").html('<p>' + response.player[0].common_name +
                            '</p><p><small>Position: ' + response.statics[0].position_id +
                            ' | Number: ' + response.statics[0].number + ' | Capitan: ' + (
                                response.statics[0].capitan == 0 ? 'Yes' : 'No') +
                            '</small></p>');
                        $("#playerImg").html('<img height="60px" src="' + response.player[0]
                            .image_path + '" />');
                        $("#playerInfo").html(
                            '<div class="col-md-4">' +
                            '<ul class="list-unstyled">' +
                            '<li><b>Firstname:</b></li>' +
                            '<li><small>' + response.player[0].firstname + '</small></li>' +
                            '<li><b>Lastname:</b></li>' +
                            '<li><small>' + response.player[0].lastname + '</small></li>' +
                            '<li><b>Nationality:</b></li>' +
                            '<li><small>' + response.player[0].nationality +
                            '</small></li>' +
                            '<li><b>Birth date:</b></li>' +
                            '<li><small>' + response.player[0].birthdate + '</small></li>' +
                            '<li><b>Birth country:</b></li>' +
                            '<li><small>' + response.player[0].birthcountry +
                            '</small></li>' +
                            '<li><b>Height:</b></li>' +
                            '<li><small>' + response.player[0].height + '</small></li>' +
                            '<li><b>Weight:</b></li>' +
                            '<li><small>' + response.player[0].weight + '</small></li>' +
                            '</ul>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<ul class="list-unstyled">' +
                            '<li><b>Injured:</b></li>' +
                            '<li><small>' + response.statics[0].injured + '</small></li>' +
                            '<li><b>Minutes:</b></li>' +
                            '<li><small>' + response.statics[0].minutes + '</small></li>' +
                            '<li><b>Appearences:</b></li>' +
                            '<li><small>' + response.statics[0].appearences +
                            '</small></li>' +
                            '<li><b>Lines Ups:</b></li>' +
                            '<li><small>' + response.statics[0].lineups + '</small></li>' +
                            '<li><b>Subtitute In:</b></li>' +
                            '<li><small>' + response.statics[0].substitute_in +
                            '</small></li>' +
                            '<li><b>Subtitute Out:</b></li>' +
                            '<li><small>' + response.statics[0].substitute_out +
                            '</small></li>' +
                            '<li><b>Subtitute On Bench:</b></li>' +
                            '<li><small>' + response.statics[0].substitutes_on_bench +
                            '</small></li>' +
                            '</ul>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<ul class="list-unstyled">' +
                            '<li><b>Goals:</b></li>' +
                            '<li><small>' + response.statics[0].goals + '</small></li>' +
                            '<li><b>Assists:</b></li>' +
                            '<li><small>' + response.statics[0].assists + '</small></li>' +
                            '<li><b>Interceptions:</b></li>' +
                            '<li><small>' + response.statics[0].interceptions +
                            '</small></li>' +
                            '<li><b>Yellowcards:</b></li>' +
                            '<li><small>' + response.statics[0].yellowcards +
                            '</small></li>' +
                            '<li><b>Yellowred:</b></li>' +
                            '<li><small>' + response.statics[0].yellowred +
                            '</small></li>' +
                            '<li><b>Redcards:</b></li>' +
                            '<li><small>' + response.statics[0].redcards + '</small></li>' +
                            '<li><b>Clean Sheets:</b></li>' +
                            '<li><small>' + response.statics[0].cleansheets +
                            '</small></li>' +
                            '</ul>' +
                            '</div>'
                        );
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>

</html>
