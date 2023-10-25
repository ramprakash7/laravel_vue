<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstarlit</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="js/testapp.js"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <div id="app" class="container mt-3" >
            <ul>
                <li v-for="skill in skills" v-text="skill.project_name"></li>
            </ul>
            {{-- <h2>@{{localTime}}</h2> --}}

            <form method="post" action="/project"  @submit.prevent ="onSubmit">
                <div class="form-group">
                    <label for="project_name">Project Name</label>
                    <input  class="form-control" type="text" id="input" v-model="project_name" placeholder="Enter a Project Name">
                </div>
                <div class="form-group mb-3">
                    <label for="project_description">Project Description</label>
                    <input class="form-control" type="text" id="input" v-model="project_description" placeholder="Enter a Description">
                </div>
                <input type="submit" class="btn btn-success">
            </form>


        </div>

        {{-- Two components Interaction --}}
        <div id="app2">
            <child-a>
                <div>
                    <label>Child A Input </label>
                    <input type="text" id="child_b_input" name="input_a" v-model="child_a">
                </div>
            </child-a>
            <child-b>
                <div>
                    <label>Child B Input </label>
                    <input type="text" id="child_b_input" name="input_b" v-model="child_b">
                </div>
            </child-b>
        </div>


        <div id="map"></div>

    <!--
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises.
      See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
      for more information.
      -->
    <script
      src="https://maps.googleapis.com/maps/api/js?callback=initMap"
      defer
    ></script>
    
    </body>
</html>


